<?php

namespace src\controller;

//require_once '../../vendor/autoload.php';

use model\dao\AppointmentDAO;
use model\pojo\Appointment;

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

    /*public function register($date, $time, $patientId)
    {
        $appointment = new Appointment($date, $time, $patientId);

        self::$appointmentDAO->insert($appointment);
    }*/

    public function register($patientId)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $time = date("H:i:s");
        $date = date("Y-m-d");
        $appointment = new Appointment($date, $time, $patientId);

        self::$appointmentDAO->insert($appointment);
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
