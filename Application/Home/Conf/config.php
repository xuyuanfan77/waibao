<?php
return array(
	// 采集配置
	'collect'=>array(
		1=>array(
			'type'=>'1',
			'name'=>'beijingkuaile8',
			'page'=>'http://www.bwlc.gov.cn/bulletin/keno.html',
			'rules'=>array(
				'issue' => array('td:eq(0)','text'),
				'num' => array('td:eq(1)','text'),
				'runtime' => array('td:eq(3)','text'),
			),
			'range'=>'.lott_cont table tr:eq(1)',
			'interval'=>'30',
			'period_begin'=>'17:28:00',
			'period_end'=>'20:53:31',
			'firstissue'=>'100000',
			'firstruntime'=>'2016-09-08 14:53:31',
			'nextissue'=>'100000',
			'nextruntime'=>'2016-09-08 14:53:31',
		),
		2=>array(
			'type'=>'1',
			'name'=>'beijingpk10',
			'page'=>'http://www.bwlc.net/bulletin/trax.html',
			'rules'=>array(
				'issue' => array('td:eq(0)','text'),
				'num' => array('td:eq(1)','text'),
				'runtime' => array('td:eq(2)','text'),
			),
			'range'=>'.lott_cont table tr:eq(1)',
			'interval'=>'30',
			'period_begin'=>'17:29:00',
			'period_end'=>'20:53:31',
			'firstissue'=>'100000',
			'firstruntime'=>'2016-09-08 14:53:31',
			'nextissue'=>'100000',
			'nextruntime'=>'2016-09-08 14:53:31',
		),
		3=>array(
			'type'=>'2',
			'name'=>'koreakuaile8',
			'page'=>'http://www.tlotto.kr/ttt.json',
			'interval'=>'30',
			'period_begin'=>'17:30:00',
			'period_end'=>'20:53:31',
			'firstissue'=>'100000',
			'firstruntime'=>'2016-09-08 14:53:31',
			'nextissue'=>'100000',
			'nextruntime'=>'2016-09-08 14:53:31',
		),
	),
	
	// 转换配置
	'transform'=>array(
	
	),
);