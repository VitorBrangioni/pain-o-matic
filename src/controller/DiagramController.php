<?php

namespace src\controller;

use model\dao\DiagramDAO;
use model\pojo\Diagram;
use model\dao\AppointmentDAO;

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

	public function register($title, $desc, $appointmentId)
	{
		$diagram = new Diagram($title, $desc, null, $appointmentId);
		$appointment = AppointmentDAO::getInstance()->findById($appointmentId);
		self::$diagramDAO->insert($diagram);
		$diagramId = (int) self::$diagramDAO->getConn()->lastInsertId();
		
		header("Location: http://localhost/view/internal/pain-diagram.php?patientId={$appointment['patient_id']}&appointmentId=$appointmentId&diagramId=$diagramId&mode=edit");
	}
	
	public function saveDiagramImg($diagramId, $imgBase64)
	{
		$success = false;
		$diagram = self::$diagramDAO->findById($diagramId);
		
		if ($diagram->getImage() === "diagram-model.png") {
			$diagram->setImage(sha1($diagram->getTitle()) . uniqid('', true) . '-' .time().'.png');
		}
		
		/* if (empty($diagram->getImage())) {
			$diagram->setImage(sha1($diagram->getTitle()) . uniqid('', true) . '-' .time().'.png');
		} */
		self::$diagramDAO->edit($diagram);
		// echo "$imgBase64";
		$removeHeaders = substr($imgBase64, strpos($imgBase64, ",") +1);
		$decode = base64_decode($removeHeaders);
		
		$success = $fopen = fopen("/var/www/html/pain-o-matic/view/images/diagrams/{$diagram->getImage()}", 'wb');
		$success = fwrite($fopen, $decode);
		$success = fclose($fopen);
		
		if ($success === false || $diagram == null) {
			throw new \Exception('Falha ao salvar Diagrama');
		}
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