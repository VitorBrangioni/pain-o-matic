<?php

namespace model\dao;

//require_once  '../../vendor/autoload.php';


use model\connection\Connection;
use model\pojo\Patient;
use model\pojo\Pojo;

/**
 *
 * @author vitor.brangioni
 *
 */
class PatientDAO
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
	
	// @DONE
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
	
	// @DONE
	public function findById($id)
	{
		try {
			$sql = "SELECT * FROM patient WHERE id = :id";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $id);
			$stmt->execute();
			//return $this->populate($stmt->fetch(\PDO::FETCH_ASSOC));
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
			$sql = "SELECT * FROM patient WHERE ".$field." = :value";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":value", $value);
			$stmt->execute();
			
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			
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
	
	// @DONE
	public function insert(Pojo $patient)
	{
		if (!$patient instanceof Patient) {
			throw new \InvalidArgumentException();
		}
		$emptyImage = ($patient->getPhoto() === null) ? true : false;

		try {
			$sql = ($emptyImage) ?
				"INSERT INTO patient (id, name, cpf, rg) VALUES (null, :name, :cpf, :rg)":
				"INSERT INTO patient (id, name, cpf, rg, photo) VALUES (null, :name, :cpf, :rg, :photo)";

			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":name", $patient->getName());
			$stmt->bindValue(":cpf", $patient->getCpf());
			$stmt->bindValue(":rg", $patient->getRg());
			if (!$emptyImage) {
				$stmt->bindValue(":photo", $patient->getPhoto()); 
			}
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
	
	// @DONE
	public function delete(Pojo $patient)
	{
		if (!$patient instanceof Patient) {
			throw new \InvalidArgumentException();
		}
		
		try {
			$sql = "DELETE FROM patient WHERE id = :id";
			
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $patient['id']);
			$stmt->execute();
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	// @TODO ?
	private function populate($fech)
	{
		return new Patient($fech['name'], $fech['rg'], $fech['cpf'], $fech['photo']);
	}
}
