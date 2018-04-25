<?php

require_once '../../vendor/autoload.php';
require_once '../../config/managementSession.php';

use src\controller\AppointmentController;
use src\controller\PatientController;
use src\controller\DiagramController;   

$step1 = 'come-back';
$step2 = 'come-back';
$step3 = 'come-back';
$step4 = 'active';

$appointmentController = AppointmentController::getInstance();
$patientController = PatientController::getInstance();
$diagramController = DiagramController::getInstance();

$appointment = $appointmentController->findById($_GET['appointmentId']);
$patient = $patientController->findById(1);
$diagram = $diagramController->findById($_GET['diagramId']);


$mode = 'view';

if (isset($_SESSION['mode']) && $_SESSION['mode'] === 'edit') {
	$mode = $_SESSION['mode'];
	unset($_SESSION['mode']);
}
?>


<!DOCTYPE html>
<html>

<head>
    <?php include '../includes/head.html'; ?>
</head>

<body onload="zerinho()">
<input type="hidden" name="diagramId" id="diagramId" value="<?= $_GET['diagramId']; ?>">
<input type="hidden" name="diagramImg" id="diagramImgDepth1" value="<?= $diagram->getImageDepth1(); ?>">
<input type="hidden" name="diagramImg" id="diagramImgDepth2" value="<?= $diagram->getImageDepth2(); ?>">
<input type="hidden" name="diagramImg" id="diagramImgDepth3" value="<?= $diagram->getImageDepth3(); ?>">
<input type="hidden" name="diagramImg" id="diagramImgDepth4" value="<?= $diagram->getImageDepth4(); ?>">
<input type="hidden" name="depth" id="depth" value="1">
<input type="hidden" name="mode" id="mode" value="<?= $mode ?>">

<nav>
    <?php include '../includes/nav.html' ?>
</nav>

<header>
    <div class="container-fluid">
        <div class="row">
        
        
        	<?php if ($_GET['mode'] === 'edit'): ?>
        	
	            <div class="col-md-2 col-md-push-8">
	                <a onclick="Clear()" class="text-center btn btn-danger ">
	                    <span class="glyphicon glyphicon-erase"></span> Limpar
	                </a>
	                <a name="register" download="diagrama.png" onclick="Save(this)" class="text-center btn btn-success ">
	                    <span class="glyphicon glyphicon-save"></span> Download
	                </a>
	            </div>
            
            <?php endif; ?>
            
            <?php if ($_GET['mode'] === 'view'): ?>
        	
	            <div class="col-md-2 col-md-push-10">
	    			 <button type="button" class="btn btn-info" data-toggle="modal" data-target="#diagram-detail">Detalhes</button>
	            </div>
            
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Modal -->
	 <div class="modal fade" id="diagram-detail" role="dialog">
	    <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Detalhes do Diagrama</h4>
	        </div>
	        <div class="modal-body">
		          <h2><?= $diagram->getTitle(); ?></h2>
	        		<p><?= $diagram->getDesc(); ?></p>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	    </div>
	  </div>
</header>

<div style="height: 600px">
    <br>
    <canvas class="center-block img-responsive" id="canvas1"></canvas>
	<div id="diagram-img" class="center">
	</div>

	<div class="row">
		<div class="col-md-1">
			<span>Superficial</span>
		</div>
		<div class="col-md-10">
		    <input class="slider-profundidade center-block" type="range" id="prof" min="1" max="4" step="1" value="1"/>
		    <span class="text-center" id="ex6CurrentSliderValLabel"><h3 id="SliderValue">Profundidade: 0%</h3></span>
		</div>
		<div class="col-md-1">
			<span>Profunda</span>
		</div>
	</div>




<?php if ($_GET['mode'] === 'edit'): ?>
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

<?php endif; ?>

<script src="../tools/js/canvas.js"></script>

</body>
</html>