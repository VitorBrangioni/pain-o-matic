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
	private $username;
	private $password;
	
	public function __construct($username, $password)
	{
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
}