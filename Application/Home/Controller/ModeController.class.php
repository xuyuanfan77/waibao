<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class ModeController extends Controller {
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
	
	// 初始化竞猜模式
	private function initMode() {
		$guessConfig = C('GUESS_MODE');
		$configData = $guessConfig[$_GET['game']];
		$this->assign('configData',implode(', ',$configData));
		
		$Mode = M('Mode');
		$condition['userid'] = array('eq',session('userId'));
		$condition['gamename'] = array('eq',$this->getGameStyle());
		$modeData = $Mode->field('id,modename')->where($condition)->select();
		$this->assign('modeData',$modeData);
	}
	
	//初始化内容
	private function initContent() {
		$numArea = array('pc28'=>array(0,28),'js28'=>array(0,28),'js16'=>array(3,16),'fk28'=>array(0,28),'fksc'=>array(1,10),'jnd28'=>array(0,28));
		$Game = M('Game');
		$condition['name'] = array('eq',$this->getGameStyle());
		$condition['issue'] = array('eq',$_GET['issue']);
		$gameData = $Game->where($condition)->find();
		for($index=$numArea[$_GET['game']][0]; $index<$numArea[$_GET['game']][0]+$numArea[$_GET['game']][1]; $index++) {	//生成本期所有号码的赔率
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
		for($index=$numArea[$_GET['game']][0]; $index<$numArea[$_GET['game']][0]+$numArea[$_GET['game']][1]; $index++) {	//生成上一期所有号码的赔率
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
			$this->initMode();
			$this->initContent();
			$this->display('Mode:'.$this->getGameStyle());
		} else {
			$this->redirect('Index/index', array('page'=>'login'));
		}
	}

	//保存模式
	public function save(){
		$numArea = array('pc28'=>array(0,28),'js28'=>array(0,28),'js16'=>array(3,16),'fk28'=>array(0,28),'fksc'=>array(1,10),'jnd28'=>array(0,28));	
		$name		= $_POST['name'];														//模式名称
		$bet_num	= $_POST['bet_num'];													//模式内容
		$total		= $_POST['total'];														//模式总额
		$model_id	= $_POST['model_id'];													//模式id
		$gamename = $_POST['game'];															//模式游戏类型
		if($model_id){
			$Mode = M('Mode');
			unset($condition);
			$condition['id'] = $_POST['model_id'];
			$modeData = $Mode->where($condition)->find();
			if($modeData){
				$modeData['modename'] = $_POST['name'];
				$bet_num = explode(',',$_POST['bet_num']);
				for($index=$numArea[$gamename][0]; $index<$numArea[$gamename][0]+$numArea[$gamename][1]; $index++) {
					$modeData['money'.$index] = $bet_num[$index-$numArea[$gamename][0]];
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
			for($index=$numArea[$gamename][0]; $index<$numArea[$gamename][0]+$numArea[$gamename][1]; $index++) {
				$modeData['money'.$index] = $bet_num[$index-$numArea[$gamename][0]];
			}
			$modeData['totalmoney']= $_POST['total'];
			$modeData['createtime'] = date('Y-m-d H:i:s');
			$Mode->create($modeData);
			$Mode->add();
			
			$data['msg'] = '保存模式成功';
			$this->ajaxReturn($data);
		}
	}

	//删除模式
	public function del(){
		$Mode = M('Mode');
		unset($condition);
		$condition['id'] = $_POST['model_id'];
		$Mode->where($condition)->delete();

		$data['code_num'] = 10000;
		$this->ajaxReturn($data);
	}
	
	//选择模式
	public function select(){
		$Mode = M('Mode');
		unset($condition);
		$condition['id'] = $_POST['model_id'];
		$modeData = $Mode->where($condition)->find();
		
		$data['bet_num'] = "";
		$gamename = $modeData['gamename'];
		for($index=0; $index<28; $index++) {
			$data['bet_num'] = $data['bet_num'] . $modeData['money'.$index] . ',';
		}
		
		$data['code_num'] = 10000;
		$this->ajaxReturn($data);
	}
}