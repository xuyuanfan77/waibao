<?php
namespace Manager\Controller;
header("Content-Type: text/html;charset=utf-8");
class FengkongformController extends LayoutController {
    public function index(){
		if(cookie('PHPSESSID') && session('admin_id') && cookie('PHPSESSID') == session('admin_id')) {
			$this->initLayout("fengkong");
			$this->display();
		} else {
			$this->redirect('Account/index');
		}
	}
	
	public function save(){
		$User = M("User");
		$condition['username'] = array('eq',$_POST['username']);
		$userData = $User->where($condition)->find();
		if($userData){
			$userData['control'] = 1;
			$User->save($userData); 
		}
		$this->redirect('Fengkong/index');
	}
}