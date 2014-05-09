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
		$returnArray = array();
		$api = new \Kernel\Model\KernelAPI($this->getServiceLocator());
		
	}
	
	public function controllAction(){
		$post = $this->getRequest()->getPost();
		$returnArray = array();
		if(isset($post['data']['login'])){
			$returnArray['Check'] = true;
		}
		return new JsonModel($returnArray);
	}

}