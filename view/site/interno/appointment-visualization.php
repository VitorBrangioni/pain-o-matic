<?php
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
    $diagramController->register($_POST['thumbn'], $_GET['aId']);
}

?>

<html>
<head>
    <title>Pain O' Meter</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>

    <script type="text/javascript">

        function editar() {
            <!-- salvar editar excluir limpar -->
            $("#form1 :input").attr("disabled", false);
            $("#btnEditar").toggle();
            $("#btnExcluir").toggle();
            $("#btnSalvar").toggle();
            $("#btnLimpar").toggle();
            $("#ultEd").attr("disabled", true);
            $("#dataConsl").attr("disabled", true);
        }

        function salvar() {
            <!-- salvar editar excluir limpar -->
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
                    <li><a class="btn btn-default" href="patient-visualization.php?pId=<?php echo $_GET['pId'] ?>">
                            <?= $patient['name']; ?>
                        </a></li></li>
                    <li><a class="btn btn-info">
                            <?= $appointment['date'] ?>
                        </a></li>
                    <li class="pull-right">
                        <a type="button_add" class="btn btn-success " data-toggle="modal"
                                data-target="#myModal1">
                            Adicionar Diagrama
                        </a>
                    </li>
                </ol>

                <div>
                <a class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#myModal3"><strong>Consulta Dia <?= $appointment['date'] ?></strong></a>
                </div>

                <legend><h2><strong>Diagramas</strong></h2></legend>

                <div class="list-group">
                    <?php
                    $appointmentDiagrams = $diagramController->listAllAppointmentDiagrams($_GET['aId']);
                    $i = 1;
                    foreach ($appointmentDiagrams as $data){
                        echo '<a class="list-group-item list-group-item-action" href="pain-diagram.php?pId=' . $_GET['pId'] . '&aId='.$_GET['aId'].'&dId='.$data['id'].'"> Diagrama '.$data['thumbnail'].'</a>';
                        $i++;
                    }
                    ?>
                </div>

                <!-- Modal -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="modal fade" id="myModal3" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Informações da Consulta</h4>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="modal-body">
                                                    <form id="form3" name="form3" method="post" action="">
                                                        <div class="col-md-6">
                                                            <fieldset>
                                                                <div class="form-group">
                                                                    <label>Médico:</label>
                                                                    <input name="nomeMed" id="nomeMed" type="text"
                                                                           class="form-control" name="codigo"
                                                                           value="Dr. Cleber Santos" autofocus required
                                                                           disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Paciente:</label>
                                                                    <input name="nomePac" type="text"
                                                                           class="form-control"
                                                                           name="codigo" value="<?= $patient['name'] ?>"
                                                                           autofocus required disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Data:</label>
                                                                    <input name="dataConsl" type="text"
                                                                           class="form-control"
                                                                           name="codigo"
                                                                           value="<?= $appointment['date'] ?> às <?= $appointment['hora'] ?>"
                                                                           autofocus required disabled>
                                                                </div>

                                                            </fieldset>
                                                        </div>
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="text-center">
                                                                    <button type="submit" name="btnSalvar"
                                                                            id="btnSalvar"
                                                                            onclick="salvar()" class="btn btn-success"
                                                                            style="display:none">Salvar
                                                                    </button>
                                                                    <!--<button type="button" name="btnEditar"
                                                                            id="btnEditar"
                                                                            onclick="editar()" class="btn btn-primary"
                                                                            style="display:none">
                                                                        Editar
                                                                    </button>-->
                                                                    <button type="button" name="btnExcluir"
                                                                            id="btnExcluir"
                                                                            onclick="location.href = 'visualiza-paciente.html';"
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
                </div>



                <!-- Modal -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="modal fade" id="myModal1" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Adicionar Diagrama</h4>
                                        </div>

                                        <!--MODAl-->
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="modal-body">
                                                    <form id="form1" name="form1" method="post" action="">

                                                        <div class="col-md-6">
                                                            <fieldset>
                                                                <div class="form-group">
                                                                    <label>Descrição:</label>
                                                                    <input type="text" name="thumbn" class="form-control"
                                                                           autofocus required>
                                                                </div>
                                                            </fieldset>
                                                        </div>

                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="text-center">
                                                                    <button type="submit" name="register" class="btn btn-success btn-alert">Cadastrar
                                                                    </button>
                                                                    <button type="reset" name="button2" id="button2"
                                                                            class="btn btn-warning">Limpar
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

    </div>
</form>
</body>
</html>
