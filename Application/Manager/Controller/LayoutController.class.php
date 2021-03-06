<?php
namespace Manager\Controller;
use Think\Controller;
header("Content-Type: text/html;charset=utf-8");
class LayoutController extends Controller {
    protected function initLayout($page){
		if($page == "account"){
			$this->assign('navbarDispaly',"none");
			$this->assign('logoutDispaly',"none");
		}elseif($page == "collect"){
			$this->assign('navbarDispaly',"inherit");
			$this->assign('logoutDispaly',"inherit");
			$navbarColor = array("#eee","#fff","#fff","#fff","#fff","#fff");
			$this->assign('navbarColor',$navbarColor);
		}elseif($page == "transform"){
			$this->assign('navbarDispaly',"inherit");
			$this->assign('logoutDispaly',"inherit");
			$navbarColor = array("#fff","#eee","#fff","#fff","#fff","#fff");
			$this->assign('navbarColor',$navbarColor);
		}elseif($page == "guess"){
			$this->assign('navbarDispaly',"inherit");
			$this->assign('logoutDispaly',"inherit");
			$navbarColor = array("#fff","#fff","#eee","#fff","#fff","#fff");
			$this->assign('navbarColor',$navbarColor);
		}elseif($page == "robot"){
			$this->assign('navbarDispaly',"inherit");
			$this->assign('logoutDispaly',"inherit");
			$navbarColor = array("#fff","#fff","#fff","#eee","#fff","#fff");
			$this->assign('navbarColor',$navbarColor);
		}elseif($page == "fengkong"){
			$this->assign('navbarDispaly',"inherit");
			$this->assign('logoutDispaly',"inherit");
			$navbarColor = array("#fff","#fff","#fff","#fff","#eee","#fff");
			$this->assign('navbarColor',$navbarColor);
		}elseif($page == "odds"){
			$this->assign('navbarDispaly',"inherit");
			$this->assign('logoutDispaly',"inherit");
			$navbarColor = array("#fff","#fff","#fff","#fff","#fff","#eee");
			$this->assign('navbarColor',$navbarColor);
		}
	}
}