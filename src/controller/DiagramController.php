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
		$diagram = new Diagram($title, $desc, $appointmentId);
		$appointment = AppointmentDAO::getInstance()->findById($appointmentId);
		self::$diagramDAO->insert($diagram);
		$diagramId = (int) self::$diagramDAO->getConn()->lastInsertId();

		if ($diagramId === 0) {
			throw new \Exception("Erro ao criar diagrama");
			
		}
		session_start();
		$_SESSION['mode'] = 'edit';

		header("Location: http://localhost/view/internal/pain-diagram.php?patientId={$appointment['patient_id']}&appointmentId=$appointmentId&diagramId=$diagramId&mode=edit");
	}
	
	public function saveDiagramImg($diagramId, $depth, $imgBase64)
	{
		$success = false;
		$diagram = self::$diagramDAO->findById($diagramId);

		$newDiagramName = "batata.png";

		switch ($depth) {
			case 1:
				$newDiagramName = $this->generateDiagramImgName($diagram->GetImageDepth1(), $diagram->getTitle(), $depth);
				$diagram->setImageDepth1($newDiagramName);
				break;
			
			case 2:
				$newDiagramName = $this->generateDiagramImgName($diagram->GetImageDepth2(), $diagram->getTitle(), $depth);
				$diagram->setImageDepth2($newDiagramName);
				break;

			case 3:
				$newDiagramName = $this->generateDiagramImgName($diagram->GetImageDepth3(), $diagram->getTitle(), $depth);
				$diagram->setImageDepth3($newDiagramName);
				break;

			case 4:
				$newDiagramName = $this->generateDiagramImgName($diagram->GetImageDepth4(), $diagram->getTitle(), $depth);
				$diagram->setImageDepth4($newDiagramName);
				break;
		}

		self::$diagramDAO->edit($diagram);
		$removeHeaders = substr($imgBase64, strpos($imgBase64, ",") +1);
		$decode = base64_decode($removeHeaders);
		
		$success = $fopen = fopen("/var/www/html/pain-o-matic/view/images/diagrams/".$newDiagramName, 'wb');
		$success = fwrite($fopen, $decode);
		$success = fclose($fopen);
		if ($success === false || $diagram == null) {
			throw new \Exception('Falha ao salvar Diagrama');
		}
	}

	private function generateDiagramImgName($diagramImg, $diagramTitle, $depth)
	{
		if ($diagramImg === 'diagram-model.png') {
			$diagramImg = sha1($diagramTitle).
								uniqid('', true) . '-' .
								time().'_depth' .$depth. '.png';
		}
		return $diagramImg;
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