<?php
return array(
	// 采集配置
	'collect'=>array(
		1=>array(
			'type'=>'1',
			'name'=>'北京快乐8',
			'page'=>'http://www.bwlc.gov.cn/bulletin/keno.html',
			'rules'=>array(
				'issue' => array('td:eq(0)','text'),
				'num' => array('td:eq(1)','text','',function($content){return explode(',',$content);}),
				'runtime' => array('td:eq(3)','text'),
			),
			'range'=>'.lott_cont table tr:eq(1)',
			'period_begin'=>'00:00:00',
			'period_end'=>'23:59:59',
		),
		2=>array(
			'type'=>'1',
			'name'=>'北京PK10',
			'page'=>'http://www.bwlc.net/bulletin/trax.html',
			'rules'=>array(
				'issue' => array('td:eq(0)','text'),
				'num' => array('td:eq(1)','text','',function($content){return explode(',',$content);}),
				'runtime' => array('td:eq(2)','text'),
			),
			'range'=>'.lott_cont table tr:eq(1)',
			'period_begin'=>'00:00:00',
			'period_end'=>'23:59:59',
		),
		/*'koreakuaile8'=>array(
			'type'=>'2',
			'name'=>'koreakuaile8',
			'page'=>'http://www.tlotto.kr/ttt.json',
			'period_begin'=>'00:30:00',
			'period_end'=>'20:53:31',
		),*/
	),
	
	// 转换配置
	'transform'=>array(
		'PC28'=>array(
			'name'=>'PC28',
			'lotteryname'=>'北京快乐8',
			'water'=>'30',
			'interval'=>300,
			'aheadissue'=>3,
			'aheaddeadline'=>60,
			'delayruntime'=>60,
		),
	),
);