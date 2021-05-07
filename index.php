
<?php  require 'conexion.php';  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body><h1>index</h1>
<a href="cliente.php">cliente</a>
<h2>registrar pedido</h2>
<?php
 $db = new Conexion();

 $query = "SELECT cliente_id, nombre FROM cliente";
 $res = $db -> query($query);
 $option='';

 while($row =mysqli_fetch_array($res)){
    $option .= "<option value=\"$row[cliente_id]\">$row[nombre]</option>";
 }
 
 ?>
 <form action="crud.php" method="POST">
 <P>Cliente: 
    <select name="cliente">
        <option values="-">Selecciona cliente</option>
        <?php echo $option; ?>
    </select>
    </P>
    <P>Producto: <input type="text" name="producto"></P>
    <P>Importe: <input type="number" name="importe"></P>
    <input type="submit" name="pedido">
</form>
<?php
    $query = "SELECT * FROM pedido P JOIN cliente C on P.cliente_id = C.cliente_id";
    $res = $db->query($query);
    $table = '';
    while($row=mysqli_fetch_array($res)){
        $table .='<tr>';
        $table .= "<td>$row[nombre]</td>";
        $table .= "<td>$row[domicilio]</td>";
        $table .= "<td>$row[producto]</td>";
        $table .= "<td>$row[importe]</td>";
    }

?>
<h2>informe de pedidos</h2>
<table border="2">
    <tr>
        <th>cliente</th>
        <th>domicilio</th>
        <th>pedido</th>
        <th>importe</th>
    </tr>
    <?php  echo $table; ?>
</table>
</body>
</html>