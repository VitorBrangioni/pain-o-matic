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

	public function getNursingHistoric($patientId)
	{
		$nursingHistoric = self::$dao->findGeneric('patient_id', $patientId);
		
		if ($nursingHistoric == null) {
			throw new \Exception("Erro ao buscar historico de enfermagem");
		}
		return json_decode($nursingHistoric->getQuestions(), true);
	}

	public function getFieldValue($nursingHistoric, $category, $field)
	{
		return (isset($nursingHistoric[$category][$field]))  ? $nursingHistoric[$category][$field] : "";
	}

	private function generateArray()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$array = array();

			$array['identificacao'] = 
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
					"naturalidade" => $_POST['naturalidade'],
					"estado-civil" => $_POST['estado-civil'],
					"escolaridade" => $_POST['escolaridade'],
					"procedencia" => $_POST['procedencia'],
					"informante" => $_POST['informante']
				);
			$array['queixa-principal'] = 
				array(
					'queixa-principal' => $_POST['queixa-principal']
				);
			return $array;
		}


	}


	
}