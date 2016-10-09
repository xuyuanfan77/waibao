<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class GuessController extends Controller {
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
		$condition['issue'] = array('eq',784036);
		$gameData = $Game->where($condition)->find();
		for($index=0;$index<=27;$index++) {
			$oddsIndex = 'odds'.$index;
			$gameOdds[$index] = $gameData[$oddsIndex];
		}
		$this->assign('gameOdds',$gameOdds);
		
		$condition['name'] = array('eq','PC28');
		$condition['issue'] = array('eq',784036-1);
		$preGameData = $Game->where($condition)->find();
		for($index=0;$index<=27;$index++) {
			$oddsIndex = 'odds'.$index;
			$preGameOdds[$index] = $preGameData[$oddsIndex];
		}
		$this->assign('preGameOdds',$preGameOdds);
	}
	
    public function index(){
		$this->initTip();
		$this->initContent();
		$this->display();
	}
}