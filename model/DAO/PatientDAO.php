<?php

namespace model\dao;

require_once  '../../vendor/autoload.php';


use model\connection\Connection;
use model\interfaces\DAOInterface;
use model\pojo\Pojo;
use model\pojo\Patient;

/**
 *
 * @author vitor.brangioni
 *
 */
class PatientDAO implements DAOInterface
{
	private static $instance;
	private static $conn;
	
	private function __construct()
	{
	}
	
	public static function getInstance() : PatientDAO
	{
		if (!isset(self::$instance) && !isset(self::$conn)) {
			self::$conn = Connection::getInstance();
			self::$instance = new PatientDAO();
		}
		return self::$instance;
	}
	
	public function listAll()
	{
		try {
			$sql = "SELECT * FROM patient";
			$stmt = self::$conn->prepare($sql);
			$stmt->execute();
			
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	public function findById($id)
	{
		try {
			$sql = "SELECT * FROM patient WHERE id = :id";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $id);
			$stmt->execute();
			
			return $stmt->fetch(\PDO::FETCH_ASSOC);
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	//@DONE
	/**
	 *
	 * @param Enum $fiel
	 * @param unknown $value
	 * @return unknown
	 */
	public function findGeneric($fiel, $value)
	{
		try {
			$sql = "SELECT * FROM patient WHERE ".$fiel." = :value";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":value", $value);
			$stmt->execute();
			
			return $stmt->fetch(\PDO::FETCH_ASSOC);
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	// @TODO
	public function findByObject(Pojo $patient)
	{
		try {
			$sql = "SELECT * FROM patient WHERE id = :id";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $patient->getId());
			$stmt->execute();
			
			return $stmt->fetch(\PDO::FETCH_ASSOC);
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	public function insert(Pojo $patient)
	{
		if (!$patient instanceof Patient) {
			throw new \InvalidArgumentException();
		}
		
		try {
			$sql = "INSERT INTO patient (id, patientname, password) VALUES (null, :patientname, :password)";
			
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":patientname", $patient->getpatientname());
			$stmt->bindValue(":password", $patient->getPassword());
			$stmt->execute();
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	// @TODO
	public function edit(Pojo $patient)
	{
		if (!$patient instanceof Patient) {
			throw new \InvalidArgumentException();
		}
		
		try {
			$sql = "UPDATE patient SET patientname = ':patientname', password = ':password' WHERE id = :id";
			
			self::$conn->prepare($sql);
			$stmt->bindValue(":patientname", $patient->getpatientname());
			$stmt->bindValue(":password", $patient->getPassword());
			$stmt->bindValue(":id", $patient->getId());
			$stmt->execute();
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	public function delete(Pojo $patient)
	{
		if (!$patient instanceof Patient) {
			throw new \InvalidArgumentException();
		}
		
		try {
			$sql = "DELETE FROM patient WHERE id = :id";
			
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $patient->getId());
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

