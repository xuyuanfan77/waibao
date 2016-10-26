<?php
namespace Manager\Controller;
header("Content-Type: text/html;charset=utf-8");
class CollectController extends LayoutController {
    public function index(){
		if(cookie('PHPSESSID') && session('admin_id') && cookie('PHPSESSID') == session('admin_id')) {
			$this->initLayout("collect");
			$configData = C('collect');
			$this->assign('configData',$configData);
			$this->display();
		} else {
			$this->redirect('Account/index');
		}
	}
}