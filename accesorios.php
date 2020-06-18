<?php
include('Cl/funciones.php'); 
$titulo='Acessorios';?>
<?php require_once 'templates/header.php'; ?>
<br>
<div> <img class="d-block w-100" src="img/Banner4.jpg"></div>
<div class="content">
	<div class="container">
	<?php echo accesorios(); ?>
	</div>
</div> <!-- /container -->
<?php require_once 'templates/footer.php'; ?>