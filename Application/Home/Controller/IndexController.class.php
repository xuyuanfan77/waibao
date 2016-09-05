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
			$this->redPacketList();
		} else {
			$this->redirect('Index/index', array('page'=>'login'));
		}
	}
	
	public function register(){
		$_POST['money'] = 100;
		$_POST['createtime'] = date('Y-m-d H:i:s');
		$postData = $_POST;
		$User = M('User');
		$User->create($postData);
		$User->add();
		$this->redirect('Index/index', array('page'=>'login'));
	}
	
	public function logout(){
		session('[destroy]');
		$this->redirect('Index/index', array('page'=>'login'));
	}
	
	public function publish(){
		$_POST['publisher'] = session('userId');
		
		$User = M('User');
		$condition['id'] = session('userId');
		$userData = $User->where($condition)->find();
		$_POST['username'] = $userData['username'];
		
		$_POST['lasttime'] = date('Y-m-d H:i:s');
		$_POST['createtime'] = date('Y-m-d H:i:s');
		$postData = $_POST;
		$Redpacket = M('Redpacket');
		$Redpacket->create($postData);
		$Redpacket->add();
		$this->redPacketList();
	}
	
	public function redPacketList(){
		$User = M('User');
		$condition['id'] = session('userId');
		$userData = $User->where($condition)->find();
		$this->assign('user',$userData);
		
		$Redpacket = M('Redpacket');
		$redpacketData = $Redpacket->select();
		$this->assign('redpacketlist',$redpacketData);
		$this->display("Index:redPacketList");
	}
	
	public function redPacket(){
		$User = M('User');
		$userCondition['id'] = session('userId');
		$userData = $User->where($userCondition)->find();
		$this->assign('user',$userData);

		$RedPacketDetail = D('RedPacketDetailView');
		$redPacketCondition['redpacket'] = $_GET['redPacketId'];
		$redPacketDetailData = $RedPacketDetail->where($redPacketCondition)->select();
		$this->assign('redPacketDetail',$redPacketDetailData);
		
		$this->display("Index:redPacket");
	}
}