<?php
namespace Service;

header("Content-Type: text/html;charset=utf-8");

class Transform {
	// 机器人投注
	public function robotGuess($gameData) {		
		$Robotconfig = M("Robotconfig");
		$configData = $Robotconfig->select();
		foreach ($configData as $value) {
			switch ($value['gamename'])
			{
			case 'pc28':
				$begin_num = 0;
				$number_num = 28;
				break;  
			case 'js28':
				$begin_num = 0;
				$number_num = 28;
				break;
			case 'js16':
				$begin_num = 3;
				$number_num = 16;
				break;
			case 'fk28':
				$begin_num = 0;
				$number_num = 28;
				break;  
			case 'fksc':
				$begin_num = 1;
				$number_num = 10;
				break;
			default:
			}
			//修改竞猜表
			if($gameData['name']==$value['gamename']){
				$Guess = M('Guess');
				$guessData['id'] = uniqid();
				$guessData['gamename'] = $value['gamename'];
				$guessData['gameissue'] = $gameData['issue'];
				$total = 0;
				for($index=$begin_num;$index<$begin_num+$number_num;$index++) {
					$guessData['money'.$index] = $value['money'.$index];
					$total = $total + $value['money'.$index];
				}
				$guessData['input']= $total;
				$guessData['output']= 0;
				$guessData['createtime'] = date('Y-m-d H:i:s');
				$Guess->create($guessData);
				$Guess->add();
				
				//修改游戏表
				for($index=$begin_num;$index<$begin_num+$number_num;$index++) {						//修改每个数字的下注
					$gameData['money'.$index] = $gameData['money'.$index]+$value['money'.$index];
				}		
				$gameData['peoplenum'] = $gameData['peoplenum']+1;									//修改总人数
				$gameData['jackpot'] = $gameData['jackpot']+$total;									//修改奖金池
				$Game = M("Game");
				$Game->save($gameData);
			}
		}
	}
	
	// 计算号码开奖的游戏数据
	public function calculate($data,$config){		
		$Game = M('Game');
		unset($condition);
		$condition['name'] = array('eq',$config['name']);
		$condition['issue'] = array('eq',$data['issue']);
		$gameData = $Game->where($condition)->find();
		
		if($gameData) {
			$gameData['statu'] = 3;
			$Game->save($gameData);
			
			switch ($config['name'])
			{
			case 'pc28':
				$gameNum = $gameData['num1']+$gameData['num2']+$gameData['num3'];
				break;  
			case 'js28':
				$gameNum = $gameData['num1']+$gameData['num2']+$gameData['num3'];
				break;
			case 'js16':
				$gameNum = $gameData['num1']+$gameData['num2']+$gameData['num3'];
				break;
			case 'fk28':
				$gameNum = $gameData['num1']+$gameData['num2']+$gameData['num3'];
				break;
			case 'fksc':
				$gameNum = $gameData['num1'];
				break;
			default:
			}
			$gameOdds = round($gameData['jackpot']/$gameData['money'.$gameNum],2);
			$Guess = M("Guess");
			unset($condition);
			$condition['gamename'] = array('eq',$config['name']);
			$condition['gameissue'] = array('eq',$data['issue']);
			$condition['money'.$gameNum] = array('neq',0);
			$guessData = $Guess->where($condition)->select();
			if($guessData){
				foreach ($guessData as $key=>$value) {
					$value['output'] = $value['money'.$gameNum]*$gameOdds;
					$Guess->save($value);
					
					$User = M('User');
					unset($condition);
					$condition['id'] = array('eq',$value['userid']);
					$userData = $User->where($condition)->find();
					if($userData){
						$userData['money']=$userData['money']+$value['output'];
						$User->save($userData);
					}
				}
			}
		}
	}
	
	// 写入已经开奖的游戏数据
	public function transform($data,$config){		
		$Game = M('Game');
		$condition['name'] = array('eq',$config['name']);
		$condition['issue'] = array('eq',$data['issue']);
		$gameData = $Game->where($condition)->find();
		
		if($gameData) {
		// 更新
			$readyData['id'] = $gameData['id'];
			$num = $config['handle']($data);
			foreach ($num as $index=>$value) {
				$readyData[$index] = $value;
			}
			if($gameData['statu']==0){
				$readyData['statu'] = 3;
			}
			$Game->save($readyData);
		} else {
		// 新插入
			$readyData['id'] = uniqid();
			$readyData['lotteryname'] = $config['lotteryname'];
			$readyData['name'] = $config['name'];
			
			$num = $config['handle']($data);
			foreach ($num as $index=>$value) {
				$readyData[$index] = $value;
			}
			
			$readyData['issue'] = $data['issue'];
			$readyData['peoplenum'] = 0;
			$readyData['jackpot'] = 0;
			$runtime = strtotime($data['runtime']);
			$readyData['deadline'] = date('Y-m-d H:i:s',strtotime('-'.$config['aheaddeadline'].' seconds',$runtime));
			$readyData['runtime'] = date('Y-m-d H:i:s',strtotime('+'.$config['delayruntime'].' seconds',$runtime));
			$readyData['statu'] = 3;
			$readyData['createtime'] = date('Y-m-d H:i:s');
			
			if ($Game->create($readyData)){
				$Game->add();
			}
		}
	}
	
	// 写入尚未开奖的游戏数据
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
					
					// 机器人投注
					Transform::robotGuess($gameData);
				}
			}
		}	
	}
}