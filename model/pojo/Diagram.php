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
	private $image;
	private $idAppointment;
	
	private $thumbnail;
    private $prof0;
    private $prof25;
    private $prof50;
    private $prof75;
    private $prof100;
    
    public function __construct($title, $desc, $img, $idAppointment)
    {
    	$this->setTitle($title);
    	$this->setDesc($desc);
    	$this->setImage($img);
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
     * image
     * @return unkown
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * image
     * @param unkown $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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

}