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
$step1 = 'come-back';
$step2 = 'come-back';
$step3 = 'active';

$appointment = $appointmentController->findById($_GET['appointmentId']);
$patient = $patientController->findById($_GET['patientId']);

if (isset($_POST['submit'])) {
	$diagramController->register($_POST['title'], $_POST['desc'], $_GET['appointmentId']);
}

?>

    <html>

    <head>
        <title>Pain O' Meter</title>
        <meta charset="UTF-8">


    <link rel="stylesheet" href="../tools/bootstrap-3/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="../tools/css/nav.css">
    <link rel="stylesheet" href="../tools/css/card.css">
    <link rel="stylesheet" href="../tools/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    </head>

    <body>
        <nav>
            <?php include '../includes/nav.html'; ?>
        </nav>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <a class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#myModal2">
                            <?php 
                 	            echo '<img class="xs-image border center" alt="" src="'.$patient['photo'].'"> <strong>'.$patient['name'].'</strong></h3>';
                            ?>
                        </a>
                    </div>
                    <div class="col-md-2 col-md-push-8">
                        <a type="button_add" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">
                            Novo Diagrama
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <section>
            <form method="POST" action="">
                <div class="index-content">
                    <div class="container">
                    <?php 
	        	
	                $diagrams = $diagramController->listAllAppointmentDiagrams($_GET['appointmentId']);
	                foreach ($diagrams as $data) {
	        	        echo '<a href="pain-diagram.php?patientId=' .$_GET['patientId']. '&appointmentId=' .$_GET['appointmentId']. '&diagramId=' .$data['id']. '&mode=view">
                                <div class="col-lg-4 padding-top-15">
                                    <div class="card">
                                        <img src="../images/diagrams/' .$data['img_diagram']. '">
                                        <div class="card-info">
                                            <h4>' .$data['title']. '</h4>
                                            <p>
                                                ' .substr($data['description'], 0, 150). '...
                                            </p>
                                        </div>
                                        <a href="blog-ici.html" class="blue-button">Baixar Imagem</a>
                                    </div>
                                </div>
                            </a>';
	                }
	                ?>
                    </div>
                </div>
            </form>
        </section>
        <!-- Inicio Modal -->
        <form method="post" action="">
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
                                <input type="text" name="title" class="form-control" placeholder="Titulo" required>
                            </div>
                            <div class="form-group">
                                <textarea name="desc" class="form-control" rows="3" maxlength="240" placeholder="Descricao" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                                <input type="submit" name="submit" value="Adicionar" class="btn btn-success btn-block">
                        </div>
                    </div>

                </div>
            </div>
            </form>
            <!-- Fim Modal -->
                            <!-- Modal -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="modal fade" id="myModal2" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><?= $patient['name']; ?></h4>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="modal-body">
                                                    <img class="smaller-image border center-block" alt=""
                                                         src="<?= $patient['photo']; ?>">

                                                        <div class="col-md-6">
                                                            <fieldset>
                                                                <div class="form-group">
                                                                    <label>Nome completo:</label>
                                                                    <input name="nomePac" id="nomePac" type="text"
                                                                           class="form-control" name="codigo"
                                                                           value="<?= $patient['name']; ?>" autofocus
                                                                           required disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Identificador:</label>
                                                                    <input name="idPac" type="text" class="form-control"
                                                                           name="codigo" value="<?= $patient['id']; ?>"
                                                                           autofocus required disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>RG:</label>
                                                                    <input name="rgPac" type="text" class="form-control"
                                                                           name="codigo" value="<?= $patient['rg']; ?>"
                                                                           autofocus required disabled>
                                                                </div>

                                                            </fieldset>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <fieldset>
                                                                <div class="form-group">
                                                                    <label>CPF:</label>
                                                                    <input name="cpfPac" type="text"
                                                                           class="form-control"
                                                                           name="codigo" value="<?= $patient['cpf']; ?>"
                                                                           autofocus required disabled>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="text-center">
                                                                    <button type="submit" name="register" id="btnSalvar"
                                                                            onclick="salvar()" class="btn btn-success"
                                                                            style="display:none">Salvar
                                                                    </button>
                                                                    <!--<button type="button" name="btnEditar"
                                                                            id="btnEditar"
                                                                            onclick="editar()" class="btn btn-primary">
                                                                        Editar
                                                                    </button>-->
                                                                    <button type="submit" name="delete"
                                                                            id="btnExcluir"
                                                                            class="btn btn-danger">Excluir
                                                                    </button>
                                                                    <a href="./nursing-historic.php?patientId=<?= $patient['id'] ?>"
                                                                            class="btn btn-info">Historico de Enfermagem
                                                                    </a>
                                                                    <button type="reset" name="btnLimpar" id="btnLimpar"
                                                                            class="btn btn-warning"
                                                                            style="display:none">
                                                                        Limpar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="alert alert-success alert-adicionar fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Consulta <strong>adicionada</strong> com sucesso!
                    </div>
                    <div class="alert alert-success alert-excluir fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Consulta <strong>excluída</strong> com sucesso!
                    </div>
                </div>
    </body>

    </html>