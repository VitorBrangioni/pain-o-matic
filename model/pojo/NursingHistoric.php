<?php

namespace model\pojo;

use model\pojo\Pojo;

/**
 * 
 * @author vitor.brangioni
 *
 */
class NursingHistoric extends Pojo
{
	private $questions;
	private $padientId;
	
	public function __construct($questions, $padientId)
	{
        $this->setQuestions($questions);
        $this->setPadientId($padientId);
    }

    /**
     * questions
     * @return unkown
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * questions
     * @param unkown $questions
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;
    }

    /**
     * padientId
     * @return unkown
     */
    public function getPadientId()
    {
        return $this->padientId;
    }

    /**
     * padientId
     * @param unkown $padientId
     */
    public function setPadientId($padientId)
    {
        $this->padientId = $padientId;
    }

}