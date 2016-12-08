<?php
namespace Service;

header("Content-Type: text/html;charset=utf-8");

class Transform {
	// 机器人投注
	public function robotGuess($gameId) {	
		$numArea = array('pc28'=>array(0,28),'js28'=>array(0,28),'js16'=>array(3,16),'fk28'=>array(0,28),'fksc'=>array(1,10),'jnd28'=>array(0,28));
		unset($condition);
		$condition['id'] = array('eq',$gameId);
		$Game = M("Game");
		$gameData = $Game->where($condition)->find();
		if(!$gameData){
			return;
		}
		
		// 从数据库读取出机器人配置信息
		unset($condition);
		$condition['gamename'] = array('eq',$gameData['name']);
		$Robotconfig = M("Robotconfig");
		$config = $Robotconfig->where($condition)->find();
		if(!$config)return;

		// 往竞猜表添加一条新的投注记录
		$guessData['gamename'] = $config['gamename'];
		$guessData['gameissue'] = $gameData['issue'];
		$guessData['input'] = 0;
		for($index=$numArea[$config['gamename']][0]; $index<$numArea[$config['gamename']][0]+$numArea[$config['gamename']][1]; $index++) {
			$guessData['money'.$index] = $config['money'.$index];
			$guessData['input'] = $guessData['input'] + $config['money'.$index];
		}
		$guessData['output']= 0;
		$guessData['createtime'] = date('Y-m-d H:i:s');
		$Guess = M('Guess');
		$Guess->create($guessData);
		$Guess->add();
		
		// 修改游戏表对应数据
		for($index=$numArea[$config['gamename']][0]; $index<$numArea[$config['gamename']][0]+$numArea[$config['gamename']][1]; $index++) {						//修改每个数字的下注
			$gameData['money'.$index] = $gameData['money'.$index]+$config['money'.$index];			// 修改游戏表每个号码的投注总金额
			$gameData['jackpot'] = $gameData['jackpot']+$config['money'.$index];					// 修改游戏表奖金池的总金额
		}
		$Game = M("Game");
		$Game->save($gameData);
	}
	
	// 用户投注
	public function userGuess($gameId) {
		$numArea = array('pc28'=>array(0,28),'js28'=>array(0,28),'js16'=>array(3,16),'fk28'=>array(0,28),'fksc'=>array(1,10),'jnd28'=>array(0,28));
		unset($condition);
		$condition['id'] = array('eq',$gameId);
		$Game = M("Game");
		$gameData = $Game->where($condition)->find();
		if(!$gameData){
			return;
		}
		
		// 从数据库读取出用户自动投注配置信息
		unset($condition);
		$condition['gamename'] = array('eq',$gameData['name']);
		$condition['status'] = array('eq',1);
		$ModeAutoView = D("ModeAutoView");
		$modeAutoData = $ModeAutoView->where($condition)->select();
		
		if($modeAutoData){
			foreach ($modeAutoData as $key=>$value) {
				// 符合停止自动投注的记录
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
				// 符合自动投注的记录
				}else{
					// 修改用户表
					$User = M("User");
					unset($condition);
					$condition['id'] = $value['userid'];
					$userData = $User->where($condition)->find();
					if($userData){
						$userData['money'] = $userData['money'] - $value['totalmoney'];
						$User->save($userData);
					}

					// 竞猜表添加一条新的投注记录
					$guessData['userid'] = $value['userid'];
					$guessData['gamename'] = $value['gamename'];
					$guessData['gameissue'] = $gameData['issue'];
					
					for($index=$numArea[$value['gamename']][0]; $index<$numArea[$value['gamename']][0]+$numArea[$value['gamename']][1]; $index++) {
						$guessData['money'.$index] = $value['money'.$index];
					}
					$guessData['input'] = $value['totalmoney'];;
					$guessData['output']= 0;
					$guessData['createtime'] = date('Y-m-d H:i:s');
					$Guess = M('Guess');
					$Guess->create($guessData);
					$Guess->add();
		
					// 修改游戏表对应数据
					for($index=$numArea[$value['gamename']][0]; $index<$numArea[$value['gamename']][0]+$numArea[$value['gamename']][1]; $index++) {						//修改每个数字的下注
						$gameData['money'.$index] = $gameData['money'.$index]+$value['money'.$index];
					}
					$gameData['jackpot'] = $gameData['jackpot']+$value['totalmoney'];
					$Game = M("Game");
					$Game->save($gameData);
				}
			}
		}
	}
	
	// 号码开奖
	public function calculate($data,$config){		
		unset($condition);
		$condition['name'] = array('eq',$config['name']);
		$condition['issue'] = array('eq',$data['issue']);
		$Game = M('Game');
		$gameData = $Game->where($condition)->find();
		
		if($gameData) {
			// 对非风控用户进行开奖（修改竞猜表的所获金豆、修改用户表的总金豆数）
			if($config['name']=='fksc'){																// 对最后开奖号码进行处理（除了疯狂赛车，其他的游戏最后的开奖号码都是三个开奖号码之和）
				$gameNum = $gameData['num1'];
			}else{
				$gameNum = $gameData['num1']+$gameData['num2']+$gameData['num3'];
			}
			$gameOdds = floor($gameData['jackpot']*(100-$config['water'])/$gameData['money'.$gameNum])/100;				// 计算开奖号码所对应的赔率
			unset($condition);
			$condition['gamename'] = array('eq',$config['name']);
			$condition['gameissue'] = array('eq',$data['issue']);
			$condition['money'.$gameNum] = array('neq',0);
			$guessData = M("Guess")->where($condition)->select();
			if($guessData){
				foreach ($guessData as $key=>$value) {													// 针对每一次竞猜记录进行开奖
					unset($condition);
					$condition['id'] = array('eq',$value['userid']);
					$User = M('User');
					$userData = M("User")->where($condition)->find();
					if($userData && $userData['control']==0){
						$value['output'] = floor($value['money'.$gameNum]*$gameOdds);					// 修改每次竞猜的所获金豆
						M("Guess")->save($value);
						$userData['money']=$userData['money']+$value['output'];							// 修改对应用户的总金豆数
						$User->save($userData);
					}
				}
			}
			// 对风控用户进行开奖（修改竞猜表的所获金豆、修改用户表的总金豆数）
			if($config['name']=='fksc'){																// 对最后开奖号码进行处理（除了疯狂赛车，其他的游戏最后的开奖号码都是三个开奖号码之和）
				$gameNum = $gameData['fknum1'];
			}else{
				$gameNum = $gameData['fknum1']+$gameData['fknum2']+$gameData['fknum3'];
			}
			$gameOdds = floor($gameData['jackpot']*(100-$config['water'])/$gameData['money'.$gameNum])/100;				// 计算开奖号码所对应的赔率
			unset($condition);
			$condition['gamename'] = array('eq',$config['name']);
			$condition['gameissue'] = array('eq',$data['issue']);
			$condition['money'.$gameNum] = array('neq',0);
			$guessData = M("Guess")->where($condition)->select();
			if($guessData){
				foreach ($guessData as $key=>$value) {													// 针对每一次竞猜记录进行开奖
					unset($condition);
					$condition['id'] = array('eq',$value['userid']);
					$User = M('User');
					$userData = M("User")->where($condition)->find();
					if($userData && $userData['control']==1){
						$value['output'] = floor($value['money'.$gameNum]*$gameOdds);					// 修改每次竞猜的所获金豆
						M("Guess")->save($value);
						$userData['money']=$userData['money']+$value['output'];							// 修改对应用户的总金豆数
						$User->save($userData);
					}
				}
			}
			
			
			
			
			// 修改竞猜表的数据（所获金豆）、修改用户表的数据（总金豆数）
			/*if($config['name']=='fksc'){																// 对最后开奖号码进行处理（除了疯狂赛车，其他的游戏最后的开奖号码都是三个开奖号码之和）
				$gameNum = $gameData['num1'];
			}else{
				$gameNum = $gameData['num1']+$gameData['num2']+$gameData['num3'];
			}
			$gameOdds = floor($gameData['jackpot']*(100-$config['water'])/$gameData['money'.$gameNum])/100;				// 计算开奖号码所对应的赔率
			unset($condition);
			$condition['gamename'] = array('eq',$config['name']);
			$condition['gameissue'] = array('eq',$data['issue']);
			$condition['money'.$gameNum] = array('neq',0);
			$guessData = M("Guess")->where($condition)->select();
			if($guessData){
				foreach ($guessData as $key=>$value) {													// 针对每一次竞猜记录进行开奖
					unset($condition);
					$condition['id'] = array('eq',$value['userid']);
					$User = M('User');
					$userData = M("User")->where($condition)->find();
					if($userData && $userData['control']==0){
						$value['output'] = floor($value['money'.$gameNum]*$gameOdds);					// 修改每次竞猜的所获金豆
						M("Guess")->save($value);
						$userData['money']=$userData['money']+$value['output'];							// 修改对应用户的总金豆数
						$User->save($userData);
					}
				}
			}*/
			
			// 修改游戏表的数据（开奖状态、中奖人数）
			unset($condition);
			$condition['gamename'] = array('eq',$config['name']);
			$condition['gameissue'] = array('eq',$data['issue']);
			$condition['money'.$gameNum] = array('neq',0);
			$guessData = M("Guess")->field('userid')->where($condition)->group('userid')->select();
			$gameData['statu'] = 3;																		// 将游戏状态修改为已开奖
			$gameData['peoplenum'] = count($guessData);													// 统计总共的中奖人数
			$Game->save($gameData);
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
			$readyData['lotteryname'] = $config['lotteryname'];
			$readyData['name'] = $config['name'];
			
			$num = $config['handle']($data);
			foreach ($num as $index=>$value) {
				$readyData[$index] = $value;
			}
			
			$readyData['issue'] = $data['issue'];
			$readyData['peoplenum'] = 0;
			$readyData['jackpot'] = 0;
			$runtime = Transform::getRuntime($readyData['issue'],$config);								// 计算本应开奖时间
			$readyData['deadline'] = date('Y-m-d H:i:s',$runtime-$config['aheaddeadline']);
			$readyData['runtime'] = date('Y-m-d H:i:s',$runtime+$config['delayruntime']);
			$readyData['statu'] = 3;
			$readyData['createtime'] = date('Y-m-d H:i:s');
			
			if ($Game->create($readyData)){
				$Game->add();
			}
		}
	}
	
	// 根据期号计算本应开奖时间
	public function getRuntime($issue,$config){
		$time = explode(':',$config['period_begin']);
		$begin_time = $time[0]*60*60+$time[1]*60+$time[2];												// 计算一天中第一期开奖时间距离00:00:00的秒数
		$time = explode(':',$config['period_end']);
		$end_time = $time[0]*60*60+$time[1]*60+$time[2];												// 计算一天中最后一期开奖时间距离00:00:00的秒数
		$time = explode(':',date('H:i:s',strtotime($config['basetime'])));
		$base_time = $time[0]*60*60+$time[1]*60+$time[2];												// 计算一天中基准期开奖时间距离00:00:00的秒数
		$interval = $config['interval'];

		$dayIssues = ($end_time - $begin_time)/$interval+1;												// 计算一天中总共开奖期数
		$firstDayIssues = ($end_time - $base_time)/$interval+1;											// 计算一天中基准期之后还剩下的开奖期数
		$diffIssues = $issue - $config['baseissue'] + 1;												// 计算当前期数与基准期数相差的开奖期数
		
		if($diffIssues<=$firstDayIssues){																// 当前期数距离基准期数小于一天的情况
			$seconds = ($diffIssues-1)*$interval;
			$runtime = strtotime($config['basetime']) + $seconds;
		}elseif(($diffIssues-$firstDayIssues)%$dayIssues==0){											// 当前基数正好是一天中最后一期的情况
			$days = floor(($diffIssues-$firstDayIssues)/$dayIssues);
			$seconds = (($diffIssues-$firstDayIssues)%$dayIssues-1)*$interval;
			$runtime = strtotime($config['basetime']) + $days*24*60*60 - $base_time + $end_time;
		}else{																							// 其他情况
			$days = floor(($diffIssues-$firstDayIssues)/$dayIssues)+1;
			$seconds = (($diffIssues-$firstDayIssues)%$dayIssues-1)*$interval;
			$runtime = strtotime($config['basetime']) + $days*24*60*60 - $base_time + $begin_time + $seconds;
		}

		return $runtime;
	}
	
	// 写入尚未开奖的游戏数据
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