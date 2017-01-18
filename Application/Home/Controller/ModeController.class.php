<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class ModeController extends Controller {

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
		$condition1['name'] = array('eq',$this->getGameStyle());
		$condition1['statu'] = array('eq',3);
		$gameData = $Game->where($condition1)->order('issue desc')->find();
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
		
		$Mode = M('Mode');
		$condition['userid'] = array('eq',session('userId'));
		$condition['gamename'] = array('eq',$this->getGameStyle());
		$modeData = $Mode->field('id,modename')->where($condition)->select();
		$this->assign('modeData',$modeData);
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
			$this->display('Mode:'.$this->getGameStyle());
		} else {
			$this->redirect('Index/index', array('page'=>'login'));
		}
	}

	public function save(){
		$numArea = array('pc28'=>array(0,28),'js28'=>array(0,28),'js16'=>array(3,16),'fk28'=>array(0,28),'fksc'=>array(1,10),'jnd28'=>array(0,28));	
		$name		= $_POST['name'];
		$bet_num	= $_POST['bet_num'];
		$total		= $_POST['total'];
		$model_id	= $_POST['model_id'];
		$gamename = $_POST['game'];
		if($model_id){
			$Mode = M('Mode');
			unset($condition);
			$condition['id'] = $_POST['model_id'];
			$modeData = $Mode->where($condition)->find();
			if($modeData){
				$modeData['modename'] = $_POST['name'];
				$bet_num = explode(',',$_POST['bet_num']);
				
				$Game = M('Game');
				$condition['name'] = array('eq',$_POST['game']);
				$condition['statu'] = array('eq',3);
				$gameData = $Game->where($condition)->order('issue desc')->find();
				if($gameData['type']==2){
					
					for($index=0; $index<28; $index++) {
						$modeData['money'.$index] = $bet_num[$index+10];
					}
					for($index=0; $index<10; $index++) {
						$modeData['spmoney'.$index] = $bet_num[$index];
					}
				} else {
					for($index=$numArea[$gamename][0]; $index<$numArea[$gamename][0]+$numArea[$gamename][1]; $index++) {
						$modeData['money'.$index] = $bet_num[$index-$numArea[$gamename][0]];
					}
				}
				$modeData['totalmoney']= $_POST['total'];
				$Mode->save($modeData);
				
				$data['msg'] = '更新模式成功';
				$this->ajaxReturn($data);
			}else{
				$data['msg'] = '更新模式失败';
				$this->ajaxReturn($data);
			}
		}else{
			$Mode = M('Mode');
			$modeData['userid'] = session('userId');
			$modeData['gamename'] = $gamename;
			$modeData['modename'] = $_POST['name'];
			$bet_num = explode(',',$_POST['bet_num']);
			
			$Game = M('Game');
			$condition['name'] = array('eq',$_POST['game']);
			$condition['statu'] = array('eq',3);
			$gameData = $Game->where($condition)->order('issue desc')->find();
			if($gameData['type']==2){
				
				for($index=0; $index<28; $index++) {
					$modeData['money'.$index] = $bet_num[$index+10];
				}
				for($index=0; $index<10; $index++) {
					$modeData['spmoney'.$index] = $bet_num[$index];
				}
			} else {
				for($index=$numArea[$gamename][0]; $index<$numArea[$gamename][0]+$numArea[$gamename][1]; $index++) {
					$modeData['money'.$index] = $bet_num[$index-$numArea[$gamename][0]];
				}
			}
			$modeData['totalmoney']= $_POST['total'];
			$modeData['createtime'] = date('Y-m-d H:i:s');
			$Mode->create($modeData);
			$Mode->add();
			
			$data['data']=$_POST['bet_num'];
			$data['msg'] = '保存模式成功';
			$this->ajaxReturn($data);
		}
	}

	public function del(){
		$Mode = M('Mode');
		unset($condition);
		$condition['id'] = $_POST['model_id'];
		$Mode->where($condition)->delete();

		$data['code_num'] = 10000;
		$this->ajaxReturn($data);
	}
	
	public function select(){
		$Mode = M('Mode');
		unset($condition);
		$condition['id'] = $_POST['model_id'];
		$modeData = $Mode->where($condition)->find();
		
		$Game = M('Game');
		unset($condition);
		$condition['name'] = array('eq',$modeData['gamename']);
		$condition['statu'] = array('eq',3);
		$gameData = $Game->where($condition)->order('issue desc')->find();
		
		$data['bet_num'] = "";
		if($gameData['type']==2){
			for($index=0; $index<10; $index++) {
				$data['bet_num'] = $data['bet_num'] . $modeData['spmoney'.$index] . ',';
			}
			for($index=0; $index<28; $index++) {
				$data['bet_num'] = $data['bet_num'] . $modeData['money'.$index] . ',';
			}
		} else {
			for($index=0; $index<28; $index++) {
				$data['bet_num'] = $data['bet_num'] . $modeData['money'.$index] . ',';
			}
		}
			
		$data['code_num'] = 10000;
		$this->ajaxReturn($data);
	}
}