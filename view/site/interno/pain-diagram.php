<?php
    include_once '../global-includes/head.html';
?>
<!DOCTYPE html>
<html>

<body>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-2 text-center margin-top-20">
                      <button type="button" class="btn btn-primary btn-back">Voltar</button>
                 </div>
                 <div class="col-xs-4 col-xs-offset-2 text-center">
                      <h2>Editar Modelo</h2>
                 </div>
                 <div class="col-xs-3 col-xs-offset-1 text-center">
                      <button type="button" class="btn btn-block btn-danger">Cancelar</button>
                      <button type="button" class="btn btn-block btn-success">Salvar</button>
                 </div>
            </div>
        </div>
    </header>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img class="img-responsive center-block" src="../../images/human-vinci.png" alt="vinci">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary btn-lg glyphicon glyphicon-share-alt"></button>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group btn-group-justified color-pallet" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                            <button type="button" id="btn-black" class="btn btn-default glyphicon glyphicon-pencil"></button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="btn-red" class="btn btn-default glyphicon glyphicon-pencil"></button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="btn-orange" class="btn btn-default glyphicon glyphicon-pencil"></button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="btn-yellow" class="btn btn-default glyphicon glyphicon-pencil"></button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="btn-grey" class="btn btn-default glyphicon glyphicon-pencil"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>