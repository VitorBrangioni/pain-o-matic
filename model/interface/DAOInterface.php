<?php

interface DAOInterface
{
	public function findById($id);
	
	public function edit();
	
	public function listAll();
}