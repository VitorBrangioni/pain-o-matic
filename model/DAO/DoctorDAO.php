<?php

class DoctorDAO
{
	private static $instance;
	
	private function __construct() {
	}
	
	public function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new DoctorDAO();
		}
		return self::$instance;
	}
	
	public function insert(PojoDoctor $doctor) {
		try {
			
		} catch (Exception $e) {
		}
	}
	
	public function edit(PojoDoctor $doctor) {
		try {
			
		} catch (Exception $e) {
		}
	}
	
	public function find($cod) {
		try {
			
		} catch (Exception $e) {
		}
	}
	
	private function populateDoctor($row) {
	}
}
