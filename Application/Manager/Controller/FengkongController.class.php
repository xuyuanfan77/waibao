<?php
namespace Manager\Controller;
header("Content-Type: text/html;charset=utf-8");
class FengkongController extends LayoutController {
    public function index(){
		if(cookie('PHPSESSID') && session('admin_id') && cookie('PHPSESSID') == session('admin_id')) {
			$this->initLayout("fengkong");
			$User = M("User");
			$condition['control'] = array('eq',1);
			$userData = $User->where($condition)->select();
			$this->assign('userData',$userData);
			$this->display();
		} else {
			$this->redirect('Account/index');
		}
	}
	
	public function del(){
		$User = M("User");
		$condition['id'] = array('eq',$_GET['userid']);
		$userData = $User->where($condition)->find();
		if($userData){
			$userData['control'] = 0;
			$User->save($userData); 
			$this->redirect('Fengkong/index');
		}
	}
}