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
    public function controllgetMessageAction(){
        $post = $this->getRequest()->getPost();
        $returnArray = array();
        if (isset($post['data']['index'])) {
            $api = new \Chat\Model\ChatAPI($this->getServiceLocator());
            $returnArray = $api->getMessage($post['data']['index']);
        }

        return new JsonModel($returnArray);
    }

    public function controllsetMessageAction(){
        $post = $this->getRequest()->getPost();
        if (isset($post['data']['empfaenger'])) {
            $api = new \Chat\Model\ChatAPI($this->getServiceLocator());
            $returnArray = $api->setMessage($post['data']);
        }

        return new JsonModel($returnArray);
    }
}