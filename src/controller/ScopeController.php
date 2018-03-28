<?php

namespace src\controller;

//require_once '../../vendor/autoload.php';

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
}
