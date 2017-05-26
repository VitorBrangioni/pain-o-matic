<?php

namespace model\pojo;

//require_once  '../../vendor/autoload.php';

abstract class Pojo
{
	private $id;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		if ($id == null) {
			throw new InvalidArgumentException();
		}
		$this->id = $id;
	}
}