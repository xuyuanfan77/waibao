<?php
return array(
	'pc28'=>array(
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
			return $data;
		},
		'water'=>30,
		'interval'=>300,
		'aheadissue'=>4,
		'aheaddeadline'=>60,
		'delayruntime'=>60,
	),
	'js28'=>array(
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
			return $data;
		},
		'water'=>30,
		'interval'=>90,
		'aheadissue'=>4,
		'aheaddeadline'=>60,
		'delayruntime'=>60,
	),
	'js16'=>array(
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
			return $data;
		},
		'water'=>30,
		'interval'=>90,
		'aheadissue'=>4,
		'aheaddeadline'=>60,
		'delayruntime'=>60,
	),
	'fk28'=>array(
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
			return $data;
		},
		'water'=>30,
		'interval'=>90,
		'aheadissue'=>4,
		'aheaddeadline'=>60,
		'delayruntime'=>60,
	),
	'fksc'=>array(
		'name'=>'fksc',
		'lotteryname'=>'北京PK10',
		'handle'=>function($arg){
			$data['num1'] = $arg['num1'];;
			return $data;
		},
		'water'=>30,
		'interval'=>300,
		'aheadissue'=>4,
		'aheaddeadline'=>60,
		'delayruntime'=>60,
	),
);