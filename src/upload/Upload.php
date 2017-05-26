<?php

namespace src\upload;

class Upload
{
	private $file;
	private $target;
	private $newFileName;
	
	public function __construct(File $file, String $target = "/", $newFileName = null)
	{
		if ($file == null || $file->getTempName() == null) {
			throw new \Exception();
		}
		$this->setFile($file);
		$this->setTarget($target);
		$this->newFileName = ($newFileName != null) ? $newFileName: null;
	}

    public function getFile()
    {
        return $this->file;
    }

    public function setFile(File $file)
    {
    	$this->file = $file;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function setTarget($target)
    {
        $this->target = $target;
    }
    
    public function send()
    {
    	 $fullTarget = ($this->newFileName != null)? $this->target.$this->newFileName: $this->target.$this->file->getPath();
    	
    	try {
	    	move_uploaded_file($this->file->getTempName(), $fullTarget);
    	} catch (\Exception $ex) {
    		throw new \Exception("Falha ao fazer upload!");
    	} 
    	
    }

}