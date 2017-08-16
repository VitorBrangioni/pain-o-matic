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
	
	public static function getConn() : \PDO
	{
		return self::$conn;
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
			
			return $this->populate($stmt->fetch(\PDO::FETCH_ASSOC));
			
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
			$sql = "INSERT INTO diagram (id, title, description, img_diagram, appointment_id)
			    VALUES (null, :title, :desc, :img_diagram, :appointment_id)";
			
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":title", $diagram->getTitle());
			$stmt->bindValue(":desc", $diagram->getDesc());
			$stmt->bindValue(":img_diagram", $diagram->getImage());
			$stmt->bindValue(":appointment_id", $diagram->getAppointmentId());
            $result = $stmt->execute();
            
            if (!$result) {
	            throw new \PDOException("Nao foi possivel adicionar o diagrama. Entre em contato com adm.");
            }
			
		} catch (\PDOException $e) {
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
			$sql = "UPDATE diagram SET title = :title, description = :desc, img_diagram = :img, appointment_id = :appointment_id WHERE id = :id";
			
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $diagram->getId());
			$stmt->bindValue(":title", $diagram->getTitle());
			$stmt->bindValue(":desc", $diagram->getDesc());
			$stmt->bindValue(":img", $diagram->getImage());
			$stmt->bindValue(":appointment_id", $diagram->getAppointmentId());
			
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
		$diagram = new Diagram($row['title'], $row['description'], $row['img_diagram'], $row['appointment_id']);
		$diagram->setId($row['id']);
		
		return $diagram;
	}
}
