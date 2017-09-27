<?php

use src\controller\NursingHistoricController;

require_once '../../vendor/autoload.php';
require_once '../../config/config.php';
include_once '../includes/head.html';

if (isset($_POST['cadastrar'])) {
    $controller = NursingHistoricController::getInstance();
    $controller->save($_GET['patientId']);
}

?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Historico</title>

        <link rel="stylesheet" href="../tools/bootstrap-3/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" href="../tools/css/nav.css">
        <link rel="stylesheet" href="../tools/css/global.css">
        <link rel="stylesheet" href="../tools/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script src="../tools/js/nav.js"></script>
        <script src="../tools/js/nursing-historic.js"></script>
    </head>

    <body>

        <nav>
            </nav>
        <header class="container-fluid">
            <h1>Historico de Enfermagem</h1>
        </header>

        <form method="post" action="">
            <section class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home">Identificalção</a></li>
                            <!-- <li><a href="#menu1">Menu 1</a></li>
                            <li><a href="#menu2">Menu 2</a></li>
                            <li><a href="#menu3">Menu 3</a></li> -->
                        </ul>
    
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <h2>Identificação</h2>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Clínica:</label>
                                        <input type="text" name="clinica" class="form-control">
                                    </div>
    
                                    <div class="col-md-4">
                                        <label for="">Número Protuário:</label>
                                        <input type="text" name="numProntuario" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Falar com:</label>
                                        <input type="text" name="falarCom" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Telefone:</label>
                                        <input type="text" name="tel" id="tel" class="form-control">
                                    </div>
    
                                    <div class="col-md-4">
                                        <label for="">Celular:</label>
                                        <input type="text" name="cel" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Nome:</label>
                                        <input type="text" name="nome" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Idade:</label>
                                        <input type="number" name="idade" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Cor:</label>
                                        <select class="form-control" name="cor" id="sel1">
                                            <option value="M">Branco</option>
                                            <option value="F">Negro</option>
                                            <option value="F">Pardo</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Sexo:</label>
                                        <select class="form-control" name="sexo" id="sel1">
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Profissão/Ocupação:</label>
                                        <input type="text" name="profOcup" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Renda Familiar/mês:</label>
                                        <input type="text" name="rendaFam" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Nacionalidade:</label>
                                        <input type="text" name="nacionalidade" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Naturalidade:</label>
                                        <input type="text" name="naturalidade" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <h3>Menu 1</h3>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.
                                </p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>Menu 2</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                    totam rem aperiam.</p>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <h3>Menu 3</h3>
                                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                        
                        <input type="submit" name="cadastrar" class="btn btn-success margin-top-20" value="Salvar">
                    </div>
    
                </div>
    
    
            </section>
        </form>

    </body>

    </html>