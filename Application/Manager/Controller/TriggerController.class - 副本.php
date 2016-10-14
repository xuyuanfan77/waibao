<?php
namespace Manager\Controller;

require 'collect.php';
require 'transform.php';
use Think\Controller;
use Service\Collect;
use Service\Transform;

header("Content-Type: text/html;charset=utf-8");

class TriggerController extends Controller {
    public function index(){
		//ignore_user_abort();//关闭浏览器后，继续执行php代码
		//set_time_limit(0);//程序执行时间无限制
		$sleep_time = 60;//多长时间执行一次
		while(true){
			$this->trigger();
			sleep($sleep_time);//等待时间，进行下一次操作。
		}
		exit();
	}
	
	// 每5秒钟执行一次
	public function trigger(){
		// 循环所有采集配置，不需要采集即放弃
		$collectConfig = C('collect');
		dump($collectConfig);
		foreach ($collectConfig as $config) {
			$config = $collectConfig[$index];
			$result = Collect::period_check($config);
			if($result){
				$newData = Collect::data_check($cacheData,$config);
				if($newData){
					$lotteryData = Collect::data_write($newData,$config);
					if($lotteryData){
						$lotteryData['flag'] = true;
						$cacheData[$config['name']] = $lotteryData;
					} 
				}
			}
		}
		
		dump($cacheData);
		
		// 循环所有转换配置，不需要转换即放弃
		$transformConfig = C('transform');
		foreach ($transformConfig as $config) {
			$data = $cacheData[$config['lotteryname']];
			$flag = $cacheData[$config['lotteryname']]['flag'];
			if($data && $flag){
				Transform::transform($data,$config);
				Transform::prewrite($data,$config);
				$cacheData[$config['lotteryname']]['flag'] = false;
			}
		}
	}
}