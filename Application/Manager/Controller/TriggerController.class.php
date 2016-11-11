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
		ignore_user_abort(true);			//关闭浏览器后，继续执行php代码
		set_time_limit(0);					//程序执行时间无限制
		$sleep_time = 3;					//多长时间执行一次
		while(true){
			$this->trigger();
			sleep($sleep_time);				//等待时间，进行下一次操作。
		}
		exit();
	}
	
	// 逻辑业务操作（包括采集和转换）
	public function trigger(){
		// 循环所有采集配置进行采集
		$collectConfig = C('collect');											// 读出采集配置
		foreach ($collectConfig as $config) {
			$result = Collect::period_check($config);							// 不在采集时间范围内则放弃采集
			if($result){
				$newData = Collect::data_check($this->cacheData,$config);		// 采集数据并检查是不是新的数据
				if($newData){
					$lotteryData = Collect::data_write($newData,$config);		// 将新数据写入数据库
					if($lotteryData){
						$lotteryData['flag'] = true;							// 标记该数据尚未转换
						$this->cacheData[$config['name']] = $lotteryData;		// 同时在内存中保存一份该数据，减少数据库的频繁读取
					} 
				}
			}
		}
		
		// 循环所有转换配置进行转换
		$transformConfig = C('transform');										// 读出转换配置
		foreach ($transformConfig as $config) {
			$data = $this->cacheData[$config['lotteryname']];
			$flag = $this->cacheData[$config['lotteryname']]['flag'];
			if($data && $flag){													// 已经存在采集回来的数据并且该数据并未转换
				Transform::transform($data,$config);							// 将采集数据转换成游戏数据并存库
				Transform::calculate($data,$config);							// 游戏数据开奖
				Transform::prewrite($data,$config);								// 提前写入往前n期的游戏数据
			}
		}
		foreach ($transformConfig as $config) {
			$this->cacheData[$config['lotteryname']]['flag'] = false;			// 将内存中的所有数据标记为已转换
		}
	}
}