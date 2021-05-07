<?php

!isset($_POST) ? die('Acceso denegado') : '';
require 'conexion.php';

$db = new Conexion();
if(isset($_POST['alta'])){

    
    $nombre = $_POST['nombre'];
    $domicilio = $_POST['domicilio'];

    $query = "INSERT INTO cliente (nombre,domicilio, fecha_alta) VALUES ('$nombre','$domicilio', '".date('Y-m-d')."')";

    $result = $db -> query($query);

    $db = -> affected_rows < 0 ? print 'hubo un problema' : print 'se inserto correctamente' ;
    if($db = -> affected_rows < 0){
        header("Location: cliente.php?error=hubo  un problema");
    }
    

}
?>