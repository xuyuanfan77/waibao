<?php
namespace Manager\Controller;
header("Content-Type: text/html;charset=utf-8");
class OddsController extends LayoutController {
    public function index(){
		if(cookie('PHPSESSID') && session('admin_id') && cookie('PHPSESSID') == session('admin_id')) {
			$this->initLayout("odds");
			$Odds = M("odds");
			$configData = $Odds->select();
			$this->assign('configData',$configData);
			$this->display();
		} else {
			$this->redirect('Account/index');
		}
	}
	
	public function del(){
		$Odds = M('Odds');
		$condition['gamename'] = array('eq',$_GET['gamename']);
		$Odds->where($condition)->delete(); 
		$this->redirect('Odds/index');
	}
}