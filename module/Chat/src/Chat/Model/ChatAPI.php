<?php

namespace Chat\Model;
use Doctrine\ORM\EntityManager;
class ChatAPI
{
    protected $_serviceManager;

    protected $_objectManager;

    protected $_userArray;

    protected $_counter;


    public function __construct($sm)
    {
        $this->_serviceManager = $sm;
        $this->_objectManager = $this->_serviceManager->get('Doctrine\ORM\EntityManager');
        $this->_userArray = array();
    }

    public function loadAllOnlineUser(){
        $returnArray = array();
        $this->_userArray = $this->_objectManager->getRepository('Kernel\Entity\User')->findBy(array('Online'=>1));
        $this->_counter = count($this->_userArray);
        for($i=0;$i<$this->_counter;$i++){
            $returnArray[$i]['id'] = $this->_userArray[$i]->getUserId();
            $returnArray[$i]['vorname'] = $this->_userArray[$i]->getVorname();
            $returnArray[$i]['nachname'] = $this->_userArray[$i]->getNachName();
            $returnArray['counter'] = $this->_counter;
        }
        return $returnArray;
    }

    public function findAllNewMessages(){
        $returnArray = array();
        $this->_userArray = $this->_objectManager->getRepository('Kernel\Entity\Chat')
            ->findBy(array('EmpfaengerId'=>$_SESSION['Userid'],'Read'=>0));
        $this->_counter = count($this->_userArray);
        $returnArray['count'] = $this->_counter;
        for ($i=0; $i < $this->_counter; $i++) {
            $returnArray[$i]['id'] = $this->_userArray[$i]->getChatId();
            $senderObject = $this->_objectManager->getRepository('Kernel\Entity\User')->find($this->_userArray[$i]->getSenderId());
            $returnArray[$i]['vorname'] = $senderObject->getVorname();
            $returnArray[$i]['nachname'] = $senderObject->getNachName();
        }
        return $returnArray;
    }
}