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
		$condition1['name'] = array('eq','PC28');
		$condition1['statu'] = array('eq',3);
		$tipData = $Game->where($condition1)->order('issue desc')->find();
		
		$condition2['name'] = array('eq','PC28');
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
		$Game = M('Game');
		$condition['name'] = array('eq','PC28');
		$condition['issue'] = array('eq',$_GET['issue']);
		$gameData = $Game->where($condition)->find();
		for($index=0;$index<=27;$index++) {
			$moneyIndex = 'money'.$index;
			if($gameData[$moneyIndex]==0){
				$gameOdds[$index] = '--';
			}else{
				$gameOdds[$index] = round($gameData['jackpot']/$gameData[$moneyIndex],2);
			}
		}
		$this->assign('gameOdds',$gameOdds);
		
		$condition['name'] = array('eq','PC28');
		$condition['issue'] = array('eq',$_GET['issue']-1);
		$preGameData = $Game->where($condition)->find();
		for($index=0;$index<=27;$index++) {
			$moneyIndex = 'money'.$index;
			if($preGameData[$moneyIndex]==0){
				$preGameOdds[$index] = '--';
			}else{
				$preGameOdds[$index] = round($preGameData['jackpot']/$preGameData[$moneyIndex],2);
			}
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
	
	//竞猜
	public function guess() {	
		//检测游戏是否过期
		$Game = M("Game");
		unset($condition);
		$condition['name'] = 'PC28';
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
		
		//修改用户表
		$userData['money'] = $userData['money'] - $_POST['total'];
		$User->save($userData);
		
		//修改竞猜表
		$Guess = M('Guess');
		$guessData['id'] = uniqid();
		$guessData['userid'] = session('userId');
		$guessData['gamename'] = 'PC28';
		$guessData['gameissue'] = $_POST['period_no'];
		$bet_num = explode(',',$_POST['bet_num']);
		for($index=0;$index<28;$index++) {
			$guessData['money'.$index] = $bet_num[$index];
		}
		$guessData['input']= $_POST['total'];
		$guessData['output']= 0;
		$guessData['createtime'] = date('Y-m-d H:i:s');
		$Guess->create($guessData);
		$Guess->add();

		//修改游戏表
		$Game = M("Game");																	//修改每个数字的下注
		unset($condition);
		$condition['name'] = 'PC28';
		$condition['issue'] = $_POST['period_no'];
		$gameData = $Game->where($condition)->find();
		$bet_num = explode(',',$_POST['bet_num']);
		for($index=0;$index<28;$index++) {
			$gameData['money'.$index] = $gameData['money'.$index]+$bet_num[$index];
		}
		
		$Guess = M("Guess");																//修改总人数
		unset($condition);
		$condition['userid'] = session('userId');
		$condition['gamename'] = 'PC28';
		$condition['gameissue'] = $_POST['period_no'];
		$guessData = $Guess->where($condition)->select();
		if(count($guessData)==1){
			$gameData['peoplenum'] = $gameData['peoplenum']+1;
		}
		
		$gameData['jackpot'] = $gameData['jackpot']+$_POST['total'];						//修改奖金池
		$Game->save($gameData);

		$data['code_num'] = 1;
		$data['msg'] = '投注成功！';
		$data['reload_url'] = U('Num/index');
		$this->ajaxReturn($data);
	}
}