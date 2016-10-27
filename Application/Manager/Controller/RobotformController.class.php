<?php
namespace Manager\Controller;
header("Content-Type: text/html;charset=utf-8");
class RobotformController extends LayoutController {
    public function index(){
		if(cookie('PHPSESSID') && session('admin_id') && cookie('PHPSESSID') == session('admin_id')) {
			$this->initLayout("robot");
			if($_GET['gamename']){
				$Robotconfig = M('Robotconfig');
				$condition['gamename'] = array('eq',$_GET['gamename']);
				$configData = $Robotconfig->where($condition)->find();
				if($configData) {
					$this->assign('configData',$configData);
				}
			}
			$this->display();
		} else {
			$this->redirect('Account/index');
		}
	}
	
	public function save(){
		$Robotconfig = M('Robotconfig');
		$condition['gamename'] = array('eq',$_POST['gamename']);
		$configData = $Robotconfig->where($condition)->find();
		if($configData){
			$configData['gamename'] = $_POST['gamename'];
			for($index=0; $index<28; $index++){
				$configData['money'.$index] = $_POST['money'.$index];
			}
			$Robotconfig->save($configData);
		}else{
			$Robotconfig->data($_POST)->add();
		}
		
		$this->redirect('Robot/index');
	}
}