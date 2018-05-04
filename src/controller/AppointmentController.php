<?php

namespace src\controller;

use src\app\Route;
use src\app\UserMessage;

use src\enum\TypeMessage;
use model\pojo\Appointment;
use model\dao\AppointmentDAO;
use src\controller\RouteController;

class AppointmentController
{
	private static $instance;
	private static $appointmentDAO;
	private static $scope;

	private function __construct()
	{
	}

	public static function getInstance()
	{
		if (!isset(self::$instance) || !isset(self::$appointmentDAO)) {
			self::$instance = new AppointmentController();
			self::$appointmentDAO = AppointmentDAO::getInstance();
			self::$scope = ScopeController::getInstance();
		}
		return self::$instance;
	}

	public function create(int $patientId)
	{
		Route::redirect('create-appointment',
			['patientId' => $patientId, 'create-mode' => true],
			new UserMessage(TypeMessage::SUCCESS(), "Preenche os dados da consulta", ""));
	}

    public function save(int $patientId)
    {
		$jsonData = json_encode($_POST, JSON_UNESCAPED_UNICODE);
        date_default_timezone_set('America/Sao_Paulo');
        $time = date("H:i:s");
        $date = date("Y-m-d");
        $appointment = new Appointment($jsonData, $date, $time, $patientId);
		$appointmentId = self::$appointmentDAO->insert($appointment);
		
		self::$scope->add($_POST);

		UserMessage::addMessage(TypeMessage::SUCCESS(), "Consulta Criada com Sucesso!", "");
		header("Location: appointment-visualization.php?patientId=$patientId&appointmentId=$appointmentId");
	}

	public function viewQuestions(int $appointmentId)
	{
		$appointment = $this->findById($appointmentId);

		$input = iconv('UTF-8', 'UTF-8//IGNORE', \utf8_encode($appointment['questions']));
		$questionsArray = json_decode($input, true);
		$patientId = $appointment['patient_id'];

		self::$scope->add($questionsArray);

		header("Location: create-appointment.php?patientId=$patientId&appointmentId=$appointmentId");
	}

	private function findJsonQuestions(int $appointmentId)
	{
		return self::$appointmentDAO->findById($appointmentId)['questions'];
	}
	
	public function listAll()
	{
		return self::$appointmentDAO->listAll();
	}

	public function listAllPatientAppointments($patientId)
	{
		return self::$appointmentDAO->findGeneric("patient_id", $patientId);
	}

	public function findById($id)
	{
		return self::$appointmentDAO->findById($id);
	}
}
