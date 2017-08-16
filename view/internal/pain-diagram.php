<?php

include_once '../includes/head.html';
require_once '../../vendor/autoload.php';

use src\controller\AppointmentController;
use src\controller\PatientController;
use src\controller\DiagramController;   


$appointmentController = AppointmentController::getInstance();
$patientController = PatientController::getInstance();
$diagramController = DiagramController::getInstance();

$appointment = $appointmentController->findById($_GET['appointmentId']);
$patient = $patientController->findById(1);
$diagram = $diagramController->findById($_GET['diagramId']);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Pain O Matic</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../tools/css/style.css">

    <style>
        .breadcrumb > li + li:before {
            content: "\3E"
        }
    </style>
</head>

<body onload="zerinho()">

<div class="col-xs-12">
    <ol class="breadcrumb col-xs-12 inline-block">
        <li><a type="button" class="btn btn-danger" href="../../../public/index.php" id="voltar">
                Sair
            </a></li>
        <li><a class="btn btn-default" href="patient-management.php">
                Pacientes
            </a></li>
        <li><a class="btn btn-default" href="patient-visualization.php?pId=<?php echo $_GET['pId'] ?>">
                <?= $patient['name']; ?>
            </a></li>
        <li><a class="btn btn-default" href="appointment-visualization.php?pId=<?php echo $_GET['pId'] ?>&aId=<?php echo $_GET['aId'] ?>">
                <?= $appointment['date']; ?>
            </a></li>
        <li><a class="btn btn-info">
                Editar Diagrama
            </a></li>
        </li>
        <li class="pull-right">
                <button type="button" onclick="Clear()" class="text-center btn btn-danger">Limpar</button>
                <a type="button" name="register" download="diagrama.png" onclick="Save(this)" class="text-center btn btn-success">Salvar</a>
        </li>
    </ol>

</div>
<div>
    <br>
    <canvas class="center-block img-responsive" id="canvas1"></canvas>
<br>
    <div class="panel panel-default"><br>
    <input class="sliderBonito center-block" type="range" id="prof" min="0" max="4" step="1" value="0"/>

    <span class="text-center" id="ex6CurrentSliderValLabel"><h3 id="SliderValue">Profundidade: 0%</h3></span>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="btn-group btn-group-justified color-pallet center-block" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="button" onclick="strokeCOLOR(this); strokeWIDTHVal(10)" id="btn-grey"
                            style="background:black"
                            class="strokeColor btn btn-default glyphicon glyphicon-pencil"></button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" onclick="strokeCOLOR(this); strokeWIDTHVal(10)" id="btn"
                            style="background:red"
                            class="strokeColor btn btn-default glyphicon glyphicon-pencil"></button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" onclick="strokeCOLOR(this); strokeWIDTHVal(10)" id="btn"
                            style="background:orange"
                            class="strokeColor btn btn-default glyphicon glyphicon-pencil"></button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" onclick="strokeCOLOR(this); strokeWIDTHVal(10)" id="btn"
                            style="background:yellow"
                            class="strokeColor btn btn-default glyphicon glyphicon-pencil"></button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" onclick="strokeCOLOR(this); strokeWIDTHVal(25)" id="btn"
                            style="background:white"
                            class="strokeColor btn btn-default glyphicon glyphicon-erase"></button>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../tools/js/canvas.js"></script>

</body>
</html>