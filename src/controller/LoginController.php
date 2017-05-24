<?php

namespace src\controller;

use model\dao\UserDAO;
use model\pojo\User;

class LoginController
{
	private function __construct()
	{
	}
	
	public static function login()
	{
		session_start();
		$userDao = UserDAO::getInstance();
		try {
			$userInput = filter_input(INPUT_POST, 'user');
			$pwdInput = filter_input(INPUT_POST, 'password');
			$user = $userDao->findGeneric("username", $userInput);
			
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
			
			$_SESSION['user_logged_in'] = 'yes';
			$_SESSION['user'] = $userInput;
			
			header('HTTP/1.1 302 Redirect');
			header('Location: ../view/site/interno/patient-management.php'); 
			
			echo 'LOGADO';
			  
		} catch (Exception $e) {
			header('HTTP/1.1 401 Anauthorized');
			echo $e->getMessage();
		}
	}
	
}