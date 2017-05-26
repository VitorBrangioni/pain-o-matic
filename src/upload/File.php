<?php

namespace src\upload;

class File
{
	private $path;
	private $name;
	private $extension;
	private $tempName;
	
	public function __construct(String $path, $tempName = null)
	{
		$this->setPath($path);
		$this->setTempName($tempName);
		$this->setExtension(pathinfo($path, PATHINFO_EXTENSION));
		$this->setName(pathinfo($path,  PATHINFO_FILENAME));
	}

	
	public function getPath()
	{
		return $this->path;
	}
	
	public function setPath($path)
	{
		$this->path = $path;
	}
	
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getExtension()
    {
        return $this->extension;
    }

    public function setExtension($extension)
    {
        $this->extension = $extension;
    }

    public function getTempName()
    {
        return $this->tempName;
    }

    public function setTempName($tempName)
    {
        $this->tempName = $tempName;
    }

}