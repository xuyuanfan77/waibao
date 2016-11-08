<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class NumController extends Controller {
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
		$Game = M('Game');
		$pageNum = $this->getPageNum();
		$condition['name'] = array('eq',$this->getGameStyle());
		$gameData = $Game->where($condition)->page($pageNum .',20')->order('issue desc')->select();
		
		$Guess = M('Guess');
		$Lottery = M('Lottery');
		foreach ($gameData as $key=>$value) {
			
			unset($condition);
			$condition['userid'] = array('eq',session('userId'));
			$condition['gamename'] = array('eq',$this->getGameStyle());
			$condition['gameissue'] = array('eq',$value['issue']);
			$guessData = $Guess->where($condition)->select();
			if($guessData){
				$input = 0;
				$output = 0;
				foreach($guessData as $index=>$data){
					$input = $input + $data['input'];
					$output = $output + $data['output'];
				}
				$gameData[$key]['inputoutput'] = $input . '/' . $output;
			}else{
				$gameData[$key]['inputoutput']=0;
			}
		
			if($value['statu']==0){
				if($value['runtime'] < date('Y-m-d H:i:s')){
					$gameData[$key]['statu']=2;
				}elseif($value['deadline'] < date('Y-m-d H:i:s')){
					$gameData[$key]['statu']=1;
				}
			}
			//疯狂赛车游戏特殊处理
			if($this->getGameStyle()=='fksc'){
				unset($condition);
				$condition['name'] = array('eq',$value['lotteryname']);
				$condition['issue'] = array('eq',$value['issue']);
				$lotteyData = $Lottery->where($condition)->find();
				$gameData[$key]['lotteryData']=$lotteyData;
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
		$condition['name'] = array('eq',$this->getGameStyle());
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
			$this->display('Num:'.$this->getGameStyle());
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