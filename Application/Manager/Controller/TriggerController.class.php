<?php
namespace Home\Controller;

require 'collect.php';
require 'transform.php';
use Think\Controller;
use Service\Collect;
use Service\Transform;

header("Content-Type: text/html;charset=utf-8");

class TriggerController extends Controller {
    public function index(){

	}
	
	// 每5秒钟执行一次
	public function trigger(){
		// 循环所有采集配置，不需要采集即放弃
		$collectConfig = C('collect');
		foreach ($collectConfig as $config) {
			$result = Collect::period_check($config);
			if($result){
				$newData = Collect::data_check($config);
				if($newData){
					$lotteryData = Collect::data_write($newData,$config);
					if($lotteryData){
						$lotteryData['flag'] = true;
						$_SESSION[$config['name']] = $lotteryData;
					}
				}
			}
		}

		dump($_SESSION);
		
		// 循环所有转换配置，不需要转换即放弃
		$transformConfig = C('transform');
		foreach ($transformConfig as $config) {
			$data = $_SESSION[$config['lotteryname']];
			$flag = $_SESSION[$config['lotteryname']]['flag'];
			if($data && $flag){
				Transform::transform($data,$config);
				Transform::prewrite($data,$config);
				$_SESSION[$config['lotteryname']]['flag'] = false;
			}
		}
	}
}