<?php
namespace Manager\Controller;
header("Content-Type: text/html;charset=utf-8");
class CollectformController extends LayoutController {
    public function index(){
		if(cookie('PHPSESSID') && session('admin_id') && cookie('PHPSESSID') == session('admin_id')) {
			$this->initLayout("collect");
			$configData = file_get_contents("./Application/Manager/Conf/collectConfig.php");
			$this->assign('configData',$configData);
			$this->display();
		} else {
			$this->redirect('Account/index');
		}
	}
	
	public function save(){
		file_put_contents('./Application/Manager/Conf/collectConfig.php',$_POST['config']);		
		$this->redirect('Collect/index');
	}
}