<?php

namespace Kernel\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * Users
 *
 * @ORM\Table(name="User")
 *
 * @property int $UserId
 * @property string $Login
 * @property int $Right
 * @property string $Password
 */

class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */

    protected $UserId;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $Login;

    /**
     * @ORM\Column(type="string")
     */

    protected $Password;

    /**
     * @ORM\Column(type="integer")
     */

    protected $Rightkey;
    
    public function getUserId()
    {
    	return $this->UserId;
    }
    
    /**
     *
     * @return the $Login
     */
    public function getLogin()
    {
    	return $this->Login;
    }
    
    /**
     *
     * @return the $Name
     */
    public function getPassword()
    {
    	return $this->Password;
    }
    
    /**
     *
     * @return the $Lastname
     */
    public function getRightkey()
    {
    	return $this->Rightkey;
    }

    public function setLogin($Login)
    {
    	$this->Login = $Login;
    }
    
    /**
     *
     * @param string $Password
     */
    public function setPassword($Password)
    {
    	$this->Password = $Password;
    }
    
    
    public function setRightkey($Right)
    {
    	$this->Rightkey = $Right;
    }
    

   
}