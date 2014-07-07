<?php

namespace Kernel\Model;
use Doctrine\ORM\EntityManager;
class KernelAPI
{
	protected $_serviceManager;
	
	protected $_objectManager;
	
	protected $_messageArrayForLoginStuff;
	
	public function __construct($sm)
	{
		$this->_serviceManager = $sm;
		$this->_objectManager = $this->_serviceManager->get('Doctrine\ORM\EntityManager');
		$this->_messageArrayForLoginStuff = array();
	}
	
	public function login($login,$pw){
		try {
			$user = $this->_objectManager->getRepository('Kernel\Entity\User')->findoneby(array('Login'=>$login));
			if (isset($user)) {
				if ($user->getPassword() === $pw) {
					if($user->getTempStatus() != 1){
						$_SESSION['Userid'] = $user->getUserId();
						return true;
					} else {
						throw new \Exception('Account ist noch nicht aktiv');
					}
				} else {
					throw new \Exception('PW und Login Stimmen nicht ueberein');
				}
			} else {
				throw new \Exception('Falsches Login');
			}
		} catch(\Exception $e) {
			echo $e->getMessage();
		}
		
	}
	/**
	 * 
	 * @param $array with Accdatas
	 * @return True or False, String
	 */
	public function createNewAcc($array){
		$returnArray = array();
		if($this->checkLogin($array['login'])){
			$newAcc = new \Kernel\Entity\User();
			$newAcc->setLogin($array['login']);
			$newAcc->setPassword($array['password']);
			$newAcc->setVorname($array['vorname']);
			$newAcc->setNachname($array['nachname']);
			$newAcc->setTempStatus(1);
			$this->_objectManager->persist($newAcc);
			$this->_objectManager->flush();
			$this->_messageArrayForLoginStuff['check'] = true;
			$this->_messageArrayForLoginStuff['message'] = 'Account wurde erstellt';
		} else {
			$this->_messageArrayForLoginStuff['message'] = 'Login bereits vorhanden';
		}
		return $this->_messageArrayForLoginStuff;
	}
	
	public function handleTags($input){
		//Sp�ter
	}
	public function checkLogin($login){
		$user = $this->_objectManager->getRepository('Kernel\Entity\User')->findoneby(array('Login'=>$login));
		if (!isset($user)) {
			return true;
		}
	}
	
	public function getUserInformationForView(){
		$user = $this->_objectManager->getRepository('Kernel\Entity\User')->find($_SESSION['Userid']);
		$array['vorname'] = $user->getVorname();
		$array['nachname'] = $user->getNachname();
		return $array;
		
	}

    public function findAllUser(){
        $returnArray = array();
        $i = 1;
        $user = $this->_objectManager->getRepository('Kernel\Entity\User')->findAll();
        foreach($user as $singleUser){
            $returnArray['user'][$i]['id'] = $singleUser->getUserId();
            $returnArray['user'][$i]['vorname'] = $singleUser->getVorname();
            $returnArray['user'][$i]['nachname'] = $singleUser->getNachname();
            $returnArray['user'][$i]['tempStatus'] = $singleUser->getTempStatus();
            $i++;
        }
        $returnArray['size'] = $i;
        $returnArray['check'] = true;
        return $returnArray;
    }

    public function changeStatus($id){
        $returnArray = array();
        $user = $this->_objectManager->getRepository('Kernel\Entity\User')->find($id);
        if(isset($user)){
            if($user->getTempStatus() == 1){
                $user->setTempStatus(0);
                $returnArray['status'] = true;
            } else  {
                $user->setTempStatus(1);
                $returnArray['status'] = false;
            }
            $this->_objectManager->persist($user);
            $this->_objectManager->flush();
            $returnArray['check'] = true;
        }
        return $returnArray;

    }
}