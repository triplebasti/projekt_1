<?php

namespace Kernel\Controller;

use Zend\Console\Response;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Kernel\Model\KernelAPI;
use Doctrine\ORM\EntityManager;


class KernelController extends AbstractActionController
{
	public function indexAction(){
		unset($_SESSION['Userid']);
		$returnArray = array();
		$api = new \Kernel\Model\KernelAPI($this->getServiceLocator());
		$post = $this->getRequest()->getPost();
		if(!empty($post['login'])){
			if($api->login($post['login'],$post['password'])){
				return $this->redirect()->toRoute('loginarea');
			}
		}
		
	}
	
	public function controllAction(){
		$post = $this->getRequest()->getPost();
		$returnArray = array();
		if(isset($post['data']['login'])){
			$returnArray['Check'] = true;
		}
		return new JsonModel($returnArray);
	}
	
	public function loginareaAction(){
		if(!isset($_SESSION['Userid'])){
			return $this->redirect()->toRoute('login');
		}else{
			
		}
	}

}