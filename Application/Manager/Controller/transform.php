<?php
namespace Service;

header("Content-Type: text/html;charset=utf-8");

class Transform {
	public function robotGuess($gameId) {	
		$numArea = array('pc28'=>array(0,28),'js28'=>array(0,28),'js16'=>array(3,16),'fk28'=>array(0,28),'fksc'=>array(1,10),'jnd28'=>array(0,28));
		unset($condition);
		$condition['id'] = array('eq',$gameId);
		$Game = M("Game");
		$gameData = $Game->where($condition)->find();
		if(!$gameData){
			return;
		}

		unset($condition);
		$condition['gamename'] = array('eq',$gameData['name']);
		$Robotconfig = M("Robotconfig");
		$config = $Robotconfig->where($condition)->find();
		if(!$config)return;

		$guessData['gamename'] = $config['gamename'];
		$guessData['gameissue'] = $gameData['issue'];
		$guessData['input'] = 0;
		for($index=$numArea[$config['gamename']][0]; $index<$numArea[$config['gamename']][0]+$numArea[$config['gamename']][1]; $index++) {
			$guessData['money'.$index] = $config['money'.$index];
			$guessData['input'] = $guessData['input'] + $config['money'.$index];
		}
		if($gameData['type']==2){
			for($index=0; $index<10; $index++) {
				$guessData['spmoney'.$index] = $config['spmoney'.$index];
				$guessData['input'] = $guessData['input'] + $config['spmoney'.$index];
			}
		}
		$guessData['output']= 0;
		$guessData['createtime'] = date('Y-m-d H:i:s');
		$Guess = M('Guess');
		$Guess->create($guessData);
		$Guess->add();

		for($index=$numArea[$config['gamename']][0]; $index<$numArea[$config['gamename']][0]+$numArea[$config['gamename']][1]; $index++) {
			$gameData['money'.$index] = $gameData['money'.$index]+$config['money'.$index];
			$gameData['jackpot'] = $gameData['jackpot']+$config['money'.$index];
		}
		if($gameData['type']==2){
			for($index=0; $index<10; $index++) {
				$gameData['spmoney'.$index] = $gameData['spmoney'.$index]+$config['spmoney'.$index];
				$gameData['jackpot'] = $gameData['jackpot']+$config['spmoney'.$index];
			}
		}
		$Game = M("Game");
		$Game->save($gameData);
	}

	public function userGuess($gameId) {
		$numArea = array('pc28'=>array(0,28),'js28'=>array(0,28),'js16'=>array(3,16),'fk28'=>array(0,28),'fksc'=>array(1,10),'jnd28'=>array(0,28));
		unset($condition);
		$condition['id'] = array('eq',$gameId);
		$Game = M("Game");
		$gameData = $Game->where($condition)->find();
		if(!$gameData){
			return;
		}

		unset($condition);
		$condition['gamename'] = array('eq',$gameData['name']);
		$condition['status'] = array('eq',1);
		$ModeAutoView = D("ModeAutoView");
		$modeAutoData = $ModeAutoView->where($condition)->select();
		
		if($modeAutoData){
			foreach ($modeAutoData as $key=>$value) {
				if($gameData['issue']>($value['issuebg']+$value['issuenum']) ||
					$value['money']<$value['moneymin'] ||
					($value['money']>$value['moneymax'] && $value['moneymax']!=0) ||
					$value['money']<$value['totalmoney']){
					unset($condition);
					$condition['id'] = array('eq',$value['id']);
					$Automatic = M('Automatic');
					$automaticData = $Automatic->where($condition)->find();
					if($automaticData){
						$automaticData['status'] = 0;
						$Automatic->save($automaticData);
					}
				}else{
					$User = M("User");
					unset($condition);
					$condition['id'] = $value['userid'];
					$userData = $User->where($condition)->find();
					if($userData){
						$userData['money'] = $userData['money'] - $value['totalmoney'];
						$User->save($userData);
					}

					$guessData['userid'] = $value['userid'];
					$guessData['gamename'] = $value['gamename'];
					$guessData['gameissue'] = $gameData['issue'];
					
					for($index=$numArea[$value['gamename']][0]; $index<$numArea[$value['gamename']][0]+$numArea[$value['gamename']][1]; $index++) {
						$guessData['money'.$index] = $value['money'.$index];
					}
					if($gameData['type']==2){
						for($index=0; $index<10; $index++) {
							$guessData['spmoney'.$index] = $value['spmoney'.$index];
						}
					}
					$guessData['input'] = $value['totalmoney'];;
					$guessData['output']= 0;
					$guessData['createtime'] = date('Y-m-d H:i:s');
					$Guess = M('Guess');
					$Guess->create($guessData);
					$Guess->add();

					for($index=$numArea[$value['gamename']][0]; $index<$numArea[$value['gamename']][0]+$numArea[$value['gamename']][1]; $index++) {
						$gameData['money'.$index] = $gameData['money'.$index]+$value['money'.$index];
					}
					if($gameData['type']==2){
						for($index=0; $index<10; $index++) {
							$gameData['spmoney'.$index] = $gameData['spmoney'.$index]+$value['spmoney'.$index];
						}
					}
					$gameData['jackpot'] = $gameData['jackpot']+$value['totalmoney'];
					$Game = M("Game");
					$Game->save($gameData);
				}
			}
		}
	}
	
	public function calculate($data,$config){		
		unset($condition);
		$condition['name'] = array('eq',$config['name']);
		$condition['issue'] = array('eq',$data['issue']);
		$Game = M('Game');
		$gameData = $Game->where($condition)->find();
		
		if($gameData) {
			if($gameData['type']==2){
				if($config['name']=='fksc'){
					$gameNum = $gameData['num1'];
				}else{
					$gameNum = $gameData['num1']+$gameData['num2']+$gameData['num3'];
				}
				
				$spnum = array(
					0=>array(1,3,5,7,9,11,13,15,17,19,21,23,25,27),			// 单
					1=>array(0,2,4,6,8,10,12,14,16,18,20,22,24,26),			// 双
					2=>array(14,15,16,17,18,19,20,21,22,23,24,25,26,27),		// 大
					3=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13),					// 小
					4=>array(1,3,5,7,9,11,13),									// 小单
					5=>array(0,2,4,6,8,10,12,14),								// 小双
					6=>array(13,15,17,19,21,23,25,27),							// 大单
					7=>array(14,16,18,20,22,24,26),							// 大双
					8=>array(22,23,24,25,26,27),								// 极大
					9=>array(0,1,2,3,4,5)										// 极小
				);
				
				unset($condition);
				$condition['gamename'] = array('eq',$config['name']);
				$oddsData = M("Odds")->where($condition)->find();
				
				unset($condition);
				$condition['gamename'] = array('eq',$config['name']);
				$condition['gameissue'] = array('eq',$data['issue']);
				$guessData = M("Guess")->where($condition)->select();
				
				if($guessData){
					foreach ($guessData as $key=>$value) {
						$value['output'] = floor($value['money'.$gameNum]*$oddsData['odds'.$gameNum]);
							
						foreach ($spnum as $k=>$v) {
							if(in_array($gameNum,$v)){
								if($gameNum==13 || $gameNum==14){
									$value['output'] = floor($value['output'] + $value['spmoney'.$k]);
								} else {
									$value['output'] = floor($value['output'] + $value['spmoney'.$k]*$oddsData['odds'.($k+28)]);
								}
							}
						}
						
						// 修改guess表
						M("Guess")->save($value);
						
						// 修改user表
						unset($condition);
						$condition['id'] = array('eq',$value['userid']);
						$User = M('User');
						$userData = $User->where($condition)->find();
						if($userData && $userData['control']==0){
							$userData['money']=$userData['money']+$value['output'];
							$User->save($userData);
						}
					}
				}
				// 修改game表
				unset($condition);
				$condition['gamename'] = array('eq',$config['name']);
				$condition['gameissue'] = array('eq',$data['issue']);
				$condition['output'] = array('neq',0);
				$guessData = M("Guess")->field('userid')->where($condition)->group('userid')->select();
				$gameData['statu'] = 3;
				$gameData['peoplenum'] = count($guessData);
				$Game->save($gameData);
			} else {
				if($config['name']=='fksc'){
					$gameNum = $gameData['num1'];
				}else{
					$gameNum = $gameData['num1']+$gameData['num2']+$gameData['num3'];
				}
				$gameOdds = floor($gameData['jackpot']*(100-$config['water'])/$gameData['money'.$gameNum])/100;
				unset($condition);
				$condition['gamename'] = array('eq',$config['name']);
				$condition['gameissue'] = array('eq',$data['issue']);
				$condition['money'.$gameNum] = array('neq',0);
				$guessData = M("Guess")->where($condition)->select();
				if($guessData){
					foreach ($guessData as $key=>$value) {
						unset($condition);
						$condition['id'] = array('eq',$value['userid']);
						$User = M('User');
						$userData = M("User")->where($condition)->find();
						if($userData && $userData['control']==0){
							$value['output'] = floor($value['money'.$gameNum]*$gameOdds);
							M("Guess")->save($value);
							$userData['money']=$userData['money']+$value['output'];
							$User->save($userData);
						}
					}
				}

				unset($condition);
				$condition['gamename'] = array('eq',$config['name']);
				$condition['gameissue'] = array('eq',$data['issue']);
				$condition['money'.$gameNum] = array('neq',0);
				$guessData = M("Guess")->field('userid')->where($condition)->group('userid')->select();
				$gameData['statu'] = 3;
				$gameData['peoplenum'] = count($guessData);
				$Game->save($gameData);
			}
		}
	}

	public function transform($data,$config){		
		$Game = M('Game');
		$condition['name'] = array('eq',$config['name']);
		$condition['issue'] = array('eq',$data['issue']);
		$gameData = $Game->where($condition)->find();
		
		if($gameData) {
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
			$readyData['lotteryname'] = $config['lotteryname'];
			$readyData['name'] = $config['name'];
			$readyData['type'] = $config['type'];
			
			$num = $config['handle']($data);
			foreach ($num as $index=>$value) {
				$readyData[$index] = $value;
			}
			
			$readyData['issue'] = $data['issue'];
			$readyData['peoplenum'] = 0;
			$readyData['jackpot'] = 0;
			$runtime = Transform::getRuntime($readyData['issue'],$config);
			$readyData['deadline'] = date('Y-m-d H:i:s',$runtime-$config['aheaddeadline']);
			$readyData['runtime'] = date('Y-m-d H:i:s',$runtime+$config['delayruntime']);
			$readyData['statu'] = 3;
			$readyData['createtime'] = date('Y-m-d H:i:s');
			
			if ($Game->create($readyData)){
				$Game->add();
			}
		}
	}
	
	public function getRuntime($issue,$config){
		$time = explode(':',$config['period_begin']);
		$begin_time = $time[0]*60*60+$time[1]*60+$time[2];
		$time = explode(':',$config['period_end']);
		$end_time = $time[0]*60*60+$time[1]*60+$time[2];
		$time = explode(':',date('H:i:s',strtotime($config['basetime'])));
		$base_time = $time[0]*60*60+$time[1]*60+$time[2];
		$interval = $config['interval'];

		$dayIssues = ($end_time - $begin_time)/$interval+1;
		$firstDayIssues = ($end_time - $base_time)/$interval+1;
		$diffIssues = $issue - $config['baseissue'] + 1;
		
		if($diffIssues<=$firstDayIssues){
			$seconds = ($diffIssues-1)*$interval;
			$runtime = strtotime($config['basetime']) + $seconds;
		}elseif(($diffIssues-$firstDayIssues)%$dayIssues==0){
			$days = floor(($diffIssues-$firstDayIssues)/$dayIssues);
			$seconds = (($diffIssues-$firstDayIssues)%$dayIssues-1)*$interval;
			$runtime = strtotime($config['basetime']) + $days*24*60*60 - $base_time + $end_time;
		}else{
			$days = floor(($diffIssues-$firstDayIssues)/$dayIssues)+1;
			$seconds = (($diffIssues-$firstDayIssues)%$dayIssues-1)*$interval;
			$runtime = strtotime($config['basetime']) + $days*24*60*60 - $base_time + $begin_time + $seconds;
		}

		return $runtime;
	}

	public function prewrite($data,$config){
		$Game = M('Game');
		$condition['name'] = array('eq',$config['name']);
		dump('name'.$config['name']);		
		for($index=1;$index<=$config['aheadissue'];$index++){
			$condition['issue'] = array('eq',$data['issue']+$index);
			$gameData = $Game->where($condition)->find();
			if(!$gameData){
				$gameData['lotteryname'] = $config['lotteryname'];
				$gameData['name'] = $config['name'];
				$gameData['type'] = $config['type'];
				$gameData['issue'] = $data['issue']+$index;
				$gameData['peoplenum'] = 0;
				$gameData['jackpot'] = 0;
				$runtime = Transform::getRuntime($gameData['issue'],$config);
				$gameData['deadline'] = date('Y-m-d H:i:s',$runtime-$config['aheaddeadline']);
				$gameData['runtime'] = date('Y-m-d H:i:s',$runtime+$config['delayruntime']);
				$gameData['statu'] = 0;
				$gameData['createtime'] = date('Y-m-d H:i:s');
				
				if ($Game->create($gameData)){
					$gameId = $Game->add();
					Transform::robotGuess($gameId);
					Transform::userGuess($gameId);
				}
			}
		}	
	}
}