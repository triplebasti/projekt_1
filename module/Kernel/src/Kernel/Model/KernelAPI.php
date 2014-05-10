<?php

namespace Kernel\Model;

class KernelAPI
{
	protected $_serviceManager;
	
	protected $_objectManager;
	
	public function __construct($sm)
	{
		$this->_serviceManager = $sm;
		$this->_objectManager = $this->_serviceManager->get('Doctrine\ORM\EntityManager');
	}
	
	public function login($login,$pw){
		try {
			$user = $this->_objectManager->getRepository('Kernel\Entity\User')->findoneby(array('Login'=>$login));
			if (isset($user)) {
				if ($user->getPassword() === $pw) {
					$_SESSION['Userid'] = $user->getUserId();
					return true;
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

}