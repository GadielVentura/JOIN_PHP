<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cliente</title>
</head>
<body>
    <h1>Cliente</h1>
    <?php  
    if(isset($_GET['error'])){
        $mensaje = $_GET['error'];

        echo htmlentities($mensaje);
    }
    ?>
    <form action="crud.php" method="POST">
        <p>Nombre: <input type="text" name="nombre"></p>
        <p>Domicilio <input type="text" name="domicilio"></p>
        <input type="submit" name="alta" value="guardar">
    </form>

    <table border="1">
<tr>
        <th>Cliente_id</th>
        <th>Nombre</th>
        <th>Domicilio</th>
        <th>Fecha alta</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    
<?php 
 require 'conexion.php';  
    $db = new Conexion();

    $query = "SELECT * FROM cliente";
    $res = $db -> query($query);
    $table ='';
    while($row = mysqli_fetch_array($res)){
        $table .= "<tr>";
        $table .= "<td>$row[cliente_id]</td>";
        $table .= "<td>$row[nombre]</td>";
        $table .= "<td>$row[domicilio]</td>";
        $table .= "<td>$row[fecha_alta]</td>";
        $table .= "<td><a href=\"editar.php?id=$row[cliente_id]\">Editar</a></td>";
        $table .= "<td><a href=\"eliminar.php?id=$row[cliente_id]\">Eliminar</a></td>";
        $table .= "</tr>";
    }
    echo $table;
    ?>
</table>
</body>
</html>