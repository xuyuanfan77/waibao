<?php
namespace Manager\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class IndexController extends Controller {
    public function index(){
        $this->redirect('Trigger/trigger');
	}
}