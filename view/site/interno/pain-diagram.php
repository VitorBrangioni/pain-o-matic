<?php
include_once '../global-includes/head.html';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style.css">
</head>

<body onload="zerinho()">
<div class="container">
    <div class="row">
        <div class="col-xs-2 text-center margin-top-20">
            <button type="button" onclick="location.href='appointment-visualization.php';"
                    class="btn btn-primary btn-back">Voltar
            </button>
        </div>
        <div class="col-xs-4 col-xs-offset-2 text-center">
            <h2>Editar Modelo</h2>
        </div>
        <div class="col-xs-3 col-xs-offset-1 text-center">
            <button type="button" onclick="Clear()" class="btn btn-block btn-danger">Limpar</button>
            <a type="button" download="diagrama.png" onclick="Save(this)" class="btn btn-block btn-success">Salvar</a>
        </div>
    </div>
</div>
<canvas class="col-md-12 img-responsive" id="canvas1"></canvas>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-group-justified color-pallet" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="button" onclick="strokeCOLOR(this); strokeWIDTHVal(10)" id="btn-grey"
                            style="background:black"
                            class="strokeColor btn btn-default glyphicon glyphicon-pencil"></button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" onclick="strokeCOLOR(this); strokeWIDTHVal(10)" id="btn"
                            style="background:red"
                            class="strokeColor btn btn-default glyphicon glyphicon-pencil"></button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" onclick="strokeCOLOR(this); strokeWIDTHVal(10)" id="btn"
                            style="background:orange"
                            class="strokeColor btn btn-default glyphicon glyphicon-pencil"></button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" onclick="strokeCOLOR(this); strokeWIDTHVal(10)" id="btn"
                            style="background:yellow"
                            class="strokeColor btn btn-default glyphicon glyphicon-pencil"></button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" onclick="strokeCOLOR(this); strokeWIDTHVal(25)" id="btn"
                            style="background:white"
                            class="strokeColor btn btn-default glyphicon glyphicon-pencil"></button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="index.js"></script>
</body>
</html>
