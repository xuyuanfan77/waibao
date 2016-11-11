<?php
namespace Service;

header("Content-Type: text/html;charset=utf-8");

class Collect {
	// 检测是否在采集时间段内
	public function period_check($config){
		$curtime = date("H:i:s");
		if($curtime>=$config['period_begin'] && $curtime<=$config['period_end']){
			return true;
		} else {
			return false;
		}
	}
	
	// 采集或者随机生成数据，并检测是否是新数据
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
			if($oldData['issue']!=$newData['issue']){					// 如果采集回来的期号与内存中保存的期号不一致，则为新数据
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
		$respone = curl_exec($ch);										// 根据采集配置中的page获取网页内容
		curl_close($ch);
		
		
		if($config['range_lenght']){									// 根据采集配置中的range_begin和range_lenght截取网页内容包含有用数据的区域
			$respone = substr($respone,$config['range_begin'],$config['range_lenght']);		
		}
		if($config['rules']){
			preg_match($config['rules'],$respone,$content);				// 根据采集配置中的rules匹配出有用数据
		}else{
			$content = $respone;
		}
		if(!empty($content)){
			$data = $config['handle']($content);						// 根据采集配置中的handle将有用数据转换成号码数组
			return $data;
		}else{
			return false;
		}
	}
	
	// 自动生成数据
	public function produce_collect($config){
		//产生20位随机数据
		for($index=0;$index<20;$index++){
			$content[$index] = mt_rand(0,100);
		}
		$data = $config['handle']($content);							// 根据采集配置中的handle将有用数据转换成号码数组
		return $data;
	}
	
	// 数据写入数据库
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