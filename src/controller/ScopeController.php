<?php

namespace src\controller;

class ScopeController
{
    private static $instance;
    public static $scope;

	private function __construct()
	{
	}

	public static function getInstance()
	{
		if (!isset(self::$instance) || !isset(self::$appointmentDAO)) {
			self::$instance = new ScopeController();
		}
		return self::$instance;
	}

	public function add(array $values)
	{
		session_start();
		$_SESSION['scope'] = $values;
	}
}
