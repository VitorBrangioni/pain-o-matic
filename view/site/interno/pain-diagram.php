<?php
include_once '../global-includes/head.html';
require_once '../../../vendor/autoload.php';

use src\controller\AppointmentController;
use src\controller\PatientController;
use src\controller\DiagramController;

$appointmentController = AppointmentController::getInstance();
$patientController = PatientController::getInstance();
$diagramController = DiagramController::getInstance();

$appointment = $appointmentController->findById($_GET['aId']);
$patient = $patientController->findById($_GET['pId']);

if (isset($_POST['register'])) {
    //$thumb, $appointment_id, $prof0, $prof25, $prof50, $prof75, $prof100
    $prof0=$prof25=$prof50=$prof75=$prof100 = null;

    echo "<script> transfere($prof0, $prof25, $prof50, $prof75, $prof100) </script>";

    $diagramController->register(null, $_GET['aId'], $prof0, $prof25, $prof50, $prof75, $prof100);
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style.css">
</head>

<body onload="zerinho()">
<div class="container">
    <div class="row">
        <div class="col-xs-2 text-center margin-top-20">
            <a role="button" href="appointment-visualization.php?pId=<?php echo $_GET['pId'] ?>&aId=<?php echo $_GET['aId'] ?>">Voltar
            </a>

        </div>
        <div class="col-xs-4 col-xs-offset-2 text-center">
            <h2>Editar Modelo</h2>
        </div>
        <div class="col-xs-3 col-xs-offset-1 text-center">
            <button type="button" onclick="Clear()" class="btn btn-block btn-danger">Limpar</button>
            <a type="button" name="register" download="diagrama.png" onclick="Save(this)" class="btn btn-block btn-success">Salvar</a>
        </div>
    </div>
</div>

<div>
    <canvas class="center-block img-responsive" id="canvas1"></canvas>

    <input type="range" id="prof" min="0" max="4" step="1" value="0"/>

    <span id="ex6CurrentSliderValLabel">Current Slider Value: <p id="SliderValue"></p></span>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-group-justified color-pallet" role="group" aria-label="...">
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
                            class="strokeColor btn btn-default glyphicon glyphicon-pencil"></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="canvas1.js"></script>

</body>
</html>
