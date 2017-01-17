<?php
namespace Manager\Controller;
header("Content-Type: text/html;charset=utf-8");
class OddsformController extends LayoutController {
    public function index(){
		if(cookie('PHPSESSID') && session('admin_id') && cookie('PHPSESSID') == session('admin_id')) {
			$this->initLayout("odds");
			if($_GET['gamename']){
				$Odds = M('Odds');
				$condition['gamename'] = array('eq',$_GET['gamename']);
				$configData = $Odds->where($condition)->find();
				if($configData) {
					$this->assign('configData',$configData);
				}
			}
			$this->display();
		} else {
			$this->redirect('Account/index');
		}
	}
	
	public function save(){
		$Odds = M('Odds');
		$condition['gamename'] = array('eq',$_POST['gamename']);
		$configData = $Odds->where($condition)->find();
		if($configData){
			$configData['gamename'] = $_POST['gamename'];
			for($index=0; $index<38; $index++){
				$configData['odds'.$index] = $_POST['odds'.$index];
			}
			$Odds->save($configData);
		}else{
			$Odds->data($_POST)->add();
		}
		
		$this->redirect('Odds/index');
	}
}