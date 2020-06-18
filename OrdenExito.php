<?php
if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="muni">
	<title>Orden</title>
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
						<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" data-display="static" aria-haspopup="true" aria-expanded="false">
								Hola,
								<?php echo $_SESSION['name']; ?>
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="account.php">Mi cuenta</a>
								<?php if ($_SESSION['tipo_empleado']=='administrador') { ?>
								<a class="dropdown-item" href="">Ver pedidos</a> </li>
								<a class="dropdown-item" href="productos.php">Inventario</a> 
								<?php } else{ ?>
									<a class="dropdown-item" href="">Mis pedidos</a> 
									<?php } ?>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item"href="logout.php">Salir</a>
								</div>
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
<div class="panel panel-default">
<div class="panel-heading"> 

</div>

<div class="panel-body">

    <h1>Estado de su Orden</h1>
    <p>Su pedido ha sido enviado exitosamente. La ID del pedido es # <?php echo $_GET['id']; ?></p>
           </div>
 </div><!--Panek cierra-->
</div>
<!-- Footer -->
<footer>
    	<div class="container-fluid">
		<p class="text-center">&copy; Copyright by <a href="https://es.wikipedia.org/wiki/Marcel_Duchamp" target="_blank">Duchamp</a> <?php echo date("Y") ?></p>
    	</div>
    </footer>
    <!-- /Footer -->
</body>
</html>