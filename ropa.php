<?php
include('Cl/funciones.php'); 
$titulo='Ropa';   ?>
<?php require_once 'templates/header.php'; ?>
<br>
<div> <img class="d-block w-100" src="img/Banner2.jpg"></div>
<div class="content">
	<div class="container">
    <?php echo ropa(); ?>
	</div>
</div> <!-- /container -->
<?php require_once 'templates/footer.php'; ?>