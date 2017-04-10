<?php

require_once '../connection/Connection.php';

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
			
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	public function insert(Patient $patient)
	{
		try {
			$sql = "INSERT INTO patient (name, cpf, rg) VALUES (:name, :cpf, :rg);";
			
			self::$conn->prepare($sql);
			$stmt->bindValue(":name", $user->patient->getName());
			$stmt->bindValue(":cpf", $user->getCpf());
			$stmt->bindValue(":rg", $user->getRg());
			$stmt->execute();
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function edit(Patient $patient)
	{
		try {
			
		} catch (PDOStatement $e) {
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
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
			
		} catch (PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	public function findByObject(Patient $patient)
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
