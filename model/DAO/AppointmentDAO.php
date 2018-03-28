<?php

namespace model\dao;

// require_once  '../../vendor/autoload.php';

use model\connection\Connection;
use model\interfaces\DAOInterface;
use model\pojo\Pojo;
use model\pojo\Appointment;

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
			$sql = "SELECT * FROM appointment";
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
			$sql = "SELECT * FROM appointment WHERE id = :id";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $id);
			$stmt->execute();
			
			return $stmt->fetch(\PDO::FETCH_ASSOC);
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
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
			$sql = "SELECT * FROM appointment WHERE ".$field." = :value";
			//$sql = "SELECT * FROM appointment WHERE patient_id = :value";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":value", $value);
			$stmt->execute();
			
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	// @DONE
	public function insert(Pojo $appointment)
	{
		if (!$appointment instanceof Appointment) {
			throw new \InvalidArgumentException();
		}
		
		try {
			$sql = "INSERT INTO appointment (id, data, date, hora, patient_id) VALUES (null, :data, :date, :hora, :patientId)";
			
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":data", $appointment->getData());
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
