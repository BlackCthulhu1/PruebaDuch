<?php require_once 'config.php'; ?>
<?php
if (!empty($_POST)) {
	try {
		$user_obj = new Cl_User();
		$data = $user_obj->registration($_POST);
		if ($data) $success = USER_REGISTRATION_SUCCESS;
	} catch (Exception $e) {
		$error = $e->getMessage();
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="muni">
	<title>Página de registro</title>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/nav_principal.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<header>
		<nav>
			<div class="appleNav">
				<ul>
					<li>
						<a href="index.php"><img src="img/iconoFuente.ico" height="20"></a>
					</li>
					<li><a href="ropa.php">Ropa</a></li>
					<li><a href="accesorios.php">Accesorios</a></li>
					<li><a href="cuadros.php">Cuadros</a></li>


					<?php if ($_SESSION['logged_in']) { ?>
						<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">
								Hola,
								<?php echo $_SESSION['name']; ?>
							</a>
							<ul role="menu" class="dropdown-menu">
								<li> <a href="account.php">Mi cuenta</a> </li>
								<li class="divider"></li>
								<li> <a href="logout.php">Salir</a> </li>
							</ul>

						</li>
					<?php } else { ?>
						<li><a href="login.php">Inicia sesion</a></li>
					<?php } ?>
					<li>
					<div class="dropdown">
				<button class="btn btn-link " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<img src="img/image_large.svg" height="45">
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="VerCarta.php">Ver carrito</a>
					<a class="dropdown-item" href="Pagos.php">Pagos</a>
				</div>
					</li>

				</ul>
			</div>
		</nav>
	</header>
	<div class="container">

		<div class="login-form">
			<?php require_once 'templates/message.php'; ?>
		   
			 

			<div class="form-header">
			<img src="img/iconoFuente.png" height="90">
			</div>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" role="form" id="register-form">
				<div>
					<input name="name" id="name" type="text" class="form-control" placeholder="Nombres">
					<span class="help-block"></span>
				</div>
				<div>
					<input name="email" id="email" type="email" class="form-control" placeholder="Correo electrónico">
					<span class="help-block"></span>
				</div>
				<div>
					<input name="password" id="password" type="password" class="form-control" placeholder="Contraseña">
					<span class="help-block"></span>
				</div>
				<div>
					<input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Confirmar Contraseña">
					<span class="help-block"></span>
				</div>
				<button class="btn btn-block bt-login" type="submit" id="submit_btn" data-loading-text="Registrando....">Registrarse</button>
			</form>
			<div class="form-footer">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
					<img src="img/padlock-16.ico" alt="lock">
						<a href="forget_password.php"> Olvidó su contraseña? </a>

					</div>

					<div class="col-xs-6 col-sm-6 col-md-6">
					<img src="img/iconoFuente.png" height="25">
						<a href="login.php"> Iniciar sesión </a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /container -->


	<script src="js/jquery.validate.min.js"></script>
	<script src="js/register.js"></script>
	<!-- Footer -->
	<br>
	<br>
	<br>
	<footer>
		<div class="container-fluid">
			<p class="text-center">&copy; Copyright by <a href="https://es.wikipedia.org/wiki/Marcel_Duchamp" target="_blank">Duchamp</a> <?php echo date("Y") ?></p>
		</div>
	</footer>
	<!-- /Footer -->
</body>

</html>
<?php ob_end_flush(); ?>
