<?php 

use src\controller\LoginController;

if (isset($_POST['logar'])) {

	try {
		LoginController::login();
	} catch (\Exception $ex) {
		$error = $ex->getMessage();
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>NonPain</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../view/tools/bootstrap-3/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="../tools/bootstrap-3/js/bootstrap.min.js"></script>
    <link href="../view/tools/css/login.css" rel="stylesheet">
</head>

<body>
<header>
<?php 
if (isset($error)) {
	echo '<div class="alert alert-danger alert-dismissable">';
	echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
	echo '<strong>Usuário e Senha incorretos!</strong> Caso tenha esquecido a senha, clique <a>aqui</a>.';
	echo '<div>';
}
?>
</header>
<form method="POST" action="">
    <div class="container flex-center align-middle">
        <div class="col-md-4">
            <h1 class="text-center">NonPain</h1>
            <input type="text" name="user" class="form-control" placeholder="login">
            <input type="password" name="password" class="form-control" placeholder="senha">
            <button type="submit" name="logar" class="btn btn-primary btn-block">Entrar</button>
        </div>
    </div>
</form>
</body>

</html>