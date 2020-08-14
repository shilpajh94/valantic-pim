<?php

namespace DistributionHubBundle\Model;


class FTPDetail extends AbstractModel
{
    public $name;

    public $serverAddress;

    public $serverPort;

    public $userName;

    public $password;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }


    /**
     * @return mixed
     */
    public function getServerAddress()
    {
        return $this->serverAddress;
    }

    /**
     * @param mixed $serverAddress
     */
    public function setServerAddress(?string $serverAddress): void
    {
        $this->serverAddress = $serverAddress;
    }

    /**
     * @return mixed
     */
    public function getServerPort()
    {
        return $this->serverPort;
    }

    /**
     * @param mixed $serverPort
     */
    public function setServerPort(?int $serverPort): void
    {
        $this->serverPort = $serverPort;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName(?string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }



}