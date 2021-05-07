<?php

!isset($_POST) ? die('Acceso denegado') : '';
require 'conexion.php';

$db = new Conexion();
if(isset($_POST['alta'])){

    
    $nombre = $_POST['nombre'];
    $domicilio = $_POST['domicilio'];

    $query = "INSERT INTO cliente (nombre,domicilio, fecha_alta) VALUES ('$nombre','$domicilio', '".date('Y-m-d')."')";

    $result = $db -> query($query);

    
    if($db  -> affected_rows < 0){
        header("Location: cliente.php?error=hubo  un problema");
    }else
    {
            header("Location: cliente.php");
    }
}
    if(isset($_POST['editar'])){
      $nombre=$_POST['nombre'];
        $domicilio = $_POST['domicilio'];
        $id = $_POST['id'];
        $query="UPDATE cliente SET nombre ='$nombre' , domicilio='$domicilio' WHERE cliente_id=$id ";
        $db->query($query);
        if($db  -> affected_rows < 0){
            header("Location: cliente.php?error=hubo  un problema");
        }else
        {
                header("Location: cliente.php");
        }
    }
    if(isset($_POST['pedido'])){
        $cliente=$_POST['cliente']; //es numerico no lleva comillas en values del insert into
        $producto=$_POST['producto'];
        $importe=$_POST['importe'];
        settype($cliente,'integer');

        $query="INSERT INTO pedido(cliente_id,producto,importe) VALUES($cliente,'$producto','$importe')";
        $db->query($query);
        if($db  -> affected_rows < 0){
            header("Location: index.php?error=hubo  un problema");
        }else
        {
                header("Location: index.php");
        }

    }

?>