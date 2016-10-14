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
				for($index=1;$index<=20;$index++){
					$number[$index-1]=$arg['num'.$index];
				}
				sort($number);
				$data['num1'] = ($number[0]+$number[1]+$number[2]+$number[3]+$number[4]+$number[5])%10;
				$data['num2'] = ($number[6]+$number[7]+$number[8]+$number[9]+$number[10]+$number[11])%10;
				$data['num3'] = ($number[12]+$number[13]+$number[14]+$number[15]+$number[16]+$number[17])%10;
				return $data;
			},
			'water'=>'30',
			'interval'=>300,
			'aheadissue'=>3,
			'aheaddeadline'=>60,
			'delayruntime'=>60,
		),
		'极速28'=>array(
			'name'=>'极速28',
			'lotteryname'=>'韩国快乐8',
			'handle'=>function($arg){
				for($index=1;$index<=20;$index++){
					$number[$index-1]=$arg['num'.$index];
				}
				sort($number);
				$data['num1'] = ($number[0]+$number[1]+$number[2]+$number[3]+$number[4]+$number[5])%10;
				$data['num2'] = ($number[6]+$number[7]+$number[8]+$number[9]+$number[10]+$number[11])%10;
				$data['num3'] = ($number[12]+$number[13]+$number[14]+$number[15]+$number[16]+$number[17])%10;
				return $data;
			},
			'water'=>'30',
			'interval'=>90,
			'aheadissue'=>3,
			'aheaddeadline'=>60,
			'delayruntime'=>60,
		),
		'极速16'=>array(
			'name'=>'极速16',
			'lotteryname'=>'韩国快乐8',
			'handle'=>function($arg){
				for($index=1;$index<=20;$index++){
					$number[$index-1]=$arg['num'.$index];
				}
				sort($number);
				$data['num1'] = ($number[0]+$number[1]+$number[2]+$number[3]+$number[4]+$number[5])%6+1;
				$data['num2'] = ($number[6]+$number[7]+$number[8]+$number[9]+$number[10]+$number[11])%6+1;
				$data['num3'] = ($number[12]+$number[13]+$number[14]+$number[15]+$number[16]+$number[17])%6+1;
				return $data;
			},
			'water'=>'30',
			'interval'=>90,
			'aheadissue'=>3,
			'aheaddeadline'=>60,
			'delayruntime'=>60,
		),
		'疯狂赛车'=>array(
			'name'=>'疯狂赛车',
			'lotteryname'=>'北京PK10',
			'handle'=>function($arg){
				$data['num1'] = $arg['num1'];;
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