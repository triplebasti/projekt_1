<?php

namespace Kernel\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * Users
 *
 * @ORM\Table(name="Chat")
 *
 * @property int $ChatId
 * @property int $SenderId
 * @property int $EmpfaengerId
 * @property int $ParrentId
 * @property int $Read
 * @property string Nachricht
 */

class Chat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */

    protected $ChatId;

    /**
     * @ORM\Column(type="integer")
     */
    protected $SenderId;

    /**
     * @ORM\Column(type="integer")
     */

    protected $EmpfaengerId;
    
    /**
     * @ORM\Column(type="integer")
     */
    
    protected $ParrentId;
    
    /**
     * @ORM\Column(type="integer")
     */
    
    protected $ReadMessage;
    
    /**
     * @ORM\Column(type="string")
     */
    
    protected $Nachricht;

    /**
     * @param mixed $EmpfaengerId
     */
    public function setEmpfaengerId($EmpfaengerId)
    {
        $this->EmpfaengerId = $EmpfaengerId;
    }

    /**
     * @return mixed
     */
    public function getEmpfaengerId()
    {
        return $this->EmpfaengerId;
    }

    /**
     * @return mixed
     */
    public function getChatId()
    {
        return $this->ChatId;
    }

    /**
     * @param mixed $Nachricht
     */
    public function setNachricht($Nachricht)
    {
        $this->Nachricht = $Nachricht;
    }

    /**
     * @return mixed
     */
    public function getNachricht()
    {
        return $this->Nachricht;
    }

    /**
     * @param mixed $ParrentId
     */
    public function setParrentId($ParrentId)
    {
        $this->ParrentId = $ParrentId;
    }

    /**
     * @return mixed
     */
    public function getParrentId()
    {
        return $this->ParrentId;
    }

    /**
     * @param mixed $Read
     */
    public function setRead($Read)
    {
        $this->ReadMessage = $Read;
    }

    /**
     * @return mixed
     */
    public function getRead()
    {
        return $this->ReadMessage;
    }

    /**
     * @param mixed $SenderId
     */
    public function setSenderId($SenderId)
    {
        $this->SenderId = $SenderId;
    }

    /**
     * @return mixed
     */
    public function getSenderId()
    {
        return $this->SenderId;
    }


}