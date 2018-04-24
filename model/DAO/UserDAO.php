<?php

namespace model\dao;

//require_once  '../../vendor/autoload.php';

use model\connection\Connection;
use model\interfaces\DAOInterface;
use model\pojo\Pojo;
use model\pojo\User;

/**
 * 
 * @author vitor.brangioni
 *
 */
class UserDAO implements DAOInterface
{
	private static $instance;
	private static $conn;
	
	private function __construct() {
	}
	
	// @DONE
	public static function getInstance() : UserDAO
	{
		if (!isset(self::$instance) && !isset(self::$conn)) {
			self::$conn = Connection::getInstance();
			self::$instance = new UserDAO();
		}
		return self::$instance;
	}
	
	// @DONE
	public function listAll()
	{
		try {
			$sql = "SELECT * FROM user";
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
			$sql = "SELECT * FROM user WHERE id = :id";
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
	 * @param Enum $field
	 * @param unknown $value
	 * @return unknown
	 */
	public function findGeneric($field, $value) : User
	{
		try {
			$sql = 'SELECT * FROM public."user" WHERE '.$field.' = :value';
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":value", $value);
			$stmt->execute();
			
			return $this->populate($stmt->fetch(\PDO::FETCH_ASSOC));
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	// @TODO
	public function findByObject(User $user)
	{
		try {
			$sql = "SELECT * FROM user WHERE id = :id";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $user->getId());
			$stmt->execute();
			
			return $stmt->fetch(\PDO::FETCH_ASSOC);
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	// @DONE
	public function insert(Pojo $user)
	{
		if (!$user instanceof User) {
			throw new \InvalidArgumentException();
		}
		
		try {
			$sql = "INSERT INTO user (id, username, password) VALUES (null, :username, :password)";
			
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":username", $user->getUsername());
			$stmt->bindValue(":password", $user->getPassword());
			$stmt->execute();
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	// @TODO
	public function edit(Pojo $user)
	{
		if (!$user instanceof User) {
			throw new \InvalidArgumentException();
		}
		
		try {
			$sql = "UPDATE user SET username = ':username', password = ':password' WHERE id = :id";
			
			self::$conn->prepare($sql);
			$stmt->bindValue(":username", $user->getUsername());
			$stmt->bindValue(":password", $user->getPassword());
			$stmt->bindValue(":id", $user->getId());
			$stmt->execute();
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	// @DONE
	public function delete(Pojo $user)
	{
		if (!$user instanceof User) {
			throw new \InvalidArgumentException();
		}
		
		try {
			$sql = "DELETE FROM user WHERE id = :id";
			
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $user->getId());
			$stmt->execute();
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	// @TODO ?
	private function populate($userFeth)
	{
		return new User($userFeth['id'], $userFeth['username'], $userFeth['password']);
	}
}