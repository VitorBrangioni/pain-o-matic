<?php

namespace model\dao;

// require_once  '../../vendor/autoload.php';

use PDOException;
use src\app\Route;
use model\pojo\Pojo;
use src\app\UserMessage;
use src\enum\TypeMessage;
use model\pojo\Appointment;
use src\enum\DefaultMessages;
use model\connection\Connection;
use model\interfaces\DAOInterface;

class AppointmentDAO implements DAOInterface
{
	private static $instance;
	private static $conn;
	
	private function __construct()
	{
	}
	
	public static function getInstance() : AppointmentDAO
	{
		if (!isset(self::$instance) && !isset(self::$conn)) {
			self::$conn = Connection::getInstance();
			self::$instance = new AppointmentDAO();
		}
		return self::$instance;
	}
	
	// @DONE
	public function listAll()
	{
		try {
			$sql = 'SELECT * FROM public."appointment"';
			$stmt = self::$conn->prepare($sql);
			$stmt->execute();
			
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}

	
	// @DONE
	public function findById($id)
	{
		try {
			// \set_error_handler(array($this, 'myErrorHandler'));
			$sql = 'SELECT * FROM public."appointment" WHERE id = :id';
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $id);
			$stmt->execute();
			
			return $stmt->fetch(\PDO::FETCH_ASSOC);
			
		} catch (\PDOException $e) {
			echo $e->getMessage();
			Route::redirect('patient-management',
				['patientId' => $patientId, 'create-mode' => true],
				new UserMessage(TypeMessage::ERROR(), DefaultMessages::INTERNAL_ERROR_TITLE, DefaultMessages::INTERNAL_ERROR_BODY));
		}
	}
	
	// @DONE
	/**
	 * 
	 * @param Enum $fiel
	 * @param unknown $value
	 * @return unknown
	 */
	 public function findGeneric($field, $value)
	{
		try {
			$sql = 'SELECT * FROM "public".appointment WHERE '.$field.' = :value';
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":value", $value);
			$stmt->execute();
			
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			
		} catch (\PDOException $e) {
			Route::redirect('patient-management',
				['patientId' => $patientId, 'create-mode' => true],
				new UserMessage(TypeMessage::ERROR(), DefaultMessages::INTERNAL_ERROR_TITLE, DefaultMessages::INTERNAL_ERROR_BODY));
		}
	}
	
	// @DONE
	public function insert(Pojo $appointment)
	{
		if (!$appointment instanceof Appointment) {
			throw new \InvalidArgumentException();
		}
		
		try {
			$sql = 'INSERT INTO public."appointment" (questions, date, hora, patient_id) VALUES (:questions, :date, :hora, :patientId)';
			
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":questions", $appointment->getQuestions());
			$stmt->bindValue(":date", $appointment->getDate());
			$stmt->bindValue(":hora", $appointment->getHour());
			$stmt->bindValue(":patientId", $appointment->getPatientId());
			$stmt->execute();

			return self::$conn->lastInsertId();
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	// @TODO
	public function edit(Pojo $appointment)
	{
		if (!$appointment instanceof Appointment) {
			throw new \InvalidArgumentException();
		}
		
		try {
			$sql = "UPDATE patient SET patientname = ':patientname', password = ':password' WHERE id = :id";
			
			self::$conn->prepare($sql);
			$stmt->bindValue(":patientname", $appointment->getpatientname());
			$stmt->bindValue(":password", $appointment->getPassword());
			$stmt->bindValue(":id", $appointment->getId());
			$stmt->execute();
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	// @DONE
	public function delete(Pojo $appointment)
	{
		if (!$appointment instanceof Appointment) {
			throw new \InvalidArgumentException();
		}
		
		try {
			$sql = "DELETE FROM appointment WHERE id = :id";
			
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $appointment->getId());
			$stmt->execute();
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	// @TODO ?
	private function populate($row)
	{
	} 
}
