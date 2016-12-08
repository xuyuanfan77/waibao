<?php
namespace Manager\Model;
use Think\Model\ViewModel;
class ModeAutoViewModel extends ViewModel {
	public $viewFields = array(
		'User'=>array(
			'id'=>'userid',
			'money',
			'_type'=>'RIGHT',
			
		),
		'Automatic'=>array(
			'id',
			'gamename',
			'issuebg',
			'issuenum',
			'moneymin',
			'moneymax',
			'status',
			'_type'=>'LEFT',
			'_on'=>'Automatic.userid=User.id',
		),
		'Mode'=>array(
			'id'=>'modeid',
			'money0',
			'money1',
			'money2',
			'money3',
			'money4',
			'money5',
			'money6',
			'money7',
			'money8',
			'money9',
			'money10',
			'money11',
			'money12',
			'money13',
			'money14',
			'money15',
			'money16',
			'money17',
			'money18',
			'money19',
			'money20',
			'money21',
			'money22',
			'money23',
			'money24',
			'money25',
			'money26',
			'money27',
			'totalmoney',
			'_on'=>'Mode.id=Automatic.modeid',
		),
	);
 }