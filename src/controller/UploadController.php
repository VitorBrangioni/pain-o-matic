<?php

namespace src\controller;

use src\upload\File;
use src\upload\Upload;

class UploadController
{
	private static $instance;
	//private static $patientDAO;
	
	
	private function __construct()
	{
	}
	
	public static function getInstance()
	{
		if (!isset(self::$instance) || !isset(self::$patientDAO)) {
			self::$instance = new UploadController();
			//self::$patientDAO = PatientDAO::getInstance();
		}
		return self::$instance;
	}
	
	public function uploadProfileImage($fullFileName, $tempName, $newImageName)
	{
		echo "====".$fullFileName;
		$newImageName = $newImageName."_".time();
		$file = new File($fullFileName, $tempName);
		$target = "../../images/patient-profile/";
		
		if ($file != null && $file->getTempName() != null) {
			$upload = new Upload($file, $target, $newImageName);
			$upload->send();
		}
		return $target.$newImageName.".".$file->getExtension();
	}
}