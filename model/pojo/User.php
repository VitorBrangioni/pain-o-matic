<?php

namespace model\pojo;

use model\pojo\Pojo;

/**
 * 
 * @author vitor.brangioni
 *
 */
class User extends Pojo
{
	private $id;
	private $username;
	private $password;
	
	public function __construct($id, $username, $password)
	{
		$this->setId($id);
		$this->setUsername($username);
		$this->setPassword($password);
		
	}
	
	public function getUsername() {
		return $this->username;
	}
	
	public function setUsername($username) {
		$this->username = $username;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function setPassword($password) {
		$this->password = $password;
	}

    /**
     * id
     * @return unkown
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * id
     * @param unkown $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

}