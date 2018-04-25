<?php

require_once '../../vendor/autoload.php';
require_once '../../config/scope.php';

use src\controller\AppointmentController;

$step1 = 'come-back';
$step2 = 'active';

$controller = AppointmentController::getInstance();

if (isset($_POST['save'])) {
    $controller->save($_POST['patientId']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/head.html'; ?>
</head>
<body>
<nav>
    <?php include '../includes/nav.html'; ?>
</nav>
    <form action="" method="post">
        <input type="hidden" name="patientId" value="<?= $scope['patientId'] ?>">
        <div class="container">
            <div class="row">
                <section>
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist" hidden>

                                <li role="presentation" class="active">
                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                        <span class="round-tab">
                                            <i class="glyphicon glyphicon-folder-open"></i>
                                        </span>
                                    </a>
                                </li>

                                <li role="presentation" class="disabled">
                                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                        <span class="round-tab">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </span>
                                    </a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                        <span class="round-tab">
                                            <i class="glyphicon glyphicon-picture"></i>
                                        </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>

                        <h2>NOVA CONSULTA</h2>
                        <form role="form">
                            <div class="tab-content">
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <div class="step33" id="g1">
                                        <h3>Necessidade Psicobiológicas e Exame Físico Admissional</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Tem dificuldades para dormir?</label>
                                                   
                                                <?php if (!isset($scope['g1-q1'])): ?>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g1-q1" id="inlineRadio2" value="Sim"> Sim
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g1-q1" id="inlineRadio3" value="Não"> Não
                                                    </label>
                                                <?php else:?>
                                                    <?= $scope['g1-q1'] ?>
                                                <?php endif ?>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Identifique:</label>
                                                
                                                <?php if (!isset($scope['g1-q2'])): ?>
                                                
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g1-q2" value="Insônia"> Insônia
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g1-q2" value="Pesadelo"> Pesadelo
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g1-q2" value="Inverte dia com a noite"> Inverte dia com a noite
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g1-q2" value="Sono irregular"> Sono irregular
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g1-q2" value="Outros"> Outros
                                                        <input type="text" name="g1-q2-sr1" value="" placeholder="cite">
                                                    </label>

                                                <?php else: ?>
                                                    <?= $scope['g1-q2'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>A dor prejudica seu sono?</label>
                                                <?php if (!isset($scope['g1-q3'])):?>
                                                    <input type="text" name="g1-q3" class="form-control">
                                                <?php else:?>
                                                    <?= $scope['g1-q3'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step23">
                                        <div class="step_21">
                                            <h3>Necessidades de Cuidado Corporal</h3>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Higienização Corporal:</label>

                                                    <?php if (!isset($scope['g2-q1'])): ?>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g2-q1" value="Adequeda"> Adequeda
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g2-q1" value="Inadequeda"> Inadequeda
                                                            <input type="text" name="g2-q1-sr1" value="">
                                                        </label>
                                                    <?php else: ?>
                                                        <?= $scope['g2-q1'] ?>
                                                        Descrição: <?= $scope['g2-q1-sr1'] ?>
                                                    <?php endif ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="exampleInputEmail1">Déficit no auto cuidado corporal:</label>

                                                    <?php if (!isset($scope['g2-q2'])): ?>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g2-q2" value="Não"> Não
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g2-q2" value="Parcialmente Dependente"> Parcialmente Dependente
                                                            <input type="text" name="g2-q2-sr1" value="" placeholder="Descreva">
                                                        </label>
                                                    <?php else: ?>
                                                        <?= $scope['g2-q2'] ?>
                                                        Descricao: <?= $scope['g2-q2-sr1'] ?>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step-22">
                                        </div>
                                    </div>
                                    <div class="step33" id="g3">
                                        <h3>
                                            Dados Antropométricos e Necessidades de Nutrição/Hidratação Regulação Endocrinológica
                                        </h3>
                                        <hr>
                                        <div class="row mar_ned"></div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Peso Usual / Atual (KG)</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <div class="row">
                                                    <div class="col-md-4 col-xs-4 wdth">
                                                        <?php if (!isset($scope['g3-q1'])):?>
                                                            <input type="text" name="g3-q1" placeholder="Peso Usual">
                                                        <?php else: ?>
                                                            <?= $scope['g3-q1']; ?>
                                                        <?php endif ?>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="">/</label>
                                                    </div>
                                                    <div class="col-md-4 col-xs-4 wdth">
                                                        <?php if (!isset($scope['g3-q2'])):?>
                                                            <input type="text" name="g3-q2" placeholder="Peso Atual">
                                                        <?php else: ?>
                                                            <?= $scope['g3-q2']; ?>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Altura (m):</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <?php if (!isset($scope['g3-q3'])):?>
                                                    <input type="number" name="g3-q3">
                                                <?php else: ?>
                                                    <?= $scope['g3-q3']; ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>C.A (m):</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <?php if (!isset($scope['g3-q4'])):?>
                                                    <input type="number" name="g3-q4">
                                                <?php else: ?>
                                                    <?= $scope['g3-q4']; ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>IMC (Kg/m²):</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <?php if (!isset($scope['g3-q5'])):?>
                                                    <input type="number" name="g3-q5">
                                                <?php else: ?>
                                                    <?= $scope['g3-q5']; ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Tipo de Peso:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9 ">
                                                <?php if (!isset($scope['g3-q6'])):?>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g3-q6" value="Baixo Peso"> Baixo Peso
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g3-q6" value="Peso Normal"> Peso Normal
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g3-q6" value="Sobrepeso"> Sobrepeso
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g3-q6" value="Obeso"> Obeso
                                                    </label>
                                                <?php else: ?>
                                                    <?= $scope['g3-q6']; ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Relato de Alteração de Glicemia:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <?php if (!isset($scope['g3-q7'])):?>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g3-q7" value="Não"> Não
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g3-q7" value="Sim"> Sim 
                                                    </label>
                                                <?php else: ?>
                                                    <?= $scope['g3-q7']; ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Preferência Alimentar:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <?php if (!isset($scope['g3-q8'])):?>
                                                    <input type="text" name="g3-q8">
                                                <?php else: ?>
                                                    <?= $scope['g3-q8']; ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Apetite:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <?php if (!isset($scope['g3-q9'])):?>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g3-q9" value="Preservado"> Preservado
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g3-q9" value="Diminuído"> Diminuído
                                                    </label>
                                                    <input type="text" name=g3-q9-sr1 placeholder="Motivo">
                                                <?php else: ?>
                                                    <?= $scope['g3-q9']; ?>
                                                    <label>Motivo: </label>:<?= $scope['g3-q9-sr1']; ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Ingestão Hídrica Habitual:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <?php if (!isset($scope['g3-q10'])):?>
                                                    <input type="text" name="g3-q10">
                                                <?php else: ?>
                                                    <?= $scope['g3-q10']; ?>
                                                <?php endif ?>
                                            </div>
                                        </div>

                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Tipo de Alimentos Mais consumidos:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-4">
                                                <?php if (!isset($scope['g3-q11'])):?>
                                                    <input type="text" name="g3-q11" id="">
                                                    <label for="">Via:</label>
                                                    <input type="text" name="g3-q11-sr1" id="">
                                                <?php else: ?>
                                                    <?= $scope['g3-q11']; ?>
                                                    <strong>Via:</strong> <?= $scope['g3-q11-sr1']; ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Sente:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <?php if (!isset($scope['g3-q12'])):?>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g3-q12" value="Naúsea"> Naúsea
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g3-q12" value="Vômito"> Vômito
                                                        <input type="text" name="g3-q12-sr1" placeholder="">
                                                    </label>
                                                    <label class="radio-inline">
                                                        Episodios/
                                                        <input type="text" name="g3-q12-sr2">
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g3-q12" value="Outras"> Outras
                                                    </label>
                                                <?php else: ?>
                                                    <?= $scope['g3-q12'] ?>. <?= $scope['g3-q12-sr1'] ?>
                                                    <strong>Episodios/</strong> <?= $scope['g3-q12-sr2'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Observacoes:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-4">
                                                <?php if (!isset($scope['g3-q13'])):?>
                                                    <input type="text" name="g3-q13">
                                                <?php else: ?>
                                                    <?= $scope['g3-q13'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-left">
                                        <li>
                                            <a href="#g4"class="btn btn-primary next-step">Próximo</a>
                                            <!-- <button type="button" href="#g4" class="btn btn-primary next-step">Próximo</button> -->
                                        </li>
                                    </ul>
                                </div>


                                <!-- STEP 5 -->
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <div class="step33" id="g4">
                                        <h3>
                                            Região Geniturinária/Necessidade de Sexualidade e Eliminação
                                        </h3>
                                        <hr>
                                        <div class="row mar_ned"></div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Comprometimentos na região geniturinária</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <div class="row">
                                                    <div class="col-md-4 col-xs-4 wdth">
                                                        <?php if (!isset($scope['g4-q1'])): ?>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q1" value="Não"> Não
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q1" value="Sim"> Sim
                                                            </label>
                                                        <?php else: ?>
                                                            <?= $scope['g4-q1'] ?>
                                                        <?php endif ?>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <label class="radio-inline">
                                                            <strong>Descreva:</strong>
                                                            <?php if (!isset($scope['g4-q1-sr1'])): ?>
                                                                <input type="text" name="g4-q1-sr1">
                                                            <?php else: ?>
                                                                <?= $scope['g4-q1-sr1'] ?>
                                                            <?php endif ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Dados de interesse clínico sobre a sexualidade:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <div class="row">
                                                    <div class="col-md-4 col-xs-4 wdth">
                                                        <?php if (!isset($scope['g4-q2'])): ?>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q2" value="Não"> Não
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q2" value="Sim"> Sim
                                                            </label>
                                                        <?php else: ?>
                                                            <?= $scope['g4-q2'] ?>
                                                        <?php endif ?>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <?php if (!isset($scope['g4-q2-sr1'])): ?>
                                                            <label class="radio-inline">
                                                                <strong>Descreva:</strong>
                                                                <input type="text" name="g4-q2-sr1">
                                                            </label>
                                                        <?php else: ?>
                                                            <?= $scope['g4-q2-sr1'] ?>
                                                        <?php endif ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Eliminação Urinária:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <div class="row">
                                                    <?php if (!isset($scope['g4-q3'])): ?>
                                                        <div class="col-md-4 col-xs-4 wdth">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q3" value="Espontânea"> Espontânea
                                                            </label>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 wdth">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q3" value="Estimulada"> Estimulada:
                                                            </label>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 wdth">
                                                            <label class="radio-inline">
                                                                <input type="text" name="g4-q3-sr1" placeholder="Descreva">
                                                            </label>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="col-md-4 col-xs-4 wdth">
                                                            <?= $scope['g4-q3'] ?> - <?= $scope['g4-q3-sr1'] ?>
                                                        </div>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Relato de:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <div class="row">
                                                    <?php if (!isset($scope['g4-q4'])): ?>
                                                        <div class="col-md-4 col-xs-4 wdth">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q4" value="Fluxo urinário adequado"> Fluxo urinário adequado
                                                            </label>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 wdth">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q4" value="Poliúria"> Poliúria
                                                            </label>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 wdth">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q4" value="Poliaciúria"> Poliaciúria
                                                            </label>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 wdth">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q4" value="Nictúria"> Nictúria
                                                            </label>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 wdth">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q4" value="Continência Urinária"> Continência Urinária
                                                            </label>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 wdth">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q4" value="Súria"> Súria
                                                            </label>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 wdth">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q4" value="Ogúria"> Ogúria
                                                            </label>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 wdth">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q4" value="Algúria"> Algúria
                                                            </label>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 wdth">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q4" value="Outros"> Outros:
                                                                <input type="text" name="g4-q4-sr1" placeholder="Descreva">
                                                            </label>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="col-md-4 col-xs-4 wdth">
                                                            <?= $scope['g4-q4'] ?>
                                                            <?= $scope['g4-q4-sr1'] ?>
                                                        </div>
                                                    <?php endif ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Hábito Intestinal:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <?php if (!isset($scope['g4-q5'])): ?>
                                                    <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="g4-q5" value="Regular"> Regular
                                                                    <input type="text" name="g4-q5-sr1">vezes/dia
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="g4-q5" value="Irregular"> Irregular
                                                                    <input type="text" name="g4-q5-sr2" placeholder="cite">
                                                                </label>
                                                            </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="g4-q5" value="Relato de Evacuação Ausente"> Relato de Evacuação Ausente
                                                                <input type="number" name="g4-q5-sr3" placeholder="Quantos dias">
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <?= $scope['g4-q5'] ?>
                                                            <?= (isset($scope['g4-q5-sr1']) ? 'Vezes/dia: ' . $scope['g4-q5-sr1'] : null) ?>
                                                            <?= (isset($scope['g4-q5-sr2']) ? 'Cite: ' . $scope['g4-q5-sr2'] : null) ?>
                                                            <?= (isset($scope['g4-q5-sr3']) ? 'Quantos dias: ' . $scope['g4-q5-sr3'] : null) ?>
                                                        </div>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Outras Observações:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <div class="row">
                                                    <div class="col-md-4 col-xs-4 wdth">
                                                        <?php if (isset($scope['g4-q6'])): ?>
                                                            <label class="radio-inline">
                                                                <input type="text" name="g4-q6">
                                                            </label>
                                                        <?php else: ?>
                                                            <?= $scope['g4-q6'] ?>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step33" id="g5">
                                        <h3>
                                            Necessidades de Locomoção / Atividade Física e Exame dos Membros:
                                        </h3>
                                        <hr>
                                        <div class="row mar_ned"></div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Locomove-se de forma:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9 ">
                                                <?php if (!isset($scope['g5-q1'])): ?>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g5-q1" value="Independente"> Independente
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g5-q1" value="Dependente"> Dependente
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="text" name="g5-q1-sr1" placeholder="Observações">
                                                    </label>
                                                <?php else: ?>
                                                    <?= $scope['g5-q1'] ?>
                                                    <?= (isset($scope['g5-q1-sr1']) ? 'Observações: ' . $scope['g4-q5-sr1'] : null) ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Atividade Física:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9 ">
                                                <?php if (!isset($scope['g5-q2'])): ?>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g5-q2" value="Não realiza"> Não realiza
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g5-q2" value="Realiza"> Realiza
                                                    </label>
                                                <?php else: ?>
                                                    <?= $scope['g5-q2'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Cite:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9 ">
                                                <?php if (!isset($scope['g5-q2-sr1'])): ?>
                                                    <input type="text" name="g5-q2-sr1">
                                                <?php else: ?>
                                                    <?= $scope['g5-q2-sr1'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Necessidade de segurança física:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <?php if (!isset($scope['g5-q3'])): ?>
                                                    <textarea name="g5-q3" id="" cols="30" rows="10" placeholder="Descrever os dispositivos de assistência e tempo de uso">
                                                    </textarea>
                                                <?php else: ?>
                                                    <?= $scope['g5-q3'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Observações:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9 ">
                                                <?php if (!isset($scope['g5-q4'])): ?>
                                                    <input type="text" name="g5-q4">
                                                <?php else: ?>
                                                    <?= $scope['g5-q4'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Impressão do enfermeiro sobre o paciente:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9 ">
                                                <?php if (!isset($scope['g5-q5'])): ?>
                                                    <input type="text" name="g5-q5">
                                                <?php else: ?>
                                                    <?= $scope['g5-q5'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Enfermeiro/COREN:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9 ">
                                                <?php if (!isset($scope['g5-q6'])): ?>
                                                    <input type="text" name="g5-q6">
                                                <?php else: ?>
                                                    <?= $scope['g5-q6'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-left">
                                        <li>
                                            <button type="button" class="btn btn-default prev-step">Voltar</button>
                                        </li>
                                        <li>
                                            <a href="#g6" class="btn btn-primary next-step">Próximo</a>
                                            <!-- <button type="button" class="btn btn-primary next-step">Próximo</button> -->
                                        </li>
                                    </ul>
                                </div>
                                <!-- FIM STEP 5 -->
                                <!-- STEP 6 -->
                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <div class="step33" id="g6">
                                        <h3>
                                            Necessidades de Percepção dos Órgãos dos Sentidos:
                                        </h3>
                                        <hr>
                                        <div class="row mar_ned"></div>
                                        <div class="row mar_ned">
                                            <div class="col-md-12">
                                                <strong>Alterações:</strong>
                                                <?php if (!isset($scope['g6-q1'])): ?>
                                                    <input type="radio" name="g6-q1" value="Não"> Não
                                                    <input type="radio" name="g6-q1" value="Visual"> Visual
                                                    <input type="radio" name="g6-q1" value="Auditiva"> Auditiva
                                                    <input type="radio" name="g6-q1" value="Gustativa"> Gustativa
                                                    <input type="radio" name="g6-q1" value="Tátil"> Tátil
                                                    <input type="radio" name="g6-q1" value="Olfativa"> Olfativa
                                                <?php else: ?>
                                                    <?= $scope['g6-q1'] ?>
                                                <?php endif ?>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Descreva:</<strong>
                                                <?php if (!isset($scope['g6-q2'])): ?>
                                                    <textarea name="g6-q2" id="" cols="30" rows="5" placeholder="Descreva">
                                                    </textarea>
                                                <?php else: ?>
                                                    <?= $scope['g6-q2'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step33" id="g7">
                                        <h3>
                                            Necessidades de Regulação Térmica:
                                        </h3>
                                        <hr>
                                        <div class="row mar_ned"></div>
                                        <div class="row mar_ned">
                                            <div class="col-md-1">
                                                <p align="right">
                                                    <stong>Tax:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <?php if (!isset($scope['g7-q1'])): ?>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="g7-q1">
                                                            <div class="input-group-addon">°C</div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g7-q1'] ?> °C
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-1">
                                                <p align="right">
                                                    <stong>Observações:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-4text">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <?php if (!isset($scope['g7-q2'])): ?>
                                                            <textarea name="g7-q2" id="" cols="30" rows="10" class="form-control">
                                                            </textarea>
                                                        <?php else: ?>
                                                            <?= $scope['g7-q2'] ?>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step33" id="g8">
                                        <h3>
                                            Aparência:
                                        </h3>
                                        <hr>
                                        <div class="row mar_ned"></div>
                                        <div class="row mar_ned">
                                            <div class="col-md-1">
                                                <p align="right">
                                                    <stong>Aparência Geral:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <?php if (!isset($scope['g8-q1'])): ?>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g8-q1" value="Normocorado"> Normocorado
                                                    </label>
                                                    <label class="radio-inline">
                                                        <div class="row">
                                                            <input type="radio" name="g8-q1" value="Hipocorado"> Hipocorado
                                                            <div class="col-md-6 input-group">
                                                                <input type="text" name="g8-q1-sr1" class="form-control">
                                                                <div class="input-group-addon">+/+4</div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g8-q1" value="Hidratado"> Hidratado
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="g8-q1" value="Desidratado"> Desidratado
                                                    </label>
                                                <?php else: ?>
                                                    <?= $scope['g8-q1'] ?>
                                                    <?= (isset($scope['g8-q1-sr1']) ? $scope['g8-q1-sr1'] . '+/+4': null) ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-1">
                                                <p align="right">
                                                    <stong>Observações:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <?php if (!isset($scope['g8-q2'])): ?>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <textarea name="g8-q2" id="" cols="30" rows="10" class="form-control">
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g8-q2'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step33" id="g9">
                                        <h3>
                                            Necessidades de Oxigenação:
                                        </h3>
                                        <hr>
                                        <div class="row mar_ned"></div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Frequência respiratória:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <?php if (!isset($scope['g9-q1'])): ?>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" name="g9-q1" class="form-control">
                                                            <div class="input-group-addon">irpm</div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g9-q1'] ?> irpm
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Ausculta:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-10">
                                                <?php if (!isset($scope['g9-q2'])): ?>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g9-q2" value="MVF /s RA"> MVF /s RA
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g9-q2" value="MV &darr; à D"> MV &darr; à D
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g9-q2" value="MV &darr; à E"> MV &darr; à E
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g9-q2" value="Roncos"> Roncos
                                                        </label>
                                                        <input type="text" name="g9-q2-sr1">

                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g9-q2"> Sibilos
                                                        </label>
                                                        <input type="text" name="g9-q2-sr2">
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g9-q2'] ?>
                                                    <?= $scope['g9-q2-sr1'] ?? null ?>
                                                    <?= $scope['g9-q2-sr2'] ?? null ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Crepitações:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <?php if (!isset($scope['g9-q3'])): ?>
                                                    <input type="text" name="g9-q3" class="form-control">
                                                <?php else: ?>
                                                    <?= $scope['g9-q3'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Relato de:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-10">
                                                <?php if (!isset($scope['g9-q4'])): ?>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g9-q4" value="Padrão respiratório normal"> Padrão respiratório normal
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g9-q4" value="Dispnéia aos esforços"> Dispnéia aos esforços
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g9-q4" value="Dispinéia em repouso"> Dispinéia em repouso
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g9-q4" value="Ortopnéia"> Ortopnéia
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g9-q4" value="Dispnéia peroxística noturna"> Dispnéia peroxística noturna
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g9-q4" value="Outros"> Outros
                                                            <input type="text" name="g9-q4-sr1" placeholder="cite">
                                                        </label>
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g9-q4'] ?>
                                                    <?= (isset($scope['g9-q4-sr1']) ? '<strong>Cite: </strong>'. $scope['g9-q4-sr1']: null) ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step33" id="g10">
                                        <h3>
                                            Necessidades de Regulação Vascular:
                                        </h3>
                                        <hr>
                                        <div class="row mar_ned"></div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Frequência Cardíaca:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <?php if (!isset($scope['g10-q1'])): ?>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="exampleInputAmount">
                                                            <div class="input-group-addon">bpm</div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g10-q1'] ?> bpm
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Pressão Arterial Sistêmica:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <?php if (!isset($scope['g10-q2-sr1']) && !isset($scope['g10-q2-sr2'])): ?>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="g10-q2-sr1">
                                                            <div class="input-group-addon">X</div>
                                                            <input type="text" class="form-control" name="g10-q2-sr2">
                                                            <div class="input-group-addon">mmHg</div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g10-q2-sr1'] ?> X <?= $scope['g10-q2-sr2'] ?> mmHg
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Pulso:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-10">
                                                <?php if (!isset($scope['g10-q3'])): ?>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g10-q3" value="Cheio"> Cheio
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g10-q3" value="Filiforme"> Filiforme
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g10-q3" value="Rítmico"> Rítmico
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g10-q3" value="Arrítmico"> Arrítmico
                                                        </label>
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g10-q3'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Ausculta:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-10">
                                                <?php if (!isset($scope['g10-q4'])): ?>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g10-q4" value="BNRNF"> BNRNF
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g10-q4" value="B3+"> B3+
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g10-q4" value="B4+"> B4+
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g10-q4" value="Desdobramentos de segunda bulha"> Desdobramentos de segunda bulha
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="g10-q4" value="Sopros"> Sopros:
                                                        </label>
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g10-q4'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Local:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <?php if (!isset($scope['g10-q5'])): ?>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="g10-q5">
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g10-q5'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Tipo:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <?php if (!isset($scope['g10-q6'])): ?>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="g10-q6">
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g10-q6'] ?>
                                                <?php endif ?>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Grau:</label>
                                                <?php if (!isset($scope['g10-q7'])): ?>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="g10-q7">
                                                            <div class="input-group-addon">/+4</div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g10-q7'] ?> /+4
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step33" id="g11">
                                        <h3>
                                            Exame do Abdome:
                                        </h3>
                                        <hr>
                                        <div class="row mar_ned"></div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Normotenso:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-10">
                                                <?php if (!isset($scope['g11-q1'])): ?>
                                                    <div class="col-md-2">
                                                        <input type="radio" name="g11-q1" value="Tenso"> Tenso
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="radio" name="g11-q1" value="Globoso"> Globoso
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="radio" name="g11-q1" value="Distendido"> Distendido
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="radio" name="g11-q1" value="Ascítico"> Ascítico
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="radio" name="g11-q1" value="Outros"> Outros
                                                        <input type="text" name="g11-q1-sr1" placeholder="Descreva">
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g11-q1'] ?>
                                                    <strong>Descrição: </strong>
                                                    <?= isset($scope['g11-q1']) ? 'Descrição'.$scope['g11-q1-sr1']: null?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Ruídos Hidroaéreos:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-10">
                                                <?php if (!isset($scope['g11-q2'])): ?>
                                                    <div class="col-md-2">
                                                        <input type="radio" name="g11-q2" value="Presentes"> Presentes
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="radio" name="g11-q2" value="Dimuídos"> Dimuídos
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="radio" name="g11-q2" value="Hiperativos"> Hiperativos
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g11-q2'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Timpanismo:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-10">
                                                <?php if (!isset($scope['g11-q3'])): ?>
                                                    <div class="col-md-2">
                                                        <input type="radio" name="g11-q3"> Presente
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="radio" name="g11-q3"> Visceromegalias:
                                                        <input type="text" name="g11-q3-sr1" placeholder="Local">
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g11-q3'] ?>
                                                    <?= isset($scope['g11-q1']) ? 'Local'.$scope['g11-q1-sr1']: null?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step33" id="g12">
                                        <h3>
                                            Necessidade de Integridade cutâneo/Mucosa:
                                        </h3>
                                        <hr>
                                        <div class="row mar_ned"></div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Tipo:</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-10">
                                                <?php if (!isset($scope['g12-q1'])): ?>
                                                    <div class="col-md-2">
                                                        <input type="radio" name="g12-q1" value="Preservada"> Preservada
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="radio" name="g12-q1" value="Comprometida"> Comprometida
                                                    </div>
                                                <?php else: ?>
                                                    <?= $scope['g12-q1'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step33" id="g13">
                                        <h3>
                                            Lesão:
                                        </h3>
                                        <hr>
                                        <div class="row mar_ned"></div>
                                        <div class="row mar_ned">
                                            <div class="col-md-2">
                                                <p align="right">
                                                    <stong>Descreva Local e carateristicas da(s) lesão (ões):</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-10">
                                                <?php if (!isset($scope['g13-q1'])): ?>
                                                    <textarea name="g13-q1" cols="30" rows="10" class="form-control" placeholder="Descrição"></textarea>
                                                <?php else: ?>
                                                    <?= $scope['g13-q1'] ?>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-left">
                                        <li>
                                            <button type="button" class="btn btn-default prev-step">Voltar</button>
                                        </li>
                                    </ul>

                                </div>
                                <ul class="list-inline pull-right">

                                    <?php if(isset($scope['create-mode'])): ?>
                                        <input type="submit" name="save" value="Salvar" class="btn btn-success">
                                    <?php else: ?>
                                    <a href="http://localhost/view/internal/appointment-visualization.php?patientId=<?= $_GET['patientId']?? null ?>&appointmentId=<?= $_GET['appointmentId']?? null ?>" class="btn btn-primary">Sair</a>
                                    <?php endif ?>
                                </ul>
                            </div>
                            <!-- FIM STEP 6 -->
                        </form>
                    </div>
                </section>
            </div>
        </div>

    </form>

</body>

</html>