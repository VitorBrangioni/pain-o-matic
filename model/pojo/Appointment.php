<?php

namespace model\pojo;

/**
 * @author vitor.brangioni
 */
class Appointment extends Pojo
{
	private $id;
	private $questions;
	private $date;
	private $hour;
	private $patientId;

    public function __construct($questions, $date, $hour, $patId)
    {
		$this->setQuestions($questions);
        $this->setDate($date);
        $this->setHour($hour);
        $this->setPatientId($patId);
	}
	
	public function getQuestions()
	{
		return $this->questions;
	}
	
	public function setQuestions(String $questions)
	{
		json_decode($questions);
		if (json_last_error() != JSON_ERROR_NONE) {
			throw new \Exception("Invalid Json format");
		}
		$this->questions = $questions;
	}
	
	public function getDate()
	{
		return $this->date;
	}
	
	public function setDate($date)
	{
		$this->date = $date;
	}
	
	public function getHour()
	{
		return $this->hour;
	}
	
	public function setHour($hour)
	{
		$this->hour = $hour;
	}
	
	public function setPatientId($id)
	{
		$this->patientId = $id;
	}
	
	public function getPatientId()
	{
		return $this->patientId;
	}
}