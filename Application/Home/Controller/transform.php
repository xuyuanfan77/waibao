<?php
namespace Service;

header("Content-Type: text/html;charset=utf-8");

class Transform {
	// 转换公式
	public function transform_expression(){
		
	}
	
	// 写入已开奖的游戏数据
	public function transform($lotteryId,$config){
		$Lottery = M('Lottery');
		$condition['id'] = array('eq',$lotteryId);
		$lotteryData = $Lottery->where($condition)->find();
		
		$Game = M('Game');
		$condition['name'] = array('eq',$config['name']);
		$condition['issue'] = array('eq',$lotteryData['issue']);
		$gameData = $Game->where($condition)->find();
		
		if($gameData) {
		// 更新
			
		} else {
		// 新插入
			$gameData['id'] = uniqid();
			$gameData['lotteryname'] = $config['lotteryname'];
			$gameData['name'] = $config['name'];
			
			for ($index=1; $index<=20; $index++) {
			  $lotteryData['num'.$index] = $data['num'][$index-1];
			}
			
			$gameData['issue'] = $lotteryData['issue'];
			$gameData['peoplenum'] = 0;
			$gameData['jackpot'] = 0;
			$gameData['deadline'] = $lotteryData['runtime']+$config['aheaddeadline'];
			$gameData['runtime'] = $lotteryData['runtime']+$config['delayruntime'];
			$gameData['statu'] = 2;
			$gameData['createtime'] = date('Y-m-d H:i:s');
			
			if ($Game->create($gameData)){
				$Game->add();
			}
		}
	}
	
	// 写入未开奖的游戏数据
	public function prewrite(){
		
	}
}