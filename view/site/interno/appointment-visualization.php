<?php
require_once '../../../vendor/autoload.php';

use src\controller\AppointmentController;
use src\controller\PatientController;

$appointmentController = AppointmentController::getInstance();
$patientController = PatientController::getInstance();

$appointment = $appointmentController->findById($_GET['aId']);
$patient = $patientController->findById($_GET['pId']);


if (isset($_POST['register'])) {
    date_default_timezone_set('America/Sao_Paulo');
    $time = date("H:i:s");
    $date = date("Y-m-d");
    $appointmentController->register($date, $time, $_GET['pId']);
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


</head>

<body>
<form method="POST" action="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="input-group-btn">
                    <a class="btn btn-danger" href="patient-visualization.php?pId=<?php echo $_GET['pId'] ?>" role="button" id="voltar">Voltar
                    </a>
                </div>

                <div class="input-group-btn">
                    <button class="btn btn-success pull-right" type="submit" name="register">
                        Adicionar Diagrama
                    </button>
                </div>

                <div><br></div>


                <a data-toggle="modal" data-target="#myModal3"><h3><strong><?= $appointment['date'] ?></strong></h3></a>

                <legend><h2><strong>Diagramas</strong></h2></legend>
                <ul class="nav">

                </ul>

                <!-- Modal -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="modal fade" id="myModal3" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">29/04/2017 - 13:59:59</h4>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="modal-body">
                                                    <form id="form1" name="form1" method="post" action="">
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

                                                        <div class="col-md-6">
                                                            <fieldset>
                                                                <div class="form-group">
                                                                    <label>Última edição:</label>
                                                                    <input name="ultEd" type="text" class="form-control"
                                                                           name="codigo"
                                                                           value="clebersantos em 17/04/2017 19:40"
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
                                                                    <button type="button" name="btnEditar"
                                                                            id="btnEditar"
                                                                            onclick="editar()" class="btn btn-primary">
                                                                        Editar
                                                                    </button>
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
