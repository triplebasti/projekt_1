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
 * @property string $Vorname
 * @property string $Nachname
 * @property int TempStatus
 * @property int Rights
 * @property int Online
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
     * @ORM\Column(type="string")
     */
    
    protected $Vorname;
    
    /**
     * @ORM\Column(type="string")
     */
    
    protected $Nachname;
    
    /**
     * @ORM\Column(type="integer")
     */
    
    protected $TempStatus;

    /**
     * @ORM\Column(type="integer")
     */

    protected $Rights;

    /**
     * @ORM\Column(type="integer")
     */

    protected $Online;

    public function getVorname()
    {
    	return $this->Vorname;
    }
    
    public function getNachname()
    {
    	return $this->Nachname;
    }
    
    public function getTempStatus()
    {
    	return $this->TempStatus;
    }
    
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
    
    public function setVorname($Vorname)
    {
    	$this->Vorname = $Vorname;
    }
    
    public function setNachname($Nachname)
    {
    	$this->Nachname = $Nachname;
    }
    
    public function setTempStatus($TempStatus)
    {
    	$this->TempStatus = $TempStatus;
    }

    /**
     * @param mixed $Rights
     */
    public function setRights($Rights)
    {
        $this->Rights = $Rights;
    }

    /**
     * @return mixed
     */
    public function getRights()
    {
        return $this->Rights;
    }

    /**
     * @param mixed $Online
     */
    public function setOnline($Online)
    {
        $this->Online = $Online;
    }

    /**
     * @return mixed
     */
    public function getOnline()
    {
        return $this->Online;
    }


     
}