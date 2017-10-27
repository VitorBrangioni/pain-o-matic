<?php

namespace src\controller;

use model\pojo\Patient;
use model\pojo\NursingHistoric;
use model\dao\NursingHistoricDAO;
use src\controller\PatientController;

class NursingHistoricController
{
	private static $instance;
	private static $dao;
	
	
	private function __construct()
	{
	}
	
	public static function getInstance()
	{
		if (!isset(self::$instance) || !isset(self::$dao)) {
			self::$instance = new NursingHistoricController();
			self::$dao = NursingHistoricDAO::getInstance();
		}
		return self::$instance;
	}

	public function findById(int $id)
	{
		return self::$dao->findById(1);
	}

	public function findByPatient($patient)
	{
		$fieldValue = null;

		if ($patient instanceof Patient) {
			$fieldValue = $patient->getId();
		} elseif (is_int($patient)) {
			$fieldValue = $patient;
		}

		if ($fieldValue === null) {
			throw new \Exception("Os dados sao invalidos");
		}

		return self::$dao->findGeneric("patient_id", $fieldValue);
	}

	public function save($patientId)
	{

		$formArray = $this->generateArray();
		$historic = self::$dao->findGeneric("patient_id", $patientId);

		if ($historic === null) {
			echo 'insert';
			self::$dao->insert(new NursingHistoric(json_encode($formArray), $patientId));
		} else {
			echo 'update';
			self::$dao->update(new NursingHistoric(json_encode($formArray), $patientId));
		}
	}

	private function generateArray()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$array = array();

			$array[] = array("identificacao" =>
				array(
					"clinica" => $_POST['clinica'],
					"numProntuario" => $_POST['numProntuario'],
					"falarCom" => $_POST['falarCom'],
					"tel" => $_POST['tel'],
					"cel" => $_POST['cel'],
					"nome" => $_POST['nome'],
					"idade" => $_POST['idade'],
					"cor" => $_POST['cor'],
					"sexo" => $_POST['sexo'],
					"profOcup" => $_POST['profOcup'],
					"rendaFam" => $_POST['rendaFam'],
					"nacionalidade" => $_POST['nacionalidade'],
					"naturalidade" => $_POST['naturalidade']
				)
			);
			return $array;
		}


	}

	
}