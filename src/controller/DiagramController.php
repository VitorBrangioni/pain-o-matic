<?php

namespace src\controller;

//require_once '../../vendor/autoload.php';

use model\pojo\Diagram;
use model\dao\DiagramDAO;

class DiagramController
{
	private static $instance;
	private static $diagramDAO;
	
	
	private function __construct()
	{
	}
	
	public static function getInstance()
	{
		if (!isset(self::$instance) || !isset(self::$diagramDAO)) {
			self::$instance = new DiagramController();
			self::$diagramDAO = DiagramDAO::getInstance();
		}
		return self::$instance;
	}

	public function register($thumbnail, $appointment_id)
	{
		$diagram = new Diagram($thumbnail, $appointment_id, 0, 0, 0, 0, 0);

		self::$diagramDAO->insert($diagram);
	}

    public function delete($diagram)
    {
        self::$diagramDAO->delete($diagram);
    }

	public function listAll()
	{
		return self::$diagramDAO->listAll();
	}

    public function listAllAppointmentDiagrams($appointment_Id)
    {
        return self::$diagramDAO->findGeneric("appointment_id", $appointment_Id);
    }
	
	public function findById($id) {
		return self::$diagramDAO->findById($id);
	}
	
}