<?php

namespace model\interfaces;

//require_once  '../../vendor/autoload.php';

use model\pojo\Pojo;

interface DAOInterface
{
	public static function getInstance();
	
	public function listAll();
	
	public function findById($id);
	
	public function findGeneric($fiel, $value);
	
	public function insert(Pojo $pojo);
	
	public function edit(Pojo $pojo);
	
	public function delete(Pojo $pojo);
	
}