<?php
namespace Service;

header("Content-Type: text/html;charset=utf-8");

class Collect {
	// 检测是否时间段合法
	public function period_check($config){
		$curtime = date("H:i:s");
		if($curtime>=$config['period_begin'] && $curtime<=$config['period_end']){
			return true;
		} else {
			return false;
		}
	}
	
	// 检测是否新数据
	public function data_check($cacheData,$config){
		switch ($config['type'])
		{
			case 1:
				$newData = Collect::web_collect($config);
				break;
			case 2:
				$newData = Collect::produce_collect();
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
	
	// 对网页数据采集
	public function web_collect($config){
		$ch = curl_init($config['page']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$respone = curl_exec($ch);
		curl_close($ch);
		
		$respone = substr($respone,$config['range_begin'],$config['range_lenght']);
		preg_match($config['rules'],$respone,$content);
		if(!empty($content)){
			$data = $config['handle']($content);
			return $data;
		}else{
			return false;
		}
	}
	
	// 自动生成数据
	public function produce_collect(){
		
	}
	
	// 数据写入数据库
	public function data_write($data,$config){
		$lotteryData['id'] = uniqid();
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