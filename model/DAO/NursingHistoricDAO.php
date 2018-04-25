<?php

namespace model\dao;

use model\connection\Connection;
use model\pojo\NursingHistoric;

/**	
 * 
 * @author vitor.brangioni
 *
 */
class NursingHistoricDAO
{
	private static $instance;
	private static $conn;
	
	private function __construct() {
		
	}
	
	public static function getInstance() : NursingHistoricDAO
	{
		if (!isset(self::$instance) && !isset(self::$conn)) {
			self::$conn = Connection::getInstance();
			self::$instance = new NursingHistoricDAO();
		}
		return self::$instance;
	}
	
	// @DONE
	public function listAll()
	{
		try {
			$sql = "SELECT * FROM nursingHistoric";
			$stmt = self::$conn->prepare($sql);
			$stmt->execute();
			
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	public function insert(NursingHistoric $nursingHistoric)
	{
		try {
			$sql = 'insert into public."nursingHistoric" (questions, patient_id)
				VALUES (:questions, :patientId)';
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":questions", $nursingHistoric->getQuestions());
			$stmt->bindValue(":patientId", $nursingHistoric->getPadientId());
			$stmt->execute();
			
		} catch (\Exception $e) {
			throw new \Exception("Falha ao Inserir o Historico de Infermagem: ".$e);
		}
	}
	
	public function update(NursingHistoric $nursingHistoric)
	{
		try {
			$sql = 'UPDATE public."nursingHistoric" SET questions = :questions
						WHERE patient_id = :patientId';
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":questions", $nursingHistoric->getQuestions());
			$stmt->bindValue(":patientId", $nursingHistoric->getPadientId());
			$stmt->execute();

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
			$sql = 'SELECT * FROM public."nursingHistoric" WHERE '.$field.' = :value';
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":value", $value);
			$stmt->execute();
			
			return $this->populateNursingHistoric($stmt->fetchAll(\PDO::FETCH_ASSOC));
			
		} catch (\PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	public function findById($id)
	{
		try {
			$sql = 'SELECT * FROM public."nursingHistoric" WHERE id = :id';
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $id);
			$stmt->execute();
			
			return $stmt->fetch(\PDO::FETCH_ASSOC);
			
		} catch (PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	public function findByObject(NursingHistoric $nursingHistoric)
	{
		try {
			$sql = 'SELECT * FROM public."nursingHistoric" WHERE id = :id';
			$stmt = self::$conn->prepare($sql);
			$stmt->bindValue(":id", $nursingHistoric->getId());
			$stmt->execute();
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
		} catch (PDOStatement $e) {
			echo $e->errorCode();
		}
	}
	
	private function populateNursingHistoric($row)
	{
		if (empty($row)) {
			return null;
		}

		$nursingHistorics = array();
		foreach ($row as $data) {
			$nursingHistorics[] = new NursingHistoric($data['questions'], $data['patient_id']);
		}
		
		return (count($nursingHistorics) === 1) ? $nursingHistorics[0]: $nursingHistorics;
		
	}
}
