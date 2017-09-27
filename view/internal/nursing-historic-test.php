<?php
require_once '../../vendor/autoload.php';

use src\controller\PatientController;
use src\controller\NursingHistoricController;

$controller = NursingHistoricController::getInstance();
$patientController = PatientController::getInstance();

$historic = $controller->findByPatient(1);

// echo $historic['questions'];


$array = json_decode($historic->getQuestions(), true);


// print_r($array);

$array['identificacao']['sexo'] = "F";
// echo json_encode($array);

// echo $array['identificacao']['sexo'];

$test = array();

$dados = "dados";
$test[$dados] =  array("cor" => "verde", "cpf" => 131);

echo json_encode($test);

// print_r($test); 