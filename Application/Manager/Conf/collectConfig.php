<?php
return array(
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
		'period_begin'=>'09:05:00',
		'period_end'=>'23:55:00',
	),
	/*'北京快乐8'=>array(
		'type'=>'1',
		'name'=>'北京快乐8',
		'page'=>'http://api.caipiaokong.com/lottery/?name=bjklb&format=json&num=1&uid=282791&token=68bf6196868e4aaa85da91e0d329cd622c33229e',
		'rules'=>'',
		'range_begin'=>'0',
		'range_lenght'=>'0',
		'handle'=>function($arg){
			$json_data = json_decode($arg,true);
			foreach($json_data as $key=>$value){
				$data['issue'] = $key;
				$data['num'] = explode(',',$value['number']);
				$data['runtime'] = $value['dateline'];
			}
			
			return $data;
		},
		'period_begin'=>'09:05:00',
		'period_end'=>'23:55:00',
	),*/
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
		'period_begin'=>'09:08:00',
		'period_end'=>'23:58:00',
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
			$data['runtime'] = date("Y-m-d H:i:s",strtotime('-1 hour',$json_data['cDate']));
			return $data;
		},
		'period_begin'=>'00:00:00',
		'period_end'=>'23:59:59',
	),
	'随机奖号'=>array(
		'type'=>'2',
		'name'=>'随机奖号',
		'page'=>'',
		'rules'=>'',
		'range_begin'=>'',
		'range_lenght'=>'',
		'handle'=>function($arg){
			$timeStamp1 = strtotime(date("Y-m-d H:i:s")); 
			$timeStamp2 = strtotime("2016-11-01 00:00:00"); 
			$data['issue'] = floor(($timeStamp1-$timeStamp2)/90)+324331;
			for($index=0;$index<20;$index++){
				$data['num'][$index]=$arg[$index];
			}
			$data['runtime'] = date("Y-m-d H:i:s",floor(($timeStamp1)/90)*90);
			return $data;
		},
		'period_begin'=>'00:00:00',
		'period_end'=>'23:59:59',
	),
);