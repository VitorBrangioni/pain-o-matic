<?php

namespace model\dao;

//require_once  '../../vendor/autoload.php';


use model\connection\Connection;
use model\interfaces\DAOInterface;
use model\pojo\Pojo;
use model\pojo\Diagram;

/**
 *
 * @author vitor.brangioni
 *
 */
class DiagramDAO implements DAOInterface
{
	private static $instance;
	private static $conn;
	
	private function __construct()
	{
	}
	
	public static function getInstance() : DiagramDAO
	{
		if (!isset(self::$instance) && !isset(self::$conn)) {
			self::$conn = Connection::getInstance();
			self::$instance = new DiagramDAO();
		}
		return self::$instance;
	}
	
	// @DONE
	public function listAll()
	{
		try {
			$sql = "SELECT * FROM diagram";
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
			$sql = "SELECT * FROM diagram WHERE id = :id";
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
	 * @param Enum $field
	 * @param unknown $value
	 * @return unknown
	 */
	public function findGeneric($field, $value)
	{
		try {
            $sql = "SELECT * FROM diagram WHERE ".$field." = :value";
            //$sql = "SELECT * FROM diagram WHERE appointment_id = :value";
            $stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":value", $value);
			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	// @DONE
	public function findByObject(Pojo $diagram)
	{
		try {
			$sql = "SELECT * FROM diagram WHERE id = :id";
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $diagram->getId());
			$stmt->execute();
			
			return $stmt->fetch(\PDO::FETCH_ASSOC);
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	// @DONE
	public function insert(Pojo $diagram)
	{
		if (!$diagram instanceof Diagram) {
			throw new \InvalidArgumentException();
		}
		
		try {
			$sql = "INSERT INTO diagram (thumbnail, appointment_id, prof0, prof25, prof50, prof75, prof100)
			    VALUES (:thumbnail, :appointment_id, :prof0, :prof25, :prof50, :prof75, :prof100)";
			
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":thumbnail", $diagram->getThumbnail());
            $stmt->bindValue(":appointment_id", $diagram->getAppointmentId());
            $stmt->bindValue(":prof0", $diagram->getProf0());
            $stmt->bindValue(":prof25", $diagram->getProf25());
            $stmt->bindValue(":prof50", $diagram->getProf50());
            $stmt->bindValue(":prof75", $diagram->getProf75());
            $stmt->bindValue(":prof100", $diagram->getProf100());

            $stmt->execute();
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	// @DONE
	public function edit(Pojo $diagram)
	{
		if (!$diagram instanceof Diagram) {
			throw new \InvalidArgumentException();
		}
		
		try {
			$sql = "UPDATE diagram SET diagramname = ':diagramname', password = ':password' WHERE id = :id";
			
			self::$conn->prepare($sql);
			$stmt->bindValue(":diagramname", $diagram->getdiagramname());
			$stmt->bindValue(":password", $diagram->getPassword());
			$stmt->bindValue(":id", $diagram->getId());
			$stmt->execute();
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	// @DONE
	public function delete(Pojo $diagram)
	{
		if (!$diagram instanceof Diagram) {
			throw new \InvalidArgumentException();
		}
		
		try {
			$sql = "DELETE FROM diagram WHERE id = :id";
			
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $diagram->getId());
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
