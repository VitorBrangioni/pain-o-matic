<?php

namespace src\controller;

use model\dao\UserDAO;
use model\pojo\User;
use model\dao\DoctorDAO;

class LoginController
{
	private function __construct()
	{
	}
	
	public static function login()
	{
		session_start();
		$userDao = UserDAO::getInstance();
		$doctorDao = DoctorDAO::getInstance();
		try {
			$userInput = filter_input(INPUT_POST, 'user');
			$pwdInput = filter_input(INPUT_POST, 'password');
			$user = $userDao->findGeneric("username", $userInput);
			$doctor = $doctorDao->findGeneric('user_id', $user->getId());
			
			echo 'id'.$user->getId();
			
			if (password_verify($pwdInput, $user->getPassword()) === false) {
				throw new \Exception('Invalid password');
			}
			
			$currentHashAlgorithm = PASSWORD_DEFAULT;
			$currentHashOptions = ['cost' => 15];
			$pwdInputNeedsRehash = password_needs_rehash($user->getPassword(), $currentHashAlgorithm, $currentHashOptions);
			
			if ($pwdInputNeedsRehash === true) {
				$user->setPassword(password_hash($pwdInput, $currentHashAlgorithm, $currentHashOptions));
				//$userDao->edit($user);
			}
			
			$_SESSION['userLoggedIn'] = 'true';
			$_SESSION['user'] = $user->getUsername();
			$_SESSION['userId'] = $user->getId();
			$_SESSION['doctorName'] = $doctor->getName();
			
			header('HTTP/1.1 302 Redirect');
			header('Location: ../view/site/interno/patient-management.php'); 
			  
		} catch (Exception $e) {
			header('HTTP/1.1 401 Anauthorized');
			echo $e->getMessage();
		}
	}
	
}