<?php

namespace Chat\Controller;

use Zend\Console\Response;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Doctrine\ORM\EntityManager;


class ChatController extends AbstractActionController
{
    public function indexAction(){
        if (!isset($_SESSION['Userid'])) {
            return $this->redirect()->toRoute('login');
        } else {
            return new ViewModel();
        }
    }

    public function controllUserAction(){
        $returnArray = array();
        $api = new \Chat\Model\ChatAPI($this->getServiceLocator());
        $returnArray = $api->loadAllOnlineUser();
        return new JsonModel($returnArray);
    }

    public function controllNewMessageAction(){
        $returnArray = array();
        $api = new \Chat\Model\ChatAPI($this->getServiceLocator());
        $returnArray = $api->findAllNewMessages();
        return new JsonModel($returnArray);
    }
}