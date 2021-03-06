<?php

require_once '../../vendor/autoload.php';
require_once '../../config/managementSession.php';
require_once '../../config/user-message.php';

use src\controller\PatientController;
use src\controller\UploadController;


$patientController = PatientController::getInstance();
$uploadController = UploadController::getInstance();
$_SESSION['patientId'] = null;
$step1 = 'active';
$step2 = 'disabled';
$step3 = 'disabled';
$step4 = 'disabled';



if (isset($_POST['test'])) {
    # code...
    echo "CRRRIOU";

    header("Location: Falhou/".$_POST['test']);
    
}


if (isset($_POST['submit'])) {
    $pathPhoto = null;

    if (file_exists($_FILES['cameraInput']['tmp_name']) || is_uploaded_file($_FILES['cameraInput']['tmp_name'])) {
        $uploadController = UploadController::getInstance();
    	$pathPhoto = $uploadController->uploadProfileImage($_FILES['cameraInput']['name'], $_FILES['cameraInput']['tmp_name'], $_POST['name']);
    }

    $patientController->register($_POST['name'], $_POST['cpf'], $_POST['rg'], $pathPhoto);
}

?>

<html>
<head>
    <?php include '../includes/head.html'; ?>
</head>

<body>

<nav>
    <?php include '../includes/nav.html'; ?>
</nav>
<?php include '../includes/user-message.html'; ?>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <h3>Ola, <?php echo $_SESSION['doctorName'] ?></h3>
            </div>
            <div class="col-md-2 col-md-push-8">
                <a type="button_add" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">
                Adicionar Paciente
                </a>
            </div>
        </div>
    </div>
</header>

<form action="" method="post">
<div class="col-md-4">
        <input type="text" name="patient-name" id="patient-name" class="form-control">
    </div>
</form>

<form method="POST" action="patient-management.php" enctype="multipart/form-data">

   

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <legend><h2><strong>Pacientes</strong></h2></legend>

            <div class="list-group">
                <?php
                
                $filePath = "../../tools/js/test.php";
                
                if (isset($_POST['patient-name'])) {
                    foreach ($patientController->findByName($_POST['patient-name']) as $data) {
                        echo '<a onClick="utilsPatientAjax('.$data['id'].')" href="patient-visualization.php?patientId='.$data['id']. '" class="list-group-item list-group-item-action">' . $data['name'] . '</a>';
                    }
                } else {
                    foreach ($patientController->listAll() as $data) {
                         echo '<a onClick="utilsPatientAjax('.$data['id'].')" href="patient-visualization.php?patientId='.$data['id']. '" class="list-group-item list-group-item-action">' . $data['name'] . '</a>';
                    }
                }
                


                ?>
            </div>

            <!-- Modal -->
            

        </div>
    </div>
</div>

<!-- Inicio Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Adicionar Paciente</h4>
                        </div>
                        <div class="modal-body">
                            <input type="file" capture="camera" accept="image/*" id="cameraInput" name="cameraInput" class="hidden"> 
                            <label for="cameraInput" class="center-block">
                                <img class="smaller-image border center-block" alt="" src="../images/patient-profile/superman-profile.png">
                            </label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nome" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" pattern="\d*" name="cpf" class="form-control" placeholder="CPF" maxlength="11" required>
                                </div>
                                <div class="col-md-6">
                                    <!-- <input type="number" name="rg" class="form-control" placeholder="RG" required> -->
                                    <input type="text" name="rg" class="form-control" placeholder="RG" maxlength="16" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-success">Adicionar</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Fim Modal -->
            </form>

</body>
</html>
