<?php

namespace model\pojo;

/**
 * @author vitor.brangioni
 */
class Appointment extends Pojo
{
	private $id;
	private $data;
	private $date;
	private $hour;
	private $patientId;

    public function __construct($data, $date, $hour, $patId)
    {
		$this->setData($data);
        $this->setDate($date);
        $this->setHour($hour);
        $this->setPatientId($patId);
	}
	
	public function getData()
	{
		return $this->data;
	}
	
	public function setData(String $data)
	{
		json_decode($data);
		if (json_last_error() != JSON_ERROR_NONE) {
			throw new \Exception("Invalid Json format");
		}
		$this->data = $data;
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