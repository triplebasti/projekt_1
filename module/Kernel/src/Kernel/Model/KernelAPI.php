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

}