<?php
require_once '../../vendor/autoload.php';
require '../../config/config.php';

use src\controller\AppointmentController;
use src\controller\PatientController;
use src\controller\DiagramController;


session_start();
$appointmentController = AppointmentController::getInstance();
$patientController = PatientController::getInstance();
$diagramController = DiagramController::getInstance();

$appointment = $appointmentController->findById($_GET['appointmentId']);
$patient = $patientController->findById($_SESSION['patientId']);

echo $_SESSION['patientId'];

if (isset($_POST['submit'])) {
	$diagramController->register($_POST['title'], $_POST['desc'], $_GET['appointmentId']);
}

?>

    <html>

    <head>
        <title>Pain O' Meter</title>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

        <style>
            .breadcrumb>li+li:before {
                             content: "\3E" 
            }
        </style>
    </head>

    <body>
        <nav class="container-fluid">
            <div class="row">
                <ol class="breadcrumb col-xs-12 inline-block">
                    <li><a type="button" class="btn btn-danger" href="../../../public/index.php" id="voltar">
                            Sair
                        </a></li>
                    <li><a class="btn btn-default" href="patient-management.php">
                            Pacientes
                        </a></li>
                    <li>
                        <a class="btn btn-default" href="patient-visualization.php">
                            <?= $patient['name']; ?>
                        </a>
                    </li>
                    </li>
                    <li>
                        <a class="btn btn-info">
                            <?= $appointment['date'] ?>
                        </a>
                    </li>
                    <li class="pull-right">
                        <a type="button_add" class="btn btn-success " data-toggle="modal" data-target="#myModal">
                            Novo Diagrama
                        </a>
                    </li>
                </ol>
            </div>
        </nav>
        <header>
            
        </header>

        <form method="POST" action="">
	        <section>
	        
	        <?php 
	        	
	        $diagrams = $diagramController->listAllAppointmentDiagrams($_GET['appointmentId']);
	        foreach ($diagrams as $data) {
	        	echo '<div class="col-lg-2 col-md-3 col-sm-6">
						<div class="card" style="width: 20rem;">
							<img class="card-img-top" style="width: 200px;" src="../images/diagrams/' .$data['img_diagram']. '" alt="Card image cap">
							<div class="card-block">
	                  			<h4 class="card-title">' .$data['title']. '</h4>
	                    		<p class="card-text">' .$data['description']. '</p>
	                    		<a href="#" class="btn btn-primary btn-block">Go somewhere</a>
	                 		</div>
						</div>
					</div>';
	        	
	        }
	        
	        ?>
	
	        </section>

	        <!-- Inicio Modal -->
	        <div class="modal fade" id="myModal" role="dialog">
	            <div class="modal-dialog">
	
	                <!-- Modal content-->
	                <div class="modal-content">
	                    <div class="modal-header">
	                        <button type="button" class="close" data-dismiss="modal">&times;</button>
	                        <h4 class="modal-title">Adicionar Diagrama</h4>
	                    </div>
	                    <div class="modal-body">
	                        <div class="form-group">
	                            <input type="text" name="title" class="form-control" placeholder="Titulo">
	                        </div>
	                        <div class="form-group">
	                            <textarea name="desc" class="form-control" rows="3" maxlength="120" placeholder="Descricao"></textarea>
	                        </div>
	                    </div>
	                    <div class="modal-footer">
	                        <button type="submit" name="submit" class="btn btn-success">Adicionar</button>
	                    </div>
	                </div>
	
	            </div>
	        </div>
	        <!-- Fim Modal -->
        </form>
	</body>
</html>
