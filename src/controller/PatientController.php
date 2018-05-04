<?php

namespace src\controller;

use model\pojo\Patient;
use model\dao\PatientDAO;
use src\controller\UploadController;
use src\controller\NursingHistoricController;

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

		if (file_exists($_FILES['cameraInput']['tmp_name']) || is_uploaded_file($_FILES['cameraInput']['tmp_name'])) {
			$uploadController = UploadController::getInstance();
			$pathPhoto = $uploadController->uploadProfileImage($_FILES['cameraInput']['name'], $_FILES['cameraInput']['tmp_name'], $_POST['name']);
		}
		$patient = new Patient($name, $cpf, $rg, $photo);
		$patientId = self::$patientDAO->insert($patient);
		
		NursingHistoricController::getInstance()->save($patientId);

		header("Location: nursing-historic.php?patientId=$patientId");
	}

    public function delete($patient)
    {
        self::$patientDAO->delete($patient);
    }

    public function deleteId($id)
    {
        self::$patientDAO->deleteId($id);
    }

	public function listAll()
	{
		return self::$patientDAO->listAll();
	}
	
	public function findById($id) {
		return self::$patientDAO->findById($id);
	}

	public function findByName($name)
	{
		if ($name === "") {
			return $this->listAll();
		} else {
			return self::$patientDAO->findGeneric("name", $name);
		}
	}
	
}