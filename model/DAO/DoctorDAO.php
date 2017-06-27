<?php

namespace model\dao;

use model\connection\Connection;
use model\pojo\Doctor;

/**
 * 
 * @author vitor.brangioni
 *
 */
class DoctorDAO
{
	private static $instance;
	private static $conn;
	
	private function __construct() {
		
	}
	
	public static function getInstance() : DoctorDAO
	{
		if (!isset(self::$instance) && !isset(self::$conn)) {
			self::$conn = Connection::getInstance();
			self::$instance = new DoctorDAO();
		}
		return self::$instance;
	}
	
	// @DONE
	public function listAll()
	{
		try {
			$sql = "SELECT * FROM doctor";
			$stmt = self::$conn->prepare($sql);
			$stmt->execute();
			
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	public function insert(Doctor $doctor)
	{
		try {
			$sql = "insert into ..";
			self::$conn->prepare($sql);
			
		} catch (Exception $e) {
		}
	}
	
	public function edit(PojoDoctor $doctor)
	{
		try {
			
		} catch (PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	/**
	 *
	 * @param Enum $fiel
	 * @param unknown $value
	 * @return unknown
	 */
	public function findGeneric($field, $value)
	{
		try {
			$sql = "SELECT * FROM doctor WHERE ".$field." = :value";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":value", $value);
			$stmt->execute();
			
			return $this->populateDoctor($stmt->fetchAll(\PDO::FETCH_ASSOC));
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	public function findById($id)
	{
		try {
			$sql = "SELECT * FROM doctor WHERE id = :id";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $id);
			$stmt->execute();
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
			
		} catch (PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	public function findByObject(Doctor $doctor)
	{
		try {
			$sql = "SELECT * FROM doctor WHERE id = :id";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $doctor->getId());
			$stmt->execute();
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
		} catch (PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	private function populateDoctor($row)
	{
		$doctors = array();
		
		echo 'entrou';
		foreach ($row as $data) {
			$doctors[] = new Doctor($data['id'], $data['nome'], $data['user_id']);
			
			echo $data['nome'];
		}
		
		return (count($doctors) == 1) ? $doctors[0]: $doctors;
		
	}
}
