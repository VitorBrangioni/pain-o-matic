<?php

namespace model\pojo;

require_once  '../../vendor/autoload.php';

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