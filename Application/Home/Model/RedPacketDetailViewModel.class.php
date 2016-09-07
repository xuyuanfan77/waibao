<?php
namespace Home\Model;
use Think\Model\ViewModel;
class RedPacketDetailViewModel extends ViewModel {
	public $viewFields = array(
		'User'=>array(
			'id'=>'user_id',
			'username',
			'password',
			'money'=>'user_money',
			'createtime'=>'user_createtime',
			'_type'=>'RIGHT',
		),
		'Receiver'=>array(
			'id'=>'receiver_id',
			'receiver',
			'redpacket',
			'money'=>'receiver_money',
			'createtime'=>'receiver_createtime',
			'_type'=>'LEFT',
			'_on'=>'User.id=Receiver.receiver',
		),
		'Redpacket'=>array(
			'id'=>'redpacket_id',
			'publisher',
			'money'=>'redpacket_money',
			'number',
			'distribution',
			'overtime',
			'lasttime'=>'redpacket_lasttime',
			'createtime'=>'redpacket_createtime',
			'_on'=>'Redpacket.id=Receiver.redpacket',
		),
	);
 }