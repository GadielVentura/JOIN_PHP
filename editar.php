
<?php
require 'conexion.php';
if(isset($_GET['id'])){
        $db = new Conexion();
        $id = $_GET['id'];
      if (! is_numeric($id)){
          die('informacion incorrecta');
      }
        $query = "SELECT * FROM cliente WHERE cliente_id=$id";
        $res = $db->query($query);
        $datos= mysqli_fetch_array($res);
}else{
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
</head>
<body>
    <h2>Editar cliente</h2>
    <form action="crud.php" method="POST">
    <p>Nombre: <input type="text" name="nombre" value="<?php echo $datos['nombre'];?>"></p>
    <p>Domicilio: <input type="text" name="domicilio" value="<?php echo $datos['domicilio'];?>"></p>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" name="editar" value="Guardar">



</body>
</html>