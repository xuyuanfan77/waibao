<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class RecordController extends Controller {
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
		$Guess = D('GuessView');
		unset($condition);
		$condition['userid'] = array('eq',session('userId'));
		$condition['gamename'] = array('eq',$this->getGameStyle());
		$condition['statu'] = array('eq',3);
		$pageNum = $this->getPageNum();
		$guessData = $Guess->where($condition)->page($pageNum .',10')->order('gameissue desc')->select();
		$this->assign('guessData',$guessData);
	}
	
	//获取页数
	private function getPageNum() {
		if($_GET['p']) {
			$pageNum = $_GET['p'];
		} else {
			$pageNum = 1;
		}
		return $pageNum;
	}
	
	//初始化分页
	private function initPage() {
		$Guess = D('GuessView');
		$condition['userid'] = array('eq',session('userId'));
		$condition['gamename'] = array('eq',$this->getGameStyle());
		$condition['statu'] = array('eq',3);
		$guessCount = $Guess->where($condition)->count();
		$Page = new \Think\Page($guessCount,10);
		foreach($condition as $key=>$val) {
			$Page->parameter[$key] = urlencode($val);
		}
		$pageShow = $Page->show();
		$this->assign('pageShow',$pageShow);
	}
	
    public function index(){
		if(cookie('PHPSESSID') && session('id') && cookie('PHPSESSID') == session('id')) {
			$this->initUser();
			$this->initTip();
			$this->initContent();
			$this->initPage();
			$this->display('Record:'.$this->getGameStyle());
		} else {
			$this->redirect('Index/index', array('page'=>'login'));
		}
	}
	
	public function getServerTime() {
		$data['hour'] = date('H');
		$data['min'] = date('i');
		$data['sec'] = date('s');
		$this->ajaxReturn($data);
	}
}