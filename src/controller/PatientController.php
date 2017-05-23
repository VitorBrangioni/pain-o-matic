<?php

namespace src\controller;

//require_once '../../vendor/autoload.php';

use model\pojo\Patient;
use model\dao\PatientDAO;

class PatientController
{
	private static $instance;
	private static $patientDAO;
	
	
	private function __construct()
	{
	}
	
	public static function getInstance()
	{
		if (!isset(self::$instance) || !isset(self::$patientDAO)) {
			self::$instance = new PatientController();
			self::$patientDAO = PatientDAO::getInstance();
		}
		return self::$instance;
	}

	public function register($name, $cpf, $rg, $photo)
	{
		$patient = new Patient($name, $cpf, $rg, $photo);

		self::$patientDAO->insert($patient);
	}

    public function delete($patient)
    {
        self::$patientDAO->delete($patient);
    }

	public function listAll()
	{
		return self::$patientDAO->listAll();
	}
	
	public function findById($id) {
		return self::$patientDAO->findById($id);
	}
	
}