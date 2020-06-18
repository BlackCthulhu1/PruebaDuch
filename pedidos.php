<?php
$titulo='Pedidos';
include('Cl/funciones.php'); ?>
<?php require_once 'templates/header.php'; ?>
<br>
<div class="content">
    <h1 style="text-align: center">PEDIDOS</h1>
    <button type="button" class="btn btn-warning" style="margin-left: 1000px; margin-bottom: 10px">Modificar pedido</button>
    <div class="container">
        <div class="table-responsive table-dark">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"># Pedido</th>
                        <th scope="col">Id de cliente</th>
                        <th scope="col">Total</th>
                        <th scope="col">Fecha de creacion</th>
                        <th scope="col">Seleccionar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo pedidos();?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->
    <?php require_once 'templates/footer.php'; ?>