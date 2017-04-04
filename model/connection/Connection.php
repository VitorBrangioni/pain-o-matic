<?php

class Connection
{
    private static $instance;
    private static $dsn = "";
    private static $user = "";
    private static $password = "";
    
    private function __construct()
    {
    }
    
    public static function getInstance()
    {
    	if (isset(self::$instance)) {
    		self::$instance = new PDO($this->dsn, $this->user, $this->password);
    	}
    	return self::$instance;
    }
}