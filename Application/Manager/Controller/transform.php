<?php
namespace Service;

header("Content-Type: text/html;charset=utf-8");

class Transform {
	// 机器人投注
	public function robotGuess($gameData) {	
		$numArea = array('pc28'=>array(0,28),'js28'=>array(0,28),'js16'=>array(3,16),'fk28'=>array(0,28),'fksc'=>array(1,10),'jnd28'=>array(0,28));
		
		// 取出机器人配置信息
		unset($condition);
		$condition['gamename'] = array('eq',$gameData['name']);
		$Robotconfig = M("Robotconfig");
		$config = $Robotconfig->where($condition)->find();
		if(!$config)return;

		// 竞猜表添加一条记录
		$guessData['id'] = uniqid();
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
			$gameData['money'.$index] = $gameData['money'.$index]+$config['money'.$index];
			$gameData['jackpot'] = $gameData['jackpot']+$config['money'.$index];
		}
		$Game = M("Game");
		$Game->save($gameData);
	}
	
	// 计算号码开奖的游戏数据
	public function calculate($data,$config){		
		unset($condition);
		$condition['name'] = array('eq',$config['name']);
		$condition['issue'] = array('eq',$data['issue']);
		$Game = M('Game');
		$gameData = $Game->where($condition)->find();
		
		if($gameData) {
			// 修改竞猜表的数据（所获金豆）、修改用户表的数据（总金豆数）
			if($config['name']=='fksc'){																// 对最后开奖号码进行处理（除了疯狂赛车，其他的游戏最后的开奖号码都是三个开奖号码之和）
				$gameNum = $gameData['num1'];
			}else{
				$gameNum = $gameData['num1']+$gameData['num2']+$gameData['num3'];
			}
			$gameOdds = floor($gameData['jackpot']/$gameData['money'.$gameNum]*100)/100;				// 计算开奖号码所对应的赔率
			unset($condition);
			$condition['gamename'] = array('eq',$config['name']);
			$condition['gameissue'] = array('eq',$data['issue']);
			$condition['money'.$gameNum] = array('neq',0);
			$guessData = M("Guess")->where($condition)->select();
			if($guessData){
				foreach ($guessData as $key=>$value) {													// 针对每一次竞猜记录进行开奖
					$value['output'] = $value['money'.$gameNum]*$gameOdds;								// 修改每次竞猜的所获金豆
					M("Guess")->save($value);

					unset($condition);																	// 修改对应用户的总金豆数
					$condition['id'] = array('eq',$value['userid']);
					$User = M('User');
					$userData = $User->where($condition)->find();
					if($userData){
						$userData['money']=$userData['money']+$value['output'];
						$User->save($userData);
					}
				}
			}
			
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
			dump('新插入');
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
	
	// 根据期号计算开奖时间
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
		}else{
			$days = floor(($diffIssues-$firstDayIssues)/$dayIssues)+1;
			$seconds = (($diffIssues-$firstDayIssues)%$dayIssues-1)*$interval;
			$runtime = strtotime($config['basetime']) + $days*24*60*60 - $base_time + $begin_time + $seconds;
		}

		/*dump('begin_time:'.$begin_time);
		dump('end_time:'.$end_time);
		dump('base_time:'.$base_time);
		dump('interval:'.$interval);
		dump('dayIssues:'.$dayIssues);
		dump('firstDayIssues:'.$firstDayIssues);
		dump('diffIssues:'.$diffIssues);
		dump('days:'.$days);
		dump('seconds:'.$seconds);
		dump('runtime:'.$runtime);*/
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
				$gameData['id'] = uniqid();
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
					$Game->add();
					
					// 机器人投注
					Transform::robotGuess($gameData);
				}
			}
		}	
	}
}