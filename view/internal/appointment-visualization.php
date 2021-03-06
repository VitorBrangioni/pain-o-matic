<?php
require_once '../../vendor/autoload.php';
require_once '../../config/managementSession.php';
require_once '../../config/user-message.php';

use src\controller\AppointmentController;
use src\controller\PatientController;
use src\controller\DiagramController;

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

if (isset($_POST['redirectQuestions'])) {
    $appointmentController->viewQuestions($_GET['appointmentId']);
}

?>

    <html>

<head>
    <?php include '../includes/head.html'; ?>
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
                 	            echo '<img class="profile-img border center" alt="" src="'.$patient['photo'].'"> <strong>'.$patient['name'].'</strong></h3>';
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
        <?php include '../includes/user-message.html'; ?>
        <legend><h2><strong>Consulta - <?= $appointment['date'] ?>, <?= $appointment['hora'] ?></strong></h2></legend>
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
                                        <img src="../images/diagrams/' .$data['img_diagram_depth1']. '">
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
                    //
                    echo '<div class="col-lg-4 padding-top-15">
                    <button type="submit" name="redirectQuestions">
                                    <div class="card">
                                        <img src="../images/appointment-data.png">
                                        <div class="card-info">
                                            <h4> Dados da Consulta</h4>
                                            <p>
                                            </p>
                                        </div>
                                        <a href="" class="blue-button"></a>
                                    </div>
                                    </button>
                                </div>';
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
                </div>
    </body>

    </html>