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
	
	public function uploadProfileImage($fileName, $tempName)
	{
		$file = new File($fileName, $tempName);
		$upload = new Upload($file);
		$upload->send();
	}
}