<?php
//solicitudes
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD de mySQL worhbench


    $user = "root";
    $pass= "12345";
    $server= "localhost:3306";
    $db = "bdcursos";
    $con=  new mysqli($server,$user,$pass,$db); 

    if ($con->connect_errno){
        die ("error de conexion".$con->connect_errno);
    }else{ echo "conectado"; }




// Consulta datos y recepciona una clave para consultar dichos datos con dicha clave
if (isset($_POST["consultar"])){
    $sqlEmpleaados = mysqli_query($con,"SELECT * FROM inventario WHERE id=".$_GET["consultar"]);
    if(mysqli_num_rows($sqlProducto) > 0){
        $producto = mysqli_fetch_all($sqlProducto,MYSQLI_ASSOC);
        echo json_encode($producto);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//borrar pero se le debe de enviar una clave ( para borrado )
if (isset($_POST["borrar"])){
    $sqlProducto = mysqli_query($con,"DELETE FROM inventario WHERE id=".$_GET["borrar"]);
    if($sqlProducto){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//Inserta un nuevo registro y recepciona en método post los datos 
if(isset($_POST["insertar"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombre=$data->nombre;
    $cantidad=$data->cantidad;
    $lote=$data->lote;
    $vence=$data->vence;
    $precio=$data->precio;
        if(($cantidad!="")&&($nombre!="")&&($lote!="")&&($vence!="")&&($precio!="")){
            
    $sqlProducto = mysqli_query($con,"INSERT INTO inventario(nombre,cantidad,precio) VALUES('$nombre','$cantidad','$lote','$vence','$precio') ");
    echo json_encode(["success"=>1]);
        }
    exit();
}
// Actualiza datos 
if(isset($_POST["actualizar"])){
    
    $data = json_decode(file_get_contents("php://input"));

    $id=(isset($data->id))?$data->id:$_GET["actualizar"];
    $nombre=$data->nombre;
    $cantidad=$data->cantidad;
    $lote=$data->lote;
    $vence=$data->vence;
    $precio=$data->precio;
    
    $sqlProducto = mysqli_query($con,"UPDATE inventarios SET nombre='$nombre',cantidad='$cantidad','lote'= $lote,'vence'=$vence,'precio'= $precio WHERE id='$id'");
    echo json_encode(["success"=>1]);
    exit();
}

// Consulta todos los registros de la tabla inventario
$sqlProducto = mysqli_query($con,"SELECT * FROM inventario ");
if(mysqli_num_rows($sqlProducto) > 0){
    $producto = mysqli_fetch_all($sqlProducto,MYSQLI_ASSOC);
    echo json_encode($producto);
}else{ echo json_encode([["success"=>0]]); }

?>