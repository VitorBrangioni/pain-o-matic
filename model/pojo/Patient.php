<?php

namespace model\pojo;

/**
 * 
 * @author vitor.brangioni
 *
 */
class Patient extends Pojo
{
	private $id;
	private $name;
	private $cpf;
	private $rg;
	private $photo;


	public function __construct($name, $cpf, $rg, $photo)
	{
		$this->setName($name);
		$this->setCpf($cpf);
		$this->setRg($rg);
		$this->setPhoto($photo);
	}
	
    public function getName()
    {
        return $this->name;
    }

    public function setName(String $name)
    {
        $this->name = $name;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function setRg(String $rg)
    {
        $this->rg = $rg;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto(String $photo)
    {
        $this->photo = $photo;
    }

}