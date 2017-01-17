<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class IndexController extends Controller {
    public function index(){
        if(!$_GET['page'])
			$page = 'login';
		else
			$page = $_GET['page'];
		$page = 'Index:'.$page;
		$this->display($page);
	}
	
	public function login(){
		$User = M('User');
		$condition['username'] = $_POST['username'];
		$condition['password'] = $_POST['password'];
		$userData = $User->where($condition)->find();
		if($userData) {
			$sessionID = session_id();
			session('id', $sessionID);
			session('userId', $userData['id']);
			$this->redirect('Num/index');
		} else {
			$this->redirect('Index/index', array('page'=>'login'));
		}
	}
	
	public function register(){
		$postData = $_POST;
		$postData['id'] = uniqid();
		$postData['money'] = 100000000;
		$postData['createtime'] = date('Y-m-d H:i:s');
		$User = M('User');
		$User->create($postData);
		$User->add();
		$this->redirect('Index/index', array('page'=>'login'));
	}
	
	public function logout(){
		session('[destroy]');
		$this->redirect('Index/index', array('page'=>'login'));
	}
}