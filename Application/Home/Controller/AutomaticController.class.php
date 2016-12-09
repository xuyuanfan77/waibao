<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class AutomaticController extends Controller {
	//获取游戏类型
	private function getGameStyle() {
		if($_GET['game']) {
			$gameStyle = $_GET['game'];
		} else {
			$gameStyle = 'pc28';
		}
		return $gameStyle;
	}
	
	//初始化用户数据
	private function initUser() {
		$User = M('User');
		$condition['id'] = array('eq',session('userId'));
		$userData = $User->where($condition)->find();
		$this->assign('userData',$userData);
	}
	
	//初始化提示
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
	
	//初始化内容
	private function initContent() {
		$Automatic = M('Automatic');
		unset($condition);
		$condition['userid'] = array('eq',session('userId'));
		$condition['gamename'] = array('eq',$this->getGameStyle());
		$automaticData = $Automatic->where($condition)->find();
		$this->assign('automaticData',$automaticData);
		
		$Mode = M('Mode');
		unset($condition);
		$condition['userid'] = array('eq',session('userId'));
		$condition['gamename'] = array('eq',$this->getGameStyle());
		$modeData = $Mode->where($condition)->select();
		$this->assign('modeData',$modeData);		
	}
	
    public function index(){
		if(cookie('PHPSESSID') && session('id') && cookie('PHPSESSID') == session('id')) {
			$this->initUser();
			$this->initTip();
			$this->initContent();
			$this->display('Automatic:'.$this->getGameStyle());
		} else {
			$this->redirect('Index/index', array('page'=>'login'));
		}
	}
	
	//获取系统时间
	public function getServerTime() {
		$data['hour'] = date('H');
		$data['min'] = date('i');
		$data['sec'] = date('s');
		$this->ajaxReturn($data);
	}
	
	//修改自动投注
	public function updateAutoStatus(){
		$Automatic = M('Automatic');
		unset($condition);
		$condition['userid'] = array('eq',session('userId'));
		$condition['gamename'] = array('eq',$_POST['game']);
		$automaticData = $Automatic->where($condition)->find();
		if($automaticData){
			//如果有数据，修改自动投注数据
			$automaticData['modeid'] = $_POST['start_model_id'];
			$automaticData['issuebg'] = $_POST['start_no'];
			$automaticData['issuenum'] = $_POST['bet_count'];
			$automaticData['moneymin'] = $_POST['min_f'];
			$automaticData['moneymax'] = $_POST['max_f'];
			$automaticData['status'] = ($automaticData['status']+1)%2;
			$Automatic->save($automaticData);
		}else{
			//如果没有数据，增加自动投注数据
			$automaticData['userid'] = session('userId');
			$automaticData['gamename'] = $_POST['game'];
			$automaticData['modeid'] = $_POST['start_model_id'];
			$automaticData['issuebg'] = $_POST['start_no'];
			$automaticData['issuenum'] = $_POST['bet_count'];
			$automaticData['moneymin'] = $_POST['min_f'];
			$automaticData['moneymax'] = $_POST['max_f'];
			$automaticData['status'] = 1;
			$automaticData['createtime'] = date('Y-m-d H:i:s');
			$Automatic->create($automaticData);
			$Automatic->add();
		}

		$data['code_num'] = 10000;
		$this->ajaxReturn($data);
	}
}