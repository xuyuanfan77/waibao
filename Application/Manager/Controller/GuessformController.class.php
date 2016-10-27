<?php
namespace Manager\Controller;
header("Content-Type: text/html;charset=utf-8");
class GuessformController extends LayoutController {
    public function index(){
		if(cookie('PHPSESSID') && session('admin_id') && cookie('PHPSESSID') == session('admin_id')) {
			$this->initLayout("guess");
			$configData = file_get_contents("./Application/Common/Conf/guessConfig.php");
			$this->assign('configData',$configData);
			$this->display();
		} else {
			$this->redirect('Account/index');
		}
	}
	
	public function save(){
		file_put_contents('./Application/Common/Conf/guessConfig.php',$_POST['config']);		
		$this->redirect('Collect/index');
	}
}