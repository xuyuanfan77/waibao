<?php
namespace Manager\Controller;
header("Content-Type: text/html;charset=utf-8");
class RobotController extends LayoutController {
    public function index(){
		if(cookie('PHPSESSID') && session('admin_id') && cookie('PHPSESSID') == session('admin_id')) {
			$this->initLayout("robot");
			$Robotconfig = M("Robotconfig");
			$configData = $Robotconfig->select();
			$this->assign('configData',$configData);
			$this->display();
		} else {
			$this->redirect('Account/index');
		}
	}
	
	public function del(){
		$Robotconfig = M('Robotconfig');
		$condition['gamename'] = array('eq',$_GET['gamename']);
		$Robotconfig->where($condition)->delete(); 
		$this->redirect('Robot/index');
	}
}