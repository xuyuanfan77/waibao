<?php
/*
转换配置字段解释：
type：			1：动态赔率类型、2：固定赔率类型
name：			转换名称
lotteryname：	采集名称
handle：		处理函数（传入为号码数组，返回为转换后的开奖号码数组）
water：			抽水
interval：		开奖时间间隔（以秒为单位）
baseissue：		基准期数
basetime：		基准开奖时间（只接受年月日时分秒，如：2016-11-02 09:20:00）
aheadissue：	提前写入期数
aheaddeadline：	开奖提前截至竞猜秒数
delayruntime：	延迟开奖秒数
period_begin：	一天中第一期开奖时间（只接受时分秒，如：09:00:00）
period_end：	一天中最后一期开奖时间（只接受时分秒，如：23:59:59）
*/
return array(
	'pc28'=>array(
		'type'=>'1',
		'name'=>'pc28',
		'lotteryname'=>'北京快乐8',
		'handle'=>function($arg){
			for($index=1;$index<=20;$index++){
				$number[$index-1]=$arg['num'.$index];
			}
			sort($number);
			$data['num1'] = ($number[0]+$number[1]+$number[2]+$number[3]+$number[4]+$number[5])%10;
			$data['num2'] = ($number[6]+$number[7]+$number[8]+$number[9]+$number[10]+$number[11])%10;
			$data['num3'] = ($number[12]+$number[13]+$number[14]+$number[15]+$number[16]+$number[17])%10;
			$data['fknum1'] = $data['num1'];
			$data['fknum2'] = $data['num2'];
			$data['fknum3'] = ($data['num3']+1)%10;
			return $data;
		},
		'water'=>30,
		'interval'=>300,
		'baseissue'=>789853,
		'basetime'=>'2016-11-02 09:20:00',
		'aheadissue'=>4,
		'aheaddeadline'=>60,
		'delayruntime'=>60,
		'period_begin'=>'09:05:00',
		'period_end'=>'23:55:00',
	),
	'js28'=>array(
		'type'=>'1',
		'name'=>'js28',
		'lotteryname'=>'韩国快乐8',
		'handle'=>function($arg){
			for($index=1;$index<=20;$index++){
				$number[$index-1]=$arg['num'.$index];
			}
			sort($number);
			$data['num1'] = ($number[0]+$number[1]+$number[2]+$number[3]+$number[4]+$number[5])%10;
			$data['num2'] = ($number[6]+$number[7]+$number[8]+$number[9]+$number[10]+$number[11])%10;
			$data['num3'] = ($number[12]+$number[13]+$number[14]+$number[15]+$number[16]+$number[17])%10;
			$data['fknum1'] = $data['num1'];
			$data['fknum2'] = $data['num2'];
			$data['fknum3'] = ($data['num3']+1)%10;
			return $data;
		},
		'water'=>30,
		'interval'=>90,
		'baseissue'=>140871,
		'basetime'=>'2016-11-01 13:45:00',
		'aheadissue'=>4,
		'aheaddeadline'=>60,
		'delayruntime'=>60,
		'period_begin'=>'00:00:00',
		'period_end'=>'23:58:30',
	),
	'js16'=>array(
		'type'=>'1',
		'name'=>'js16',
		'lotteryname'=>'韩国快乐8',
		'handle'=>function($arg){
			for($index=1;$index<=20;$index++){
				$number[$index-1]=$arg['num'.$index];
			}
			sort($number);
			$data['num1'] = ($number[0]+$number[1]+$number[2]+$number[3]+$number[4]+$number[5])%6+1;
			$data['num2'] = ($number[6]+$number[7]+$number[8]+$number[9]+$number[10]+$number[11])%6+1;
			$data['num3'] = ($number[12]+$number[13]+$number[14]+$number[15]+$number[16]+$number[17])%6+1;
			$data['fknum1'] = $data['num1'];
			$data['fknum2'] = $data['num2'];
			$data['fknum3'] = $data['num3']%6+1;
			return $data;
		},
		'water'=>30,
		'baseissue'=>140871,
		'basetime'=>'2016-11-01 13:45:00',
		'interval'=>90,
		'aheadissue'=>4,
		'aheaddeadline'=>60,
		'delayruntime'=>60,
		'period_begin'=>'00:00:00',
		'period_end'=>'23:58:30',
	),
	'fk28'=>array(
		'type'=>'1',
		'name'=>'fk28',
		'lotteryname'=>'随机奖号',
		'handle'=>function($arg){
			for($index=1;$index<=20;$index++){
				$number[$index-1]=$arg['num'.$index];
			}
			sort($number);
			$data['num1'] = ($number[0]+$number[1]+$number[2]+$number[3]+$number[4]+$number[5])%10;
			$data['num2'] = ($number[6]+$number[7]+$number[8]+$number[9]+$number[10]+$number[11])%10;
			$data['num3'] = ($number[12]+$number[13]+$number[14]+$number[15]+$number[16]+$number[17])%10;
			$data['fknum1'] = $data['num1'];
			$data['fknum2'] = $data['num2'];
			$data['fknum3'] = ($data['num3']+1)%10;
			return $data;
		},
		'water'=>30,
		'baseissue'=>324331,
		'basetime'=>'2016-11-01 00:00:00',
		'interval'=>90,
		'aheadissue'=>4,
		'aheaddeadline'=>60,
		'delayruntime'=>60,
		'period_begin'=>'00:00:00',
		'period_end'=>'23:58:30',
	),
	'fksc'=>array(
		'type'=>'1',
		'name'=>'fksc',
		'lotteryname'=>'北京PK10',
		'handle'=>function($arg){
			$data['num1'] = $arg['num1'];
			$data['fknum1'] = $arg['num2'];
			return $data;
		},
		'water'=>30,
		'baseissue'=>584243,
		'basetime'=>'2016-11-01 09:07:00',
		'interval'=>300,
		'aheadissue'=>4,
		'aheaddeadline'=>60,
		'delayruntime'=>60,
		'period_begin'=>'09:07:00',
		'period_end'=>'23:57:00',
	),
	'jnd28'=>array(
		'type'=>'2',
		'name'=>'jnd28',
		'lotteryname'=>'北京快乐8',
		'handle'=>function($arg){
			for($index=1;$index<=20;$index++){
				$number[$index-1]=$arg['num'.$index];
			}
			sort($number);
			$data['num1'] = ($number[0]+$number[1]+$number[2]+$number[3]+$number[4]+$number[5])%10;
			$data['num2'] = ($number[6]+$number[7]+$number[8]+$number[9]+$number[10]+$number[11])%10;
			$data['num3'] = ($number[12]+$number[13]+$number[14]+$number[15]+$number[16]+$number[17])%10;
			$data['fknum1'] = $data['num1'];
			$data['fknum2'] = $data['num2'];
			$data['fknum3'] = ($data['num3']+1)%10;
			return $data;
		},
		'water'=>30,
		'interval'=>300,
		'baseissue'=>789853,
		'basetime'=>'2016-11-02 09:20:00',
		'aheadissue'=>4,
		'aheaddeadline'=>60,
		'delayruntime'=>60,
		'period_begin'=>'09:05:00',
		'period_end'=>'23:55:00',
	),
);