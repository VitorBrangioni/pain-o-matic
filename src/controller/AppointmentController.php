<?php

namespace src\controller;

//require_once '../../vendor/autoload.php';


use model\dao\AppointmentDAO;
use model\pojo\Appointment;

use src\controller\ScopeController;

class AppointmentController
{
	private static $instance;
	private static $appointmentDAO;

	private function __construct()
	{
	}

	public static function getInstance()
	{
		if (!isset(self::$instance) || !isset(self::$appointmentDAO)) {
			self::$instance = new AppointmentController();
			self::$appointmentDAO = AppointmentDAO::getInstance();
		}
		return self::$instance;
	}

	public function create(int $patientId)
	{
		session_start();
		$_SESSION['patientId'] = $patientId;
		header("Location: http://localhost/view/internal/create-appointment.php");
	}

    public function save(int $patientId)
    {
		$jsonData = json_encode($_POST, JSON_UNESCAPED_UNICODE);
        date_default_timezone_set('America/Sao_Paulo');
        $time = date("H:i:s");
        $date = date("Y-m-d");
        $appointment = new Appointment($jsonData, $date, $time, $patientId);
		
		$appointmentId = self::$appointmentDAO->insert($appointment);
		
		session_start();
		$_SESSION['scope'] = $_POST;
		
		header("Location: http://localhost/view/internal/appointment-visualization.php?patientId=$patientId&appointmentId=$appointmentId");
	}

	public function viewQuestions(int $appointmentId)
	{
		$appointment = $this->findById($appointmentId);

		$input = iconv('UTF-8', 'UTF-8//IGNORE', \utf8_encode($appointment['questions']));
		$questionsArray = json_decode($input, true);
		var_dump($questionsArray);
		session_start();
		$_SESSION['scope'] = $questionsArray;
		$patientId = $appointment['patient_id'];

		header("Location: http://localhost/view/internal/create-appointment.php?patientId=$patientId&appointmentId=$appointmentId");
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
