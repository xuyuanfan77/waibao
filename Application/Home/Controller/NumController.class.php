<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class NumController extends Controller {
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
		$condition1['name'] = array('eq','PC28');
		$condition1['statu'] = array('eq',2);
		$tipData = $Game->where($condition1)->order('issue desc')->find();
		//$this->assign('tipData',$tipData);

		$condition2['name'] = array('eq','PC28');
		$condition2['issue'] = array('eq',$tipData['issue']+1);
		$nextIssueData = $Game->where($condition2)->find();
		$tipData['deadlinecd'] = 30;//strtotime($nextIssueData['deadline'])-strtotime(date('Y-m-d H:i:s'));
		$tipData['runtimecd'] = 60;//strtotime($nextIssueData['runtime'])-strtotime(date('Y-m-d H:i:s'));
		$this->assign('tipData',$tipData);
	}
	
	//初始化内容
	private function initContent() {
		$Game = M('Game');
		$pageNum = $this->getPageNum();
		$condition['name'] = array('eq','PC28');
		$gameData = $Game->where($condition)->page($pageNum .',20')->order('issue desc')->select();
		foreach ($gameData as $key=>$value) {
			if($value['statu']==2 && $value['runtime'] > date('Y-m-d H:i:s')){
				$gameData[$key]['statu']=1;
			}
		}
		$this->assign('gameData',$gameData);
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
		$Game = M('Game');
		$condition['name'] = array('eq','PC28');
		$gameCount = $Game->where($condition)->count();
		$Page = new \Think\Page($gameCount,20);
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
			$this->display();
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