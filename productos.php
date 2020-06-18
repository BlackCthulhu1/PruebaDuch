<?php
$titulo='Inventario';
include('Cl/funciones.php'); ?>
<?php require_once 'templates/header.php'; ?>
<br>
<div class="content">
    <h1 style="text-align: center">INVENTARIO</h1>
    <button type="button" class="btn btn-warning" style="margin-left: 900px; margin-bottom: 10px">Agregar producto</button>
    <button type="button" class="btn btn-danger" style="margin-bottom: 10px">Borrar producto</button>
    <div class="container">
        <div class="table-responsive table-dark">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Existencia</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Seleccionar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo inventario();?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->
    <?php require_once 'templates/footer.php'; ?>