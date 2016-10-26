<?php
namespace Manager\Controller;
header("Content-Type: text/html;charset=utf-8");
class TransformController extends LayoutController {
    public function index(){
		if(cookie('PHPSESSID') && session('admin_id') && cookie('PHPSESSID') == session('admin_id')) {
			$this->initLayout("transform");
			$configData = C('transform');
			$this->assign('configData',$configData);
			$this->display();
		} else {
			$this->redirect('Account/index');
		}
	}
}