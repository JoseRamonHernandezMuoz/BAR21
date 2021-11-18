<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Productos</title>
    <link rel="stylesheet" href="./css/form.css"> 
    <link rel="stylesheet" href="./css/pageHome.css">
</head>
<body>
<?php
  require_once "./db/conexion.php";
  ?>
  
  <div class="container2">
    <a href="./pageHome.php"><button type="submit" class="boton">Inicio</button></a>
</div>
<form method="GET" action="createProduct.php" class="form">
    <center><h2>Registro Para Producto Nuevo</h2></center>
        <p>Nombre </p><input type="text" name="nombreP" placeholder="Nombre del producto: " required>
        <p>Precio </p><input type="number" name="precioP" placeholder="Precio del producto:" required>
        <p>Descripción  </p><textarea class="form-control" aria-label="With textarea" type="text" name="descripcionP" placeholder="(No es necesario)" ></textarea>
        <p>No es necesario</p><input type="file" name="imagen" class="" required>
        <button action="submit" name="enviar"> Guardar
    </form>
    
<?php
    if(isset($_GET['enviar'])==1){
$nombreP = $_GET['nombreP'];
$precioP = $_GET['precioP'];
$descripcionP = $_GET['descripcionP'];
$imagen = $_GET['imagen'];


$almacenar= "INSERT INTO products( nombreP, precioP, descripcionP, imagen) VALUES 
( '$nombreP', '$precioP', '$descripcionP', '$imagen')";
$resultado= mysqli_query($db, $almacenar);

if($resultado)
{
  
  ?>
  <script> window.location="./createProduct.php"; 
  alert("Registro Exitoso!");
  </script>
  <?php
}
else{
  ?>
  <script> window.location="./createProduct.php"; 
  alert("Ocurrio un error, intentelo mas tarde");
  </script>
  <?php
}
    }
?>       
</body>
</html>