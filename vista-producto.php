<?php
include('Cl/funciones.php'); ?>

<?php
if (isset($_GET["id"])) {
  $oferta_id = $_GET["id"];
  if (isset($ofertas[$oferta_id])) {

    $oferta = $ofertas[$oferta_id];
  }
} else {
  header("Location: index.php");
  exit();
}
 require_once 'templates/header.php'; ?>
<!-- /Vista -->
<div>
<?php echo vista_producto($oferta_id); ?>
</div>
<!-- /Vista -->
<?php require_once 'templates/footer.php';?>