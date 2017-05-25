<?php

namespace model\pojo;

/**
 * 
 * @author vitor.brangioni
 *
 */
class Diagram extends Pojo
{
	private $id;
	private $thumbnail;
	private $appointment_id;
    private $prof0;
    private $prof25;
    private $prof50;
    private $prof75;
    private $prof100;


	public function __construct($thumbnail, $appointment_id, $prof0, $prof25, $prof50, $prof75, $prof100)
	{
		$this->setThumbnail($thumbnail);
		$this->setAppointmentId($appointment_id);
		$this->setProf0($prof0);
        $this->setProf25($prof25);
        $this->setProf50($prof50);
        $this->setProf75($prof75);
        $this->setProf100($prof100);

	}
	
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAppointmentId()
    {
        return $this->appointment_id;
    }

    /**
     * @param mixed $appointment_id
     */
    public function setAppointmentId($appointment_id)
    {
        $this->appointment_id = $appointment_id;
    }

    /**
     * @return mixed
     */
    public function getProf0()
    {
        return $this->prof0;
    }

    /**
     * @param mixed $prof0
     */
    public function setProf0($prof0)
    {
        $this->prof0 = $prof0;
    }

    /**
     * @return mixed
     */
    public function getProf25()
    {
        return $this->prof25;
    }

    /**
     * @param mixed $prof25
     */
    public function setProf25($prof25)
    {
        $this->prof25 = $prof25;
    }

    /**
     * @return mixed
     */
    public function getProf50()
    {
        return $this->prof50;
    }

    /**
     * @param mixed $prof50
     */
    public function setProf50($prof50)
    {
        $this->prof50 = $prof50;
    }

    /**
     * @return mixed
     */
    public function getProf75()
    {
        return $this->prof75;
    }

    /**
     * @param mixed $prof75
     */
    public function setProf75($prof75)
    {
        $this->prof75 = $prof75;
    }

    /**
     * @return mixed
     */
    public function getProf100()
    {
        return $this->prof100;
    }

    /**
     * @param mixed $prof100
     */
    public function setProf100($prof100)
    {
        $this->prof100 = $prof100;
    }



}