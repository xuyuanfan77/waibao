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
	
	/* 登录 */
	public function login(){
		$User = M('User');
		$condition['username'] = $_POST['username'];
		$condition['password'] = $_POST['password'];
		$userData = $User->where($condition)->find();
		if($userData) {
			$sessionID = session_id();
			session('id', $sessionID);
			session('userId', $userData['id']);
			//$this->redPacketList();
			$this->redirect('Collect/collect');
		} else {
			$this->redirect('Index/index', array('page'=>'login'));
		}
	}
	
	/* 注册 */
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
	
	/* 退出 */
	public function logout(){
		session('[destroy]');
		$this->redirect('Index/index', array('page'=>'login'));
	}
	
	/* 发红包 */
	public function publish(){
		$User = M('User');
		$condition['id'] = session('userId');
		$userData = $User->where($condition)->find();
		if($userData['money'] >= $_POST['money']) {
			$postData = $_POST;
			$postData['id'] = uniqid();
			$postData['publisher'] = session('userId');
			$postData['username'] = $userData['username'];
			$postData['lasttime'] = date('Y-m-d H:i:s');
			$postData['createtime'] = date('Y-m-d H:i:s');

			$Redpacket = M('Redpacket');
			if($Redpacket->create($postData)){
				$result = $Redpacket->add();
				if($result){
					$userData['money'] = $userData['money'] - $_POST['money'];
					$User->save($userData);
				}
			}
		}
		$this->success('发红包成功', 'redPacketList', 0);
	}
	
	/* 红包列表 */
	public function redPacketList(){
		$User = M('User');
		$condition['id'] = session('userId');
		$userData = $User->where($condition)->find();
		$this->assign('user',$userData);
		
		$Redpacket = M('Redpacket');
		$redpacketData = $Redpacket->order('createtime')->select();
		$this->assign('redpacketlist',$redpacketData);
		$this->display("Index:redPacketList");
	}
	
	/* 抢红包 */
	public function redPacket(){
		$probability = 25;											// 抢红包概率
		$range = 50;												// 红包随机幅度
		
		unset($condition);
		$Receiver = M('Receiver');
		$condition['receiver'] = session('userId');
		$condition['redpacket'] = $_GET['redPacketId'];
		$receiverData = $Receiver->where($condition)->find();
		
		unset($condition);
		$Redpacket = M('Redpacket');
		$condition['id'] = $_GET['redPacketId'];
		$redpacketData = $Redpacket->where($condition)->find();
		
		unset($condition);
		$User = M('User');
		$condition['id'] = session('userId');
		$userData = $User->where($condition)->find();
		
		if($redpacketData['money']>0) {
			if(!$receiverData) {								// 还没抢过的可以抢
				$curProbability = rand(1,100);
				// 有25%的几率抢不到红包
				if($curProbability<=$probability){
					$moneyper = 0;
				// 有75%的几率可以抢红包
				} elseif ($curProbability>$probability && $redpacketData['distribution']==1){	// 平均红包
					$moneyper = floor($redpacketData['money']/$redpacketData['number']);
				} else {																		// 随机红包
					if($redpacketData['number']==1){											// 剩下最后一个红包时
						$moneyper = $redpacketData['money'];
					} else {
						$randnum = array();
						$randsum = 0;
						for($i=1;$i<=$redpacketData['number'];$i++){
							$randnum[$i] = rand(100-$range,100+$range);
							$randsum = $randsum+$randnum[$i];
						}
						$moneyper = floor($redpacketData['money']*$randnum[1]/$randsum);
					}
				}
				
				if($moneyper>0){
					$redpacketData['money'] = $redpacketData['money']-$moneyper;
					$redpacketData['number'] = $redpacketData['number'] - 1;
					$redpacketData['lasttime'] = date('Y-m-d H:i:s');
					$redpacketData['id'] = $_GET['redPacketId'];
					$Redpacket->save($redpacketData);

					$userData['money'] = $userData['money'] + $moneyper;
					$User->save($userData);
					
					$money = '你抢了'.$moneyper.'元';
				} else {
					$money = '很遗憾！此次没有抢到红包！';
				}
				$receiver['id'] = uniqid();
				$receiver['receiver'] = session('userId');
				$receiver['redpacket'] = $_GET['redPacketId'];
				$receiver['money'] = $moneyper;
				$receiver['createtime'] = date('Y-m-d H:i:s');
				$Receiver = M('Receiver');
				$Receiver->create($receiver);
				$Receiver->add();
			} else {												// 已经抢过的不能再抢了
				$money = '你抢了'.$receiverData['money'].'元';
			}
		} else {
			$money = '红包已抢完！';
		}

		unset($condition);
		$RedPacketDetail = D('RedPacketDetailView');
		$condition['redpacket'] = $_GET['redPacketId'];
		$redPacketDetailData = $RedPacketDetail->where($condition)->order('receiver_createtime')->select();
		
		$this->assign('user',$userData);							// 用户基础信息
		$this->assign('money',$money);								// 抢红包结果
		$this->assign('redPacketDetail',$redPacketDetailData);		// 抢红包记录
		
		$this->display("Index:redPacket");
	}
}