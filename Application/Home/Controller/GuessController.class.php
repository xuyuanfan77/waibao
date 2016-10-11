<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class GuessController extends Controller {
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
		$condition['name'] = array('eq','PC28');
		$condition['statu'] = array('eq',2);
		$tipData = $Game->where($condition)->order('issue desc')->find();
		$this->assign('tipData',$tipData);
	}
	
	//初始化内容
	private function initContent() {
		$Game = M('Game');
		$condition['name'] = array('eq','PC28');
		$condition['issue'] = array('eq',$_GET['issue']);
		$gameData = $Game->where($condition)->find();
		for($index=0;$index<=27;$index++) {
			$oddsIndex = 'odds'.$index;
			$gameOdds[$index] = $gameData[$oddsIndex];
		}
		$this->assign('gameOdds',$gameOdds);
		
		$condition['name'] = array('eq','PC28');
		$condition['issue'] = array('eq',$_GET['issue']-1);
		$preGameData = $Game->where($condition)->find();
		for($index=0;$index<=27;$index++) {
			$oddsIndex = 'odds'.$index;
			$preGameOdds[$index] = $preGameData[$oddsIndex];
		}
		$this->assign('preGameOdds',$preGameOdds);
		$this->assign('issueNum',$_GET['issue']);
	}
	
    public function index(){
		if(cookie('PHPSESSID') && session('id') && cookie('PHPSESSID') == session('id')) {
			$this->initUser();
			$this->initTip();
			$this->initContent();
			$this->display();
		} else {
			$this->redirect('Index/index', array('page'=>'login'));
		}
	}
	
	public function guess() {		
		$User = M("User");
		$condition['id'] = session('userId');
		$userData = $User->where($condition)->find();
		if($userData['money']>=$_POST['total']) {			
			$userData['money'] = $userData['money'] - $_POST['total'];
			$User->save($userData);
			
			$Guess = M('Guess');
			$guessData['id'] = uniqid();
			$guessData['userid'] = session('userId');
			$guessData['gamename'] = 'PC28';
			$guessData['gameissue'] = $_POST['period_no'];
			$bet_num = explode(',',$_POST['bet_num']);
			for($index=0;$index<28;$index++) {
				$guessData['money'.$index] = $bet_num[$index];
			}
			$guessData['createtime'] = date('Y-m-d H:i:s');
			$Guess->create($guessData);
			$Guess->add();
			
			$data['code_num'] = 1;
			$data['msg'] = '投注成功！';
			$data['reload_url'] = U('Num/index');
			$this->ajaxReturn($data);
		} else {
			$data['code_num'] = 10002;
			$data['msg'] = '余额不足！';
			$this->ajaxReturn($data);
		}
	}
}