<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta</title>
    <link rel="stylesheet" href="./css/show.css">
</head>
<body>
    
<div class="container2" style="">
    <a href="./saleProduct.php"><button type="submit" class="boton2">Regresar</button></a>
</div>
<?php
  require_once "./db/conexion.php";
  ?>
    <center>
    <h1 style="color:white">Resumen de venta</h1>
</center>
<br>
<?php
 $consulta= "SELECT * FROM ventas ORDER BY id DESC LIMIT 1";
 $ejecutarconsulta= mysqli_query($db,$consulta);
 $verfilas= mysqli_num_rows($ejecutarconsulta);
 $fila= mysqli_fetch_array($ejecutarconsulta);

 ?>
<form method="GET" action="showSaleProduct.php">
    <p>El total de la compra es: $<?php echo($fila[4]); ?> </p><input type="number" name="cambio" placeholder="Ingrese el dinero con el cual el cliente pago" required>
    <button type="submit" class="" name="pagar" value="Pagar">Pagar</button>
</form>
<br>
<?php
if(isset($_GET['pagar'])==1)
{
    $cambio=$_GET['cambio'];

   
    $total=($cambio - $fila[4]);
    echo('
    <div class="show">
    
    <h1>'.$fila[1].'</h1>
    <h2>Precio del Producto: '.$fila[2].'</h2>
    <h2>Cantidad vendida: '.$fila[3].'</h2>
    <h2>Total de la venta: $'.$fila[4].'</h2>
    <h2>Hora: '.$fila[6].'</h2>
    <br>
    <h1 style="color:red;">Cambio: $'.$total.'</h1>
    
    </div>
    ');
}
?>
  
    
</body>
</html>