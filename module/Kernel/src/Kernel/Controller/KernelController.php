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
	
	public function controllNewAccAction(){
		$post = $this->getRequest()->getPost();
		$returnArray = array();
		$api = new \Kernel\Model\KernelAPI($this->getServiceLocator());
		if(isset($post['data']['login'])){
			$returnArray = $api->createNewAcc($post['data']);
		}
		return new JsonModel($returnArray);
	}
	
	public function loginareaAction(){
		if(!isset($_SESSION['Userid'])){
			return $this->redirect()->toRoute('login');
		}else{
			$returnArray = array();
			$api = new \Kernel\Model\KernelAPI($this->getServiceLocator());
			$returnArray = $api->getUserInformationForView();
			return $returnArray;
		}
	}

    public function controllAdminForUserAction(){
        $post = $this->getRequest()->getPost();
        $api = new \Kernel\Model\KernelAPI($this->getServiceLocator());
        if (isset($post['data']['index']) && $post['data']['index'] == 1 && $api->checkAdminRights()) {
            $returnArray = $api->findAllUser();
        }
        if (isset($post['data']['index']) && $post['data']['index'] == 2 && $api->checkAdminRights()) {
            $returnArray = $api->changeStatus($post['data']['id']);
        }
        if (isset($post['data']['index']) && $post['data']['index'] == 3 && $api->checkAdminRights()) {
            $returnArray = $api->changeRight($post['data']['id']);
        }

        return new JsonModel($returnArray);
    }

    public function controllUserForUserAction(){
        $returnArray = array();
        $post = $this->getRequest()->getPost();
        if (isset($post['data']['index']) && $post['data']['index'] == 1) {
            $api = new \Kernel\Model\KernelAPI($this->getServiceLocator());
            $returnArray = $api->getAllUserInformation();
        }
        if (isset($post['data']['index']) && $post['data']['index'] == 2) {
            $api = new \Kernel\Model\KernelAPI($this->getServiceLocator());
            $returnArray = $api->changeUserInformation($post['data']);
        }
        return new JsonModel($returnArray);
    }

}