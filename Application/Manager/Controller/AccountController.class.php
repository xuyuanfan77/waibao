<?php
namespace Manager\Controller;
header("Content-Type: text/html;charset=utf-8");
class AccountController extends LayoutController {
    public function index(){
		$this->initLayout("account");
        $this->display();
	}
	
	/* 登录 */
	public function login(){
		$Admin = M('Admin');
		$condition['username'] = $_POST['username'];
		$condition['password'] = $_POST['password'];
		$adminData = $Admin->where($condition)->find();
		if($adminData) {
			$sessionID = session_id();
			session('admin_id', $sessionID);
			session('userId', $adminData['id']);
			session('userName', $adminData['username']);
			$this->redirect('Collect/index');
		} else {
			$this->redirect('Account/index');
		}
	}
	
	/* 退出 */
	public function logout(){
		session('[destroy]');
		$this->redirect('Account/index');
	}
}