<?php
include('Cl/funciones.php');
$titulo='Cuadros';?>
<?php require_once 'templates/header.php'; ?>
<br>
<div> <img class="d-block w-100" src="img/Banner1.jpg"></div>
<div class="content">
	<div class="container">
	<?php echo cuadros(); ?>
	</div>
</div> <!-- /container -->
<?php require_once 'templates/footer.php'; ?>