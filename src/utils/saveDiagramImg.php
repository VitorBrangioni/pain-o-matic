<?php

use src\controller\DiagramController;

require_once '../../vendor/autoload.php';

if (isset($_POST['imgBase64']) && isset($_POST['diagramId']) && isset($_POST['depth'])) {
	$diagramController = DiagramController::getInstance();
	$diagramController->saveDiagramImg($_POST['diagramId'], $_POST['depth'], $_POST['imgBase64']);
} else {
	// throw new \Exception("Falha ao salvar Diagrama");
	header("Location: Falhou");
}