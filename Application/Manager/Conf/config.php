<?php
return array(
	// 采集配置
	'collect'=>array(
		'北京快乐8'=>array(
			'type'=>'1',
			'name'=>'北京快乐8',
			'page'=>'http://www.bwlc.gov.cn/bulletin/keno.html',
			'rules'=>'/<tr class="">[\s\S]*<td>([\s\S]*)<\/td>[\s\S]*<td>([\s\S]*)<\/td>[\s\S]*<td>([\s\S]*)<\/td>[\s\S]*<td>([\s\S]*)<\/td>[\s\S]*<\/tr>/i',
			'range_begin'=>'11900',
			'range_lenght'=>'400',
			'handle'=>function($arg){
				$data['issue'] = $arg[1];
				$data['num'] = explode(',',$arg[2]);
				$data['runtime'] = $arg[4];
				return $data;
			},
			'period_begin'=>'00:00:00',
			'period_end'=>'23:59:59',
		),
		'北京PK10'=>array(
			'type'=>'1',
			'name'=>'北京PK10',
			'page'=>'http://www.bwlc.net/bulletin/trax.html',
			'rules'=>'/<tr class="">[\s\S]*<td>([\s\S]*)<\/td>[\s\S]*<td>([\s\S]*)<\/td>[\s\S]*<td>([\s\S]*)<\/td>[\s\S]*<\/tr>/i',
			'range_begin'=>'11800',
			'range_lenght'=>'400',
			'handle'=>function($arg){
				$data['issue'] = $arg[1];
				$data['num'] = explode(',',$arg[2]);
				$data['runtime'] = $arg[3];
				return $data;
			},
			'period_begin'=>'00:00:00',
			'period_end'=>'23:59:59',
		),
		'韩国快乐8'=>array(
			'type'=>'1',
			'name'=>'韩国快乐8',
			'page'=>'http://www.tlotto.kr/ttt.json',
			'rules'=>'/\[([\s\S]*),\{/i',
			'range_begin'=>'0',
			'range_lenght'=>'350',
			'handle'=>function($arg){
				$json_data = json_decode($arg[1],true);
				$data['issue'] = $json_data['periodNO'];
				for($index=1;$index<=20;$index++){
					$data['num'][$index-1]=$json_data['S'.$index];
				}
				$data['runtime'] = date("Y-m-d H:i:s",$json_data['cDate']);
				return $data;
			},
			'period_begin'=>'00:00:00',
			'period_end'=>'23:59:59',
		),
	),
	
	// 转换配置
	'transform'=>array(
		'PC28'=>array(
			'name'=>'PC28',
			'lotteryname'=>'北京快乐8',
			'handle'=>function($arg){
				$data['num1'] = ($arg['num1']+$arg['num2']+$arg['num3']+$arg['num4']+$arg['num5']+$arg['num6'])%10;
				$data['num2'] = ($arg['num7']+$arg['num8']+$arg['num9']+$arg['num10']+$arg['num11']+$arg['num12'])%10;
				$data['num3'] = ($arg['num13']+$arg['num14']+$arg['num15']+$arg['num16']+$arg['num17']+$arg['num18'])%10;
				return $data;
			},
			'water'=>'30',
			'interval'=>300,
			'aheadissue'=>3,
			'aheaddeadline'=>60,
			'delayruntime'=>60,
		),
	),
);