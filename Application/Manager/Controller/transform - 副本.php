<?php
namespace Service;

header("Content-Type: text/html;charset=utf-8");

class Transform {
	// 转换公式
	public function transform_num($gamename,$lotteryData){
		if($gamename == 'PC28'){
			$num['num1'] = ($lotteryData['num1']+$lotteryData['num2']+$lotteryData['num3']+$lotteryData['num4']+$lotteryData['num5']+$lotteryData['num6'])%10;
			$num['num2'] = ($lotteryData['num7']+$lotteryData['num8']+$lotteryData['num9']+$lotteryData['num10']+$lotteryData['num11']+$lotteryData['num12'])%10;
			$num['num3'] = ($lotteryData['num13']+$lotteryData['num14']+$lotteryData['num15']+$lotteryData['num16']+$lotteryData['num17']+$lotteryData['num18'])%10;
		}
		return $num;
	}
	
	// 写入已开奖的游戏数据
	public function transform($data,$config){		
		$Game = M('Game');
		$condition['name'] = array('eq',$config['name']);
		$condition['issue'] = array('eq',$data['issue']);
		$gameData = $Game->where($condition)->find();
		
		if($gameData) {
		// 更新
			$readyData['id'] = $gameData['id'];
			$num = Transform::transform_num($config['name'],$data);
			foreach ($num as $index=>$value) {
				$readyData[$index] = $value;
			}
			if($gameData['statu']==0){
				$readyData['statu'] = 1;
			}
			$Game->save($readyData);
		} else {
		// 新插入
			$readyData['id'] = uniqid();
			$readyData['lotteryname'] = $config['lotteryname'];
			$readyData['name'] = $config['name'];
			
			$num = Transform::transform_num($config['name'],$data);
			foreach ($num as $index=>$value) {
				$readyData[$index] = $value;
			}
			
			$readyData['issue'] = $data['issue'];
			$readyData['peoplenum'] = 0;
			$readyData['jackpot'] = 0;
			$runtime = strtotime($data['runtime']);
			$readyData['deadline'] = date('Y-m-d H:i:s',strtotime('-'.$config['aheaddeadline'].' seconds',$runtime));
			$readyData['runtime'] = date('Y-m-d H:i:s',strtotime('+'.$config['delayruntime'].' seconds',$runtime));
			$readyData['statu'] = 2;
			$readyData['createtime'] = date('Y-m-d H:i:s');
			
			if ($Game->create($readyData)){
				$Game->add();
			}
		}
	}
	
	// 写入未开奖的游戏数据
	public function prewrite($data,$config){
		$Game = M('Game');
		$condition['name'] = array('eq',$config['name']);
		for($index=1;$index<=$config['aheadissue'];$index++){
			$condition['issue'] = array('eq',$data['issue']+$index);
			$gameData = $Game->where($condition)->find();
			if(!$gameData){
				$gameData['id'] = uniqid();
				$gameData['lotteryname'] = $config['lotteryname'];
				$gameData['name'] = $config['name'];
				
				$gameData['issue'] = $data['issue']+$index;
				$gameData['peoplenum'] = 0;
				$gameData['jackpot'] = 0;
				$runtime = strtotime('+'.$config['interval']*$index.' seconds',strtotime($data['runtime']));
				$gameData['deadline'] = date('Y-m-d H:i:s',strtotime('-'.$config['aheaddeadline'].' seconds',$runtime));
				$gameData['runtime'] = date('Y-m-d H:i:s',strtotime('+'.$config['delayruntime'].' seconds',$runtime));
				$gameData['statu'] = 0;
				$gameData['createtime'] = date('Y-m-d H:i:s');
				
				if ($Game->create($gameData)){
					$Game->add();
				}
			}
		}	
	}
}