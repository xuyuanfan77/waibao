<?php
namespace Manager\Controller;

require 'collect.php';
require 'transform.php';
use Think\Controller;
use Service\Collect;
use Service\Transform;

header("Content-Type: text/html;charset=utf-8");

class TriggerController extends Controller {
	private $cacheData;
	
    public function index(){
		ignore_user_abort(true);
		set_time_limit(0);
		$sleep_time = 3;
		while(true){
			$this->trigger();
			sleep($sleep_time);
		}
		exit();
	}
	
	public function trigger(){
		$collectConfig = C('collect');
		foreach ($collectConfig as $config) {
			$result = Collect::period_check($config);
			if($result){
				$newData = Collect::data_check($this->cacheData,$config);
				if($newData){
					$lotteryData = Collect::data_write($newData,$config);
					if($lotteryData){
						$lotteryData['flag'] = true;
						$this->cacheData[$config['name']] = $lotteryData;
					} 
				}
			}
		}
		
		$transformConfig = C('transform');
		foreach ($transformConfig as $config) {
			$data = $this->cacheData[$config['lotteryname']];
			$flag = $this->cacheData[$config['lotteryname']]['flag'];
			if($data && $flag){
				Transform::transform($data,$config);
				Transform::calculate($data,$config);
				Transform::prewrite($data,$config);
			}
		}
		foreach ($transformConfig as $config) {
			$this->cacheData[$config['lotteryname']]['flag'] = false;
		}
	}
}