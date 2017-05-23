<?php

namespace model\pojo;

/**
 * @author vitor.brangioni
 */
class Appointment extends Pojo
{
	private $id;
	private $date;
	private $hour;
	private $patientId;

    public function __construct($date, $time, $patId)
    {
        $this->setDate($date);
        $this->setHour($time);
        $this->setPatientId($patId);
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