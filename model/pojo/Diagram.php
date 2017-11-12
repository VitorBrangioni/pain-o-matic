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
	private $title;
	private $desc;
    private $imageDepth1;
    private $imageDepth2;
    private $imageDepth3;
    private $imageDepth4;
	private $idAppointment;
	

	public function __construct($title, $desc, $idAppointment, $imageDepth1 = null, $imageDepth2 = null, $imageDepth3 = null, $imageDepth4 = null)
    {
    	$this->setTitle($title);
    	$this->setDesc($desc);
        $this->setImageDepth1($imageDepth1);
        $this->setImageDepth2($imageDepth2);
        $this->setImageDepth3($imageDepth3);
        $this->setImageDepth4($imageDepth4);
    	$this->setAppointmentId($idAppointment);
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
    	return $this->idAppointment;
    }

    /**
     * @param mixed $appointment_id
     */
    public function setAppointmentId($idAppointment)
    {
    	$this->idAppointment= $idAppointment;
    }

    /**
     * desc
     * @return unkown
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * desc
     * @param unkown $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }


    /**
     * title
     * @return unkown
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * title
     * @param unkown $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getImageDepth1()
    {
        return $this->imageDepth1;
    }

    /**
     * @param mixed $imageDepth1
     */
    public function setImageDepth1($imageDepth1)
    {
        $this->imageDepth1 = $imageDepth1;
    }

    /**
     * @return mixed
     */
    public function getImageDepth2()
    {
        return $this->imageDepth2;
    }

    /**
     * @param mixed $imageDepth2
     */
    public function setImageDepth2($imageDepth2)
    {
        $this->imageDepth2 = $imageDepth2;
    }

    /**
     * @return mixed
     */
    public function getImageDepth3()
    {
        return $this->imageDepth3;
    }

    /**
     * @param mixed $imageDepth3
     */
    public function setImageDepth3($imageDepth3)
    {
        $this->imageDepth3 = $imageDepth3;
    }

    /**
     * @return mixed
     */
    public function getImageDepth4()
    {
        return $this->imageDepth4;
    }

    /**
     * @param mixed $imageDepth4
     */
    public function setImageDepth4($imageDepth4)
    {
        $this->imageDepth4 = $imageDepth4;
    }
}