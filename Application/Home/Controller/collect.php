<?php
namespace Service;

require 'vendor/autoload.php';
use QL\QueryList;

header("Content-Type: text/html;charset=utf-8");

class Collect {
	// 对网页数据采集
	public function web_collect($page,$rules,$range){
		$data = QueryList::Query($page,$rules,$range)->data;
		return $data;
	}
	
	// 对json数据采集
	public function json_collect($page){
		$json = QueryList::Query($page)->html;
		$data = json_decode($json);
		return $data[0];
	}
	
	// 自动生成数据
	public function produce_collect(){
		
	}
	
	// 检测是否新数据
	public function data_check($data){
		return $data;
	}
	
	// 数据写入数据库
	public function data_write($data){
		return $data;
	}
	
	// 采集数据
	public function collect($config) {
		// 根据不同的采集类型进行采集
		switch ($config['type'])
		{
			case 1:
				$data = Collect::web_collect($config['page'],$config['rules'],$config['range']);
				break;
			case 2:
				$data = Collect::json_collect($config['page']);
				break;
			case 3:
				$data = Collect::produce_collect();
				break;
			default:
				echo "No number between 1 and 3";
		}
		// 检测采集回来是否是新数据
		$isNewData = Collect::data_check($data);
		// 如果是新数据就写入数据库
		$hadNewData = false;
		if($isNewData){
			$hadNewData = Collect::data_write($data);
		}
		
		return $hadNewData;
	}
}