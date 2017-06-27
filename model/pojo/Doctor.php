<?php

namespace model\pojo;

use model\pojo\Pojo;

/**
 * 
 * @author vitor.brangioni
 *
 */
class Doctor extends Pojo
{
	private $id;
	private $name;
	private $userId;
	
	public function __construct($id, $name, $userId)
	{
		$this->setId($id);
		$this->setName($name);
		$this->setUserId($userId);
	}

    /**
     * id
     * @return unkown
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * id
     * @param unkown $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * name
     * @return unkown
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * name
     * @param unkown $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * user_id
     * @return unkown
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * user_id
     * @param unkown $user_id
     */
    public function setUserId($userId)
    {
    	$this->userId = $userId;
    }

}