<?php
namespace Service;

header("Content-Type: text/html;charset=utf-8");

class Collect {
	public function period_check($config){
		$curtime = date("H:i:s");
		if($curtime>=$config['period_begin'] && $curtime<=$config['period_end']){
			return true;
		} else {
			return false;
		}
	}

	public function data_check($cacheData,$config){
		switch ($config['type'])
		{
			case 1:
				$newData = Collect::web_collect($config);
				break;
			case 2:
				$newData = Collect::produce_collect($config);
				break;
			default:
				break;
		}
		if($newData){
			$lotteryName = $config['name'];
			$oldData = $cacheData[$lotteryName];
			if($oldData['issue']!=$newData['issue']){
				return $newData;
			}
		}	
		return false;
	}

	public function web_collect($config){
		$ch = curl_init($config['page']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$respone = curl_exec($ch);
		curl_close($ch);
		
		
		if($config['range_lenght']){
			$respone = substr($respone,$config['range_begin'],$config['range_lenght']);		
		}
		if($config['rules']){
			preg_match($config['rules'],$respone,$content);
		}else{
			$content = $respone;
		}
		if(!empty($content)){
			$data = $config['handle']($content);
			return $data;
		}else{
			return false;
		}
	}
	
	public function produce_collect($config){
		for($index=0;$index<20;$index++){
			$content[$index] = mt_rand(0,100);
		}
		$data = $config['handle']($content);
		return $data;
	}
	
	public function data_write($data,$config){
		$lotteryData['name'] = $config['name'];
		$lotteryData['issue'] = $data['issue'];
		for ($index=1; $index<=20; $index++) {
		  $lotteryData['num'.$index] = $data['num'][$index-1];
		}
		$lotteryData['runtime'] = $data['runtime'];
		$lotteryData['createtime'] = date('Y-m-d H:i:s');
		$Lottery = M('Lottery');
		if ($Lottery->create($lotteryData)){
			$Lottery->add();
			return $lotteryData;
		} else {
			return false;
		}
	}
}