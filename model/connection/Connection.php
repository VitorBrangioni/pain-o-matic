<?php

namespace model\connection;

use model\interfaces\ConnectionInterface;

/**
 * 
 * @author vitor.brangioni
 *
 */
class Connection implements ConnectionInterface
{
    private static $dsn = "mysql:host=localhost;dbname=pain_o_matic;port-;charset=utf8";
    private static $user = "root";
    private static $password = "root";
    private static $instance;
    
    private function __construct()
    {
    }
    
    public static function getInstance()
    {
    	if (!isset(self::$instance)) {
    		try {
    			self::$instance = new \PDO("mysql:host=localhost;dbname=pain_o_matic;port-;charset=utf8", "root", "rotiv9401v@");
    		} catch (PDOException $e) {
    			echo $e->getMessage();
    		}
    	}
    	return self::$instance;
    }
}