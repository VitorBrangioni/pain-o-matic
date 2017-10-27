<?php

require_once '../../vendor/autoload.php';

/* echo "batatao";

if (isset($_POST['imgBase64']) && isset($_POST['diagramId'])) {
	$diagramController = DiagramController::getInstance();
	$diagramController->saveDiagramImg($_POST['diagramId'], $_POST['imgBase64']);
} else {
	// throw new \Exception("Falha ao salvar Diagrama");
	header("Location: Falhou");
}
 */
header('HTTP/1.1 302 Redirect');
header('Location: google.com.br'. $_POST['data']);

echo "test";