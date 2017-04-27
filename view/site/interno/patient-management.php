<?php 

require_once '../../../vendor/autoload.php';

use src\controller\PatientController;

	$controller = PatientController::getInstance();
if (isset($_POST['register'])) {
	$controller->register($_POST['name'], $_POST['cpf'], $_POST['rg'], null);
}

?>

	<html>
	<head>
	<title>Pain O' Meter</title>
	<meta charset="UTF-8">

    <link rel="stylesheet" href="style.css">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>



	</head>

	<body>
	 <div class="container-fluid">
	 <div class="row">
     <div class="col-md-12">
          
     <div class="input-group-btn">
	     <button type="button_add" class="btn btn-danger" data-toggle="#" data-target="#">Sair</button>
	 </div>
          
     <div class="input-group-btn">
	     <button type="button_add" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal2">Adicionar Paciente</button>
	 </div>
    
     <legend><h2><strong>Pacientes</strong></h2></legend>
          
     <ul class = "nav">
     
     <?php 
     foreach ($controller->listAll() as $data) {
     	echo '<li><a href="visualiza-paciente.html">'.$data['name'].'</a></li>';
     }
     ?>
     </ul>
  
	 <!-- Modal -->
     <div class="container-fluid">
	 <div class="row">
     <div class="col-md-12">
	 <div class="modal fade" id="myModal2" role="dialog">
	 <div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Adicionar Paciente</h4>
		</div>
       <div class="container-fluid">
	   <div class="row">
	   <div class="modal-body">
         <input type="file" capture="camera" accept="image/*" id="cameraInput" name="cameraInput" class = "hidden">
         <label for="cameraInput" class="center-block"><img class="smaller-image border center-block" alt="" src="http://bit.ly/2nLlcLG"></label>
         <form id="form1" name="form1" method="post" action="">
         <div class="col-md-6">  
	     <fieldset>  
	     <div class="form-group">
	         <label>Nome completo:</label>
	         <input type="text" name="name" class="form-control" autofocus required>
	     </div>
         <div class="form-group">
	         <label>Identificador:</label>
	         <input type="text" name="id" class="form-control"  autofocus>
	     </div>
         <div class="form-group">
             <label>RG:</label>
             <input type="text" name="rg" class="form-control" autofocus required>
         </div>

         </fieldset>
         </div>

         <div class="col-md-6">  
	     <fieldset>  
         <div class="form-group">
	         <label>CPF:</label>
	          <input type="number" name="cpf" class="form-control" data-mask="999.999.999-99" placeholder="000.000.000-00"
              autofocus required>
	     </div>
        <div class="form-group">
             <label>�ltima edi��o:</label>
             <ul class = "nav">
             <li class="li-modal">23 Mar�o 2017 - 13:59:45</li>
         </ul>
         </div>
         </fieldset>
         </div>
       <div class="container-fluid">
       <div class="row">
        <div class="text-center">
              <button type="submit" name="register" class="btn btn-primary ">Cadastrar</button>
             <button type="reset" name="button2" id="button2" class="btn btn-danger">Limpar</button>
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
	 
	</div>
	</div>
    </div>

	</body>
	</html>
