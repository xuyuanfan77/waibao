<?php
namespace Home\Controller;

require 'vendor/autoload.php';
use Think\Controller;
use QL\QueryList;
header("Content-Type: text/html;charset=utf-8");

class CollectController extends Controller {
    public function index(){

	}

	// 对网页数据采集
	public function web_collect(){
		//快乐8
		/* $page = 'http://www.bwlc.gov.cn/bulletin/keno.html';
		$rules = array(
			'issue' => array('td:eq(0)','text'),
			'num' => array('td:eq(1)','text'),
			'runtime' => array('td:eq(3)','text'),
		);
		$range = '.lott_cont table tr[class]';*/
		
		//PK拾
		$page = 'http://www.bwlc.net/bulletin/trax.html';
		$rules = array(
		   'issue' => array('td:eq(0)','text'),
		   'num' => array('td:eq(1)','text'),
		   'runtime' => array('td:eq(2)','text'),
		);
		$range = '.lott_cont table tr[class]';
		$data = QueryList::Query($page,$rules,$range)->data;

		dump($data);
		
		
	}
	
	// 对json数据采集
	public function json_collect(){
		//快乐8（韩国）
		$page = 'http://www.tlotto.kr/ttt.json';
		$rules = array();
		$range = '';
		
		$data = QueryList::Query($page,$rules,$range)->html;
		$json = json_decode($data);

		dump($json);
	}
	
	// 自动生成数据
	public function produce_collect(){
		
	}
	
	// 数据写入数据库
	public function data_write(){
		
	}
}