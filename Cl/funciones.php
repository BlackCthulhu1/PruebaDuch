<?php 

function connectDB(){

$server = "localhost";
$user = "root";
$pass = "";
$bd = "duchamp";


$conexion = mysqli_connect($server, $user, $pass,$bd) 
    or die("Ha sucedido un error inexperado en la conexion de la base de datos");

return $conexion;
} 

function disconnectDB($conexion){

$close = mysqli_close($conexion) 
    or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

return $close;
}

function ropa(){

    $conexion = connectDB();
    mysqli_set_charset($conexion, "SET NAMES utf8");

    $sql = "SELECT * FROM mis_productos where tipo_producto ='ropa'";
    if(!$result = mysqli_query($conexion, $sql)) die();

    while ($oferta = mysqli_fetch_array($result))
{  
    echo '<div class="col-lg-4">';
    echo '<h2 style="text-align: center">'.$oferta["name"]. '</h2>';
    echo  '<img height="325" width="325" src="data:image/jpeg;base64,'.base64_encode($oferta["img"]).'" alt="'. $oferta["nombre_producto"].'"class="border"/>';
    echo  '<p>'.$oferta["price"]. '</p>';
    echo  '<a style="margin-right: 115px" class="btn btn-success" href="AccionCarta.php?action=addToCart&id='.$oferta["id"].'"> <strong> Agregar al carrito </strong></a>';
    echo  '<a class="btn btn-warning" href="vista-producto.php?id='.$oferta["id"].'" role="button"> <strong> Ver &raquo;</strong></a></div>';
    
}
mysqli_close( $conexion );

}

function vista_producto($producto_id){
    $conexion = connectDB();
    mysqli_set_charset($conexion, "SET NAMES utf8");

    $sql = "SELECT * FROM mis_productos where id = $producto_id";
    if(!$result = mysqli_query($conexion, $sql)) die();
    $oferta = mysqli_fetch_array($result);
    echo '<br>';
    echo '<br>';
    echo '<div class=container>';
    echo '<div class="col-md-6">';
    echo  '<img height="500" width="500" src="data:image/jpeg;base64,'.base64_encode($oferta["img"]).'" alt="Responsive image" class="img-fluid rounded"/> </div>';
    echo '<div class="col-md-6">';
    echo  '<h3>'.$oferta["name"]. '</h3>';
    echo '<ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
         <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Descripción</a>
         </li>
         </ul>';
    echo '<p>'.$oferta["description"].'</p>';     
    echo  '<h3> $'.$oferta["price"]. '</h3> </div>';
    echo  '<a style="margin-left: 400px" class="btn btn-success" href="AccionCarta.php?action=addToCart&id='.$oferta["id"].'"> <strong> Agregar al carrito </strong></a>';
    

mysqli_close( $conexion );

}


function nuevos_p(){

    $conexion = connectDB();
    mysqli_set_charset($conexion, "SET NAMES utf8");

    $sql = "SELECT * FROM mis_productos order by id desc limit 3";
    if(!$result = mysqli_query($conexion, $sql)) die();

    while ($oferta = mysqli_fetch_array($result))
{  
    echo '<div class="col-lg-4">';
    echo '<h2 style="text-align: center">'.$oferta["name"]. '</h2>';
    echo  '<img height="325" width="325" src="data:image/jpeg;base64,'.base64_encode($oferta["img"]).'" alt="'. $oferta["name"].'"class="border"/>';
    echo  '<p>'.$oferta["price"]. '</p>';
    echo  '<a style="margin-right: 115px" class="btn btn-success" href="AccionCarta.php?action=addToCart&id='.$oferta["id"].'"> <strong> Agregar al carrito </strong></a>';
    echo  '<a class="btn btn-warning" href="vista-producto.php?id='.$oferta["id"].'" role="button"> <strong> Ver &raquo;</strong></a></div>';
    
}
mysqli_close( $conexion );

}

function accesorios(){

    $conexion = connectDB();
    mysqli_set_charset($conexion, "SET NAMES utf8");

    $sql = "SELECT * FROM mis_productos where tipo_producto ='accesorio'";
    if(!$result = mysqli_query($conexion, $sql)) die();

    while ($oferta = mysqli_fetch_array($result))
{  
    echo '<div class="col-lg-4">';
    echo '<h2 style="text-align: center">'.$oferta["name"]. '</h2>';
    echo  '<img height="325" width="325" src="data:image/jpeg;base64,'.base64_encode($oferta["img"]).'" alt="'. $oferta["name"].'"class="border"/>';
    echo  '<p>'.$oferta["price"]. '</p>';
    echo  '<a style="margin-right: 115px" class="btn btn-success" href="AccionCarta.php?action=addToCart&id='.$oferta["id"].'"> <strong> Agregar al carrito </strong></a>';
    echo  '<a class="btn btn-warning" href="vista-producto.php?id='.$oferta["id"].'" role="button"> <strong> Ver &raquo;</strong></a></div>';
    
}
mysqli_close( $conexion );

}

function cuadros(){

    $conexion = connectDB();
    mysqli_set_charset($conexion, "SET NAMES utf8");

    $sql = "SELECT * FROM mis_productos where tipo_producto ='cuadros'";
    if(!$result = mysqli_query($conexion, $sql)) die();

    while ($oferta = mysqli_fetch_array($result))
{  
    echo '<div class="col-lg-4">';
    echo '<h2 style="text-align: center">'.$oferta["name"]. '</h2>';
    echo  '<img height="325" width="325" src="data:image/jpeg;base64,'.base64_encode($oferta["img"]).'" alt="'. $oferta["name"].'"class="border"/>';
    echo  '<p>'.$oferta["price"]. '</p>';
    echo  '<a style="margin-right: 115px" class="btn btn-success" href="AccionCarta.php?action=addToCart&id='.$oferta["id"].'"> <strong> Agregar al carrito </strong></a>';
    echo  '<a class="btn btn-warning" href="vista-producto.php?id='.$oferta["id"].'" role="button"> <strong> Ver &raquo;</strong></a></div>';
    
}
mysqli_close( $conexion );

}

function inventario(){
    $cont = 1;
    $conexion = connectDB();
    mysqli_set_charset($conexion, "SET NAMES utf8");

    $sql = "SELECT * FROM mis_productos";
    if(!$result = mysqli_query($conexion, $sql)) die();

    while ($oferta = mysqli_fetch_array($result))
{  

    echo '<tr>';
    echo '<th scope="row">'.$oferta["id"].'</th>';
    echo '<td>'.$oferta["name"].'</td>';
    echo '<td>'.$oferta["description"].'</td>';
    echo '<td>'.$oferta["price"]. '</td>';
    echo '<td> 1 </td>';
    echo '<td><img height="130" src="data:image/jpeg;base64,'.base64_encode($oferta["img"]).'" alt="'. $oferta["name"].'"class="border"/></td>';
    echo '<td>';
    echo '<div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="customCheck'.$cont.'">
          <label class="custom-control-label" for="customCheck'.$cont.'"></label>
         </div>';
    echo '</td>';    
    $cont ++; 
    
    
}
mysqli_close( $conexion );

}

function pedidos(){
    $cont = 1;
    $conexion = connectDB();
    mysqli_set_charset($conexion, "SET NAMES utf8");

    $sql = "SELECT * FROM orden";
    if(!$result = mysqli_query($conexion, $sql)) die();

    while ($oferta = mysqli_fetch_array($result))
{  
    echo '<tr>';
    echo '<th scope="row">'.$oferta["id"].'</th>';
    echo '<td>'.$oferta["customer_id"].'</td>';
    echo '<td>'.$oferta["total_price"].'</td>';
    echo '<td>'.$oferta["created"]. '</td>';
    echo '<td>';
    echo '<div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="customCheck'.$cont.'">
          <label class="custom-control-label" for="customCheck'.$cont.'"></label>
         </div>';
    echo '</td>';    
    $cont ++; 
    
    
}
mysqli_close( $conexion );

}

function mis_pedidos(){
    $cont = 1;
    $user= $_SESSION['id_cliente'];
    $conexion = connectDB();
    mysqli_set_charset($conexion, "SET NAMES utf8");

    $sql = "SELECT * FROM orden when customer_id = $user";
    if(!$result = mysqli_query($conexion, $sql)) die();

    while ($oferta = mysqli_fetch_array($result))
{  
    echo '<tr>';
    echo '<th scope="row">'.$oferta["id"].'</th>';
    echo '<td>'.$oferta["coustumer_id"].'</td>';
    echo '<td>'.$oferta["total_price"].'</td>';
    echo '<td>'.$oferta["created"]. '</td>';
    echo '<td> 1 </td>';
    echo '<td>';
    echo '<div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="customCheck'.$cont.'">
          <label class="custom-control-label" for="customCheck'.$cont.'"></label>
         </div>';
    echo '</td>';    
    $cont ++; 
    
    
}
mysqli_close( $conexion );

}

?>