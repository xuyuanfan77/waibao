<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class GuessController extends Controller {

	private function getGameStyle() {
		if($_GET['game']) {
			$gameStyle = $_GET['game'];
		} else {
			$gameStyle = 'pc28';
		}
		return $gameStyle;
	}

	private function initUser() {
		$User = M('User');
		$condition['id'] = array('eq',session('userId'));
		$userData = $User->where($condition)->find();
		$this->assign('userData',$userData);
	}

	private function initTip() {
		$Game = M('Game');
		$condition1['name'] = array('eq',$this->getGameStyle());
		$condition1['statu'] = array('eq',3);
		$tipData = $Game->where($condition1)->order('issue desc')->find();
		
		$condition2['name'] = array('eq',$this->getGameStyle());
		$condition2['issue'] = array('eq',$tipData['issue']+1);
		$nextIssueData = $Game->where($condition2)->find();
		$deadlinecd = strtotime($nextIssueData['deadline'])-strtotime(date('Y-m-d H:i:s'));
		if($deadlinecd<=0){
			$tipData['deadlinecd'] = 0;
		}else{
			$tipData['deadlinecd'] = $deadlinecd+1;
		}
		$runtimecd = strtotime($nextIssueData['runtime'])-strtotime(date('Y-m-d H:i:s'));
		if($runtimecd<=0){
			$tipData['runtimecd'] = 0;
		}else{
			$tipData['runtimecd'] = $runtimecd;
		}
		$this->assign('tipData',$tipData);
	}

	private function initMode() {
		$guessConfig = C('GUESS_MODE');
		$configData = $guessConfig[$_GET['game']];
		$Game = M('Game');
		$condition['name'] = array('eq',$this->getGameStyle());
		$condition['issue'] = array('eq',$_GET['issue']);
		$gameData = $Game->where($condition)->find();
		if($gameData['type']==2){
			$specialNumName = array('单', '双', '大', '小', '小单', '小双', '大单', '大双', '极大', '极小');
			$this->assign('specialNumName',$specialNumName);
			
			$tempConfigData = $configData;
			for($index=0; $index<10; $index++){
				$configData[$index] = $tempConfigData[28+$index];
			}
			for($index=10; $index<38; $index++){
				$configData[$index] = $tempConfigData[$index-10];
			}
		}
		$modeData = implode(', ',$configData);
		$this->assign('configData',$modeData);
	}
	
	private function initContent() {
		$numArea = array('pc28'=>array(0,28),'js28'=>array(0,28),'js16'=>array(3,16),'fk28'=>array(0,28),'fksc'=>array(1,10),'jnd28'=>array(0,28));
		$Game = M('Game');
		$condition['name'] = array('eq',$this->getGameStyle());
		$condition['issue'] = array('eq',$_GET['issue']);
		$gameData = $Game->where($condition)->find();
		if($gameData['type']==1){
			for($index=$numArea[$_GET['game']][0]; $index<$numArea[$_GET['game']][0]+$numArea[$_GET['game']][1]; $index++) {
				$moneyIndex = 'money'.$index;
				if($gameData[$moneyIndex]==0){
					$gameOdds[$index] = '--';
				}else{
					$gameOdds[$index] = round($gameData['jackpot']/$gameData[$moneyIndex],2);
				}
			}
			$this->assign('gameOdds',$gameOdds);
			
			$condition['name'] = array('eq',$this->getGameStyle());
			$condition['issue'] = array('eq',$_GET['issue']-1);
			$preGameData = $Game->where($condition)->find();
			for($index=$numArea[$_GET['game']][0]; $index<$numArea[$_GET['game']][0]+$numArea[$_GET['game']][1]; $index++) {
				$moneyIndex = 'money'.$index;
				if($preGameData[$moneyIndex]==0){
					$preGameOdds[$index] = '--';
				}else{
					$preGameOdds[$index] = round($preGameData['jackpot']/$preGameData[$moneyIndex],2);
				}
			}
			$this->assign('preGameOdds',$preGameOdds);
		} else {
			$Odds = M('Odds');
			$condition['name'] = array('eq',$this->getGameStyle());
			$configData = $Odds->where($condition)->find();
			for($index=0; $index<38; $index++) {
				$oddsIndex = 'odds'.$index;
				$oddsData[$index] = $configData[$oddsIndex];
			}
			$this->assign('oddsData',$oddsData);
		}
		
		$this->assign('issueNum',$_GET['issue']);
	}
	
    public function index(){
		if(cookie('PHPSESSID') && session('id') && cookie('PHPSESSID') == session('id')) {
			$this->initUser();
			$this->initTip();
			$this->initMode();
			$this->initContent();
			$this->display('Guess:'.$this->getGameStyle());
		} else {
			$this->redirect('Index/index', array('page'=>'login'));
		}
	}
	
	public function guess() {	
		$Game = M("Game");
		unset($condition);
		$condition['name'] = $_POST['game_style'];
		$condition['issue'] = $_POST['period_no'];
		$condition['statu'] = 3;
		$gameData = $Game->where($condition)->find();
		if($gameData){
			$data['code_num'] = 10002;
			$data['msg'] = '已经开奖，不可再投注了！';
			$this->ajaxReturn($data);
		}
		
		$User = M("User");
		unset($condition);
		$condition['id'] = session('userId');
		$userData = $User->where($condition)->find();
		if($userData['money']<$_POST['total']) {
			$data['code_num'] = 10002;
			$data['msg'] = '余额不足！';
			$this->ajaxReturn($data);
		}
		
		/*$bet_num = explode(',',$_POST['bet_num']);
		foreach($bet_num as $value){
			if($value%100!=0) {
				$data['code_num'] = 10002;
				$data['msg'] = '投注金豆必须要整百！';
				$this->ajaxReturn($data);
			}
		}*/
		
		$numArea = array('pc28'=>array(0,28),'js28'=>array(0,28),'js16'=>array(3,16),'fk28'=>array(0,28),'fksc'=>array(1,10),'jnd28'=>array(0,28));
		
		$userData['money'] = $userData['money'] - $_POST['total'];
		$User->save($userData);
		
		
		$Game = M("Game");
		unset($condition);
		$condition['name'] = $_POST['game_style'];
		$condition['issue'] = $_POST['period_no'];
		$gameData = $Game->where($condition)->find();
		if($gameData['type']==1){
			$Guess = M('Guess');
			$guessData['userid'] = session('userId');
			$guessData['gamename'] = $_POST['game_style'];
			$guessData['gameissue'] = $_POST['period_no'];
			$bet_num = explode(',',$_POST['bet_num']);
			for($index=$numArea[$_POST['game_style']][0]; $index<$numArea[$_POST['game_style']][0]+$numArea[$_POST['game_style']][1]; $index++) {
				$guessData['money'.$index] = $bet_num[$index-$numArea[$_POST['game_style']][0]];
			}
			$guessData['input']= $_POST['total'];
			$guessData['output']= 0;
			$guessData['createtime'] = date('Y-m-d H:i:s');
			$Guess->create($guessData);
			$Guess->add();

			
			$bet_num = explode(',',$_POST['bet_num']);
			for($index=$numArea[$_POST['game_style']][0]; $index<$numArea[$_POST['game_style']][0]+$numArea[$_POST['game_style']][1]; $index++) {
				$gameData['money'.$index] = $gameData['money'.$index]+$bet_num[$index-$numArea[$_POST['game_style']][0]];
			}
			$gameData['jackpot'] = $gameData['jackpot']+$_POST['total'];
			$Game->save($gameData);
		} else {
			$Guess = M('Guess');
			$guessData['userid'] = session('userId');
			$guessData['gamename'] = $_POST['game_style'];
			$guessData['gameissue'] = $_POST['period_no'];
			$bet_num = explode(',',$_POST['bet_num']);
			for($index=0; $index<10; $index++) {
				$guessData['spmoney'.$index] = $bet_num[$index];
			}
			for($index=$numArea[$_POST['game_style']][0]; $index<$numArea[$_POST['game_style']][0]+$numArea[$_POST['game_style']][1]; $index++) {
				$guessData['money'.$index] = $bet_num[$index-$numArea[$_POST['game_style']][0]+10];
			}
			$guessData['input']= $_POST['total'];
			$guessData['output']= 0;
			$guessData['createtime'] = date('Y-m-d H:i:s');
			$Guess->create($guessData);
			$Guess->add();

			
			$bet_num = explode(',',$_POST['bet_num']);
			for($index=0; $index<10; $index++) {
				$gameData['spmoney'.$index] = $gameData['spmoney'.$index]+$bet_num[$index];
			}
			for($index=$numArea[$_POST['game_style']][0]; $index<$numArea[$_POST['game_style']][0]+$numArea[$_POST['game_style']][1]; $index++) {
				$gameData['money'.$index] = $gameData['money'.$index]+$bet_num[$index-$numArea[$_POST['game_style']][0]+10];
			}
			$gameData['jackpot'] = $gameData['jackpot']+$_POST['total'];
			$Game->save($gameData);
		}

		$data['code_num'] = 1;
		$data['msg'] = '投注成功！';
		$data['reload_url'] = U('Num/index', array('game'=>$_POST['game_style']));
		$this->ajaxReturn($data);
	}
}