<?php
namespace Home\Controller;

require 'collect.php';
use Think\Controller;
use Service\Collect;

header("Content-Type: text/html;charset=utf-8");

class TriggerController extends Controller {
    public function index(){

	}
	
	// 每5秒钟执行一次
	public function trigger(){
		// 循环所有采集配置，不需要采集即放弃
		$config = C('collect');
		foreach ($config as $value) {
			$curtime = date("H:i:s");
			if($curtime>=$value['period_begin'] && $curtime<=$value['period_end']){
				$hadNewData = Collect::collect($value);
				dump($value['name']);
				dump($hadNewData);
			}
		}
		
		// 循环所有转换配置，不需要转换即放弃
	}
}