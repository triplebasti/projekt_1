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
}