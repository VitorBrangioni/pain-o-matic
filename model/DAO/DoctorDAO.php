<?php

namespace model\dao;

require_once '../connection/Connection.php';

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
		
	}
}

$dao = DoctorDAO::getInstance();
$result = $dao->listAll();

if ($result == null){
	echo 'fail';
}

/* foreach ($result as $data) {
	echo $data['nome'];
}
 */
echo $dao->findById(1)['nome'];
