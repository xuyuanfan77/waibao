<?php
return array(
	//'配置项'=>'配置值'
	'collect'=>array(
		'beijingkuaile8'=>array(
			'page'=>'http://www.bwlc.gov.cn/bulletin/keno.html',
			'rules'=>array(
				'issue' => array('td:eq(0)','text'),
				'num' => array('td:eq(1)','text'),
				'runtime' => array('td:eq(3)','text'),
			),
			'range'=>'.lott_cont table tr[class]',
			'interval'=>'30',
			'period_begin'=>'14:53:31',
			'period_end'=>'14:53:31',
			'firstissue'=>'100000',
			'firstruntime'=>'2016-09-08 14:53:31',
			'nextissue'=>'100000',
			'nextruntime'=>'2016-09-08 14:53:31',
		),
		'beijingpk10'=>array(
		
		),
		'koreakuaile8'=>array(
		
		),
	),
	'transform'=>array(
	
	),
);