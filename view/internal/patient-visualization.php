<?php
require_once '../../vendor/autoload.php';

use src\controller\AppointmentController;
use src\controller\PatientController;

session_start();
$appointmentController = AppointmentController::getInstance();
$patientController = PatientController::getInstance();
$patient = $patientController->findById($_GET['patientId']);

if (isset($_POST['register'])) {
	$appointmentController->register($_GET['patientId']);
}

if (isset($_POST['delete'])) {
    var_dump($patient);
    $patientController->delete($patientController->findById($_GET['patientId']));
    header("Location: patient-management.php");
    exit(); 
}


?>

<html>
<head>
    <title>Pain O Matic</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../tools/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
    <script src="../tools/js/utils.js"></script>

    <script type="text/javascript">
        function editar() {
            $("#form1 :input").attr("disabled", false);
            $("#btnEditar").toggle();
            $("#btnExcluir").toggle();
            $("#btnSalvar").toggle();
            $("#btnLimpar").toggle();
            $("#ultEd").attr("disabled", true);
        }
        function salvar() {
            $("#form1 :input").attr("disabled", true);
            $("#btnEditar").toggle();
            $("#btnEditar").attr("disabled", false);
            $("#btnExcluir").toggle();
            $("#btnExcluir").attr("disabled", false);
            $("#btnSalvar").toggle();
            $("#btnLimpar").toggle();
        }
    </script>
    <style>
        .breadcrumb > li + li:before {
            content: "\3E"
        }
    </style>


</head>

<body>
<script>
    $(document).ready(function () {
        $('.btn-alert').click(function () {
            $('.alert-adicionar').show();
        })

        $('.btn-alert-excluir').click(function () {
            $('.alert-excluir').show();
        })
    });
</script>

<form method="POST" action="">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">

                <ol class="breadcrumb col-xs-12 inline-block">
                    <li><a type="button" class="btn btn-danger" href="../../../public/index.php" id="voltar">
                            Sair
                        </a></li>
                    <li><a class="btn btn-default" href="patient-management.php">
                            Pacientes
                        </a></li>
                    <li><a class="btn btn-info">
                            <?= $patient['name']; ?>
                        </a></li>
                    <li class="pull-right">
                        <button class="btn btn-success" type="submit" name="register">
                            Adicionar Consulta
                        </button>
                    </li>
                </ol>

                <a class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#myModal2">
                <?php 
                 	echo '<img class="xs-image border center" alt="" src="'.$patient['photo'].'"> <strong>'.$patient['name'].'</strong></h3>';
                ?>
                   
                </a>

                <legend><h2><strong>Consultas</strong></h2></legend>
                <div class="list-group">

                    <?php
                    $result = $appointmentController->listAllPatientAppointments($_GET['patientId']);
                    foreach ($result as $data) {

                        echo '<a class="list-group-item list-group-item-action" onClick="utilsAppointmentAjax('.$data['id'].')" 
								href="appointment-visualization.php?appointmentId=' .$data['id']. '">Consulta ' . $data['date'] . ' -
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
                    <div class="alert alert-success alert-adicionar fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Consulta <strong>adicionada</strong> com sucesso!
                    </div>
                    <div class="alert alert-success alert-excluir fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Consulta <strong>excluída</strong> com sucesso!
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
