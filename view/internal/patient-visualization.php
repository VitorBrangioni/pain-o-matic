<?php

require_once '../../vendor/autoload.php';
require_once '../../config/managementSession.php';
require '../../config/config.php';

use src\controller\AppointmentController;
use src\controller\PatientController;

session_start();
$appointmentController = AppointmentController::getInstance();
$patientController = PatientController::getInstance();
$patient = $patientController->findById($_GET['patientId']);
$step1 = 'come-back';
$step2 = 'active';

if (isset($_POST['register'])) {
    $appointmentController->create($_GET['patientId']);
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
                <form method="post" action="">
                    <input type="submit" name="register" value="Adicionar Consulta" class="btn btn-success btn-block">
                </form>
            </div>
        </div>
    </div>
</header>

<form method="POST" action="">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <legend><h2><strong>Consultas</strong></h2></legend>
                <div class="list-group">

                    <?php
                    $result = $appointmentController->listAllPatientAppointments($_GET['patientId']);
                    foreach ($result as $data) {

                        echo '<a class="list-group-item list-group-item-action" onClick="utilsAppointmentAjax('.$data['id'].')" 
								href="appointment-visualization.php?patientId=' .$_GET['patientId']. '&appointmentId=' .$data['id']. '">Consulta ' . $data['date'] . ' -
                                ' . $data['hora'] . '</a>';
                    }
                    ?>
                </div>
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

                                                    <form id="form1" name="form1" method="post" action="">
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
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <!--
                    <label>Nome completo:</label>
                <ul class = "nav">
                 <li class="li-modal">23 Março 2017 - 13:59:45</li>
                </ul> -->

            </div>
        </div>


        <!--
         <label>Nome completo:</label>
     <ul class = "nav">
     <li class="li-modal">23 Mar�o 2017 - 13:59:45</li>
     </ul> -->

    </div>
    </div>

</form>
</body>
</html>
