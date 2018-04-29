<?php

use src\controller\NursingHistoricController;

require_once '../../vendor/autoload.php';
require_once '../../config/managementSession.php';
include_once '../includes/head.html';

$controller = NursingHistoricController::getInstance();
if (isset($_POST['cadastrar'])) {
    $controller->save($_GET['patientId']);
}

$nursHistoric = $controller->getNursingHistoric($_GET['patientId']);

?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <?php include '../includes/head.html'; ?>
        <script src="../tools/js/nursing-historic.js"></script>
    </head>

    <body>

        <nav>
            <?php include '../includes/nav.html'; ?>
        </nav>
        <header class="container-fluid">
            <h1>Historico de Enfermagem</h1>
        </header>

        <form method="post" action="">
            <section class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home">Identificação</a></li>
                            <li><a href="#queixa-principal">Queixa Principal</a></li>
                        </ul>
    
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <h2>Identificação</h2>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Clínica:</label>
                                        <input type="text" name="clinica" class="form-control" value="<?= $controller->getFieldValue($nursHistoric, 'identificacao', 'clinica'); ?>">
                                    </div>
    
                                    <div class="col-md-4">
                                        <label for="">Número Protuário:</label>
                                        <input type="text" name="numProntuario" class="form-control" value="<?= $controller->getFieldValue($nursHistoric, 'identificacao', 'numProntuario'); ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Falar com:</label>
                                        <input type="text" name="falarCom" class="form-control" value="<?= $controller->getFieldValue($nursHistoric, 'identificacao', 'falarCom'); ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Telefone:</label>
                                        <input type="text" name="tel" id="tel" class="form-control" value="<?= $controller->getFieldValue($nursHistoric, 'identificacao', 'tel'); ?>">
                                    </div>
    
                                    <div class="col-md-4">
                                        <label for="">Celular:</label>
                                        <input type="text" name="cel" class="form-control" value="<?= $controller->getFieldValue($nursHistoric, 'identificacao', 'cel'); ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="">Idade:</label>
                                        <input type="number" name="idade" class="form-control" value="<?= $controller->getFieldValue($nursHistoric, 'identificacao', 'idade'); ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Cor:</label>
                                        <select class="form-control" name="cor" id="sel1">
                                            <option value="M">Branco</option>
                                            <option value="F">Negro</option>
                                            <option value="F">Pardo</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Sexo:</label>
                                        <select class="form-control" name="sexo" id="sel1">
                                            <option value="M">M</option>
                                            <option value="F">F</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Profissão/Ocupação:</label>
                                        <input type="text" name="profOcup" class="form-control" value="<?= $controller->getFieldValue($nursHistoric, 'identificacao', 'profOcup'); ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Renda Familiar/mês:</label>
                                        <input type="text" name="rendaFam" class="form-control" value="<?= $controller->getFieldValue($nursHistoric, 'identificacao', 'rendaFam'); ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Nacionalidade:</label>
                                        <input type="text" name="nacionalidade" class="form-control" value="<?= $controller->getFieldValue($nursHistoric, 'identificacao', 'nacionalidade'); ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Naturalidade:</label>
                                        <input type="text" name="naturalidade" class="form-control" value="<?= $controller->getFieldValue($nursHistoric, 'identificacao', 'naturalidade'); ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <label for="">Estado Civil:</label>
                                        <select class="form-control" name="estado-civil" id="estado-civil">
                                            <option value="solteiro">Solteiro</option>
                                            <option value="casado">Casado</option>
                                            <option value="uniao-estavel">Uniao Estavel</option>
                                            <option value="divorciado">Divorciado</option>
                                            <option value="viuvo">Viuvo</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Escolaridade:</label>
                                        <select class="form-control" name="escolaridade" id="escolaridade">
                                            <option value="fundamental-incompleto">Fundamental Incompleto</option>
                                            <option value="fundamental-completo">Fundamental Completo</option>
                                            <option value="medio-completo">Medio Completo</option>
                                            <option value="medio-incompleto">Medio Incompleto</option>
                                            <option value="viuvo">Viuvo</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div id="queixa-principal" class="tab-pane fade">
                                <h3>Queixa Principal:</h3>
                                <textarea name="queixa-principal" id="queixa-principal" cols="235" rows="25" class="control-form">
                                    <?= $controller->getFieldValue($nursHistoric, 'queixa-principal', 'queixa-principal'); ?>"
                                </textarea>
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
                        
                        <div class="row">
                            <div class="col m12 form-group">
                                <input type="submit" name="cadastrar" class="btn btn-success margin-top-20" value="Salvar">
                                <a href="patient-visualization.php?patientId=<?= $_GET['patientId'] ?>" class="btn btn-default">Sair</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </body>
</html>