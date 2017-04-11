<?php

require_once '../connection/Connection.php';

/**
 * 
 * @author vitor.brangioni
 *
 */
class UserDAO
{
	private static $instance;
	private static $conn;
	
	private function __construct() {
	}
	
	public static function getInstance() : UserDAO
	{
		if (!isset(self::$instance) && !isset(self::$conn)) {
			self::$conn = Connection::getInstance();
			self::$instance = new UserDAO();
		}
		return self::$instance;
	}
	
	public function listAll()
	{
		try {
			$sql = "SELECT * FROM user";
			$stmt = self::$conn->prepare($sql);
			$stmt->execute();
			
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
		} catch (PDOStatement $e) {
			echo $e->errorCode();	
		}
	}
	
	public function insert(User $user)
	{
		try {
			$sql = "INSERT INTO user (username, password) VALUES (:username, :password);";
			
			self::$conn->prepare($sql);
			$stmt->bindValue(":username", $user->getUsername());
			$stmt->bindValue(":password", $user->getPassword());
			$stmt->execute();
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function edit(User $doctor)
	{
		try {
			$sql = "UPDATE user SET username = ':username', password = ':password' WHERE id = :id";
			
			self::$conn->prepare($sql);
			$stmt->bindValue(":username", $user->getUsername());
			$stmt->bindValue(":password", $user->getPassword());
			$stmt->bindValue(":id", $user->getId());
			$stmt->execute();
			
		} catch (PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	public function findById($id)
	{
		try {
			$sql = "SELECT * FROM user WHERE id = :id";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $id);
			$stmt->execute();
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
			
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
	public function findGeneric(Enum $fiel, $value)
	{
		try {
			$sql = "SELECT * FROM user WHERE :field = :value";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":field", $fiel);
			$stmt->bindValue(":value", $value);
			$stmt->execute();
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
			
		} catch (PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	public function findByObject(User $user)
	{
		try {
			$sql = "SELECT * FROM doctor WHERE id = :id";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $user->getId());
			$stmt->execute();
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
			
		} catch (PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	public function delete(User $user)
	{
		try {
			$sql = "DELETE FROM user WHERE id = :id";
			
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $user->getId());
			$stmt->execute();
			
		} catch (PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	private function populate($row)
	{
		
	}
}

$dao = UserDAO::getInstance();
$result = $dao->listAll();

if ($result == null){
	echo 'fail';
}

 foreach ($result as $data) {
 echo $data['username'];
 }
 
//echo $dao->findById(1)['nome'];
