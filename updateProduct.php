<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Productos</title>
    <!-- <link rel="stylesheet" href="./css/form.css"> -->
    <link rel="stylesheet" href="./css/buscador.css">  
    <link rel="stylesheet" href="./css/pageHome.css">
</head>
<body>
<?php
  require_once "./db/conexion.php";
  ?>
<div class="container2">
    <a href="./pageHome.php"><button type="submit" class="boton">Inicio</button></a>
</div>
<br>
<center>
<h1><font color="white">Formulario para editar datos de los productos</font></h1>
</center>
  <form method="GET" action="updateProduct.php" class="form1">
        <input type="text" id="s" name="nombre" value="" placeholder="Ingrese el Nombre correctamente escrito del producto que modificara su precio"  />
        <button type="submit" name="button" class="">Buscar</button>
    </form>

    <?php
  if(isset($_GET['button'])==1){
    $nombre = $_GET['nombre'];

    $consulta= "SELECT * FROM products WHERE nombreP = '$nombre'";
    $ejecutarconsulta= mysqli_query($db,$consulta);
    $verfilas= mysqli_num_rows($ejecutarconsulta);
    $fila= mysqli_fetch_array($ejecutarconsulta);
    
    if(!$ejecutarconsulta)
    {
        echo("ERROR en la consulta");
    }
    else
        {
            if($verfilas<1)
            {
                echo('<h3><font color="white">Sin Registros de '.$nombre.'</font></h3>');
            }
            else
            { 
                ?>
                <form method="GET" action="" class="form">
                    <h3><font color="red">No cambiar el nombre</font></h3>
                    <h6>(si quieres cambiar el nombre y/o imagen, tendrás que eliminar el producto y volver a registrarlo)</h6>
                <p>Nombre </p><input type="text" name="nombreP" value="<?php echo $fila[1] ?>" required>
                <p>Precio </p><input type="number" name="precioP" value="<?php echo $fila[2] ?>" required>
                <p>Descripción </p><input type="text" name="descripcionP" value="<?php echo $fila[3] ?>" required>
        <br>
                <button action="submit" name="enviar" class=""> Actualizar
              
            </form> 
              
    <?php
    }
}
}   

    if(isset($_GET['enviar'])==1)
    {
        $nombreP = $_GET['nombreP'];
$precioP = $_GET['precioP'];
$descripcionP = $_GET['descripcionP'];

$modi= "UPDATE products SET
nombreP='$nombreP',
precioP='$precioP',
descripcionP='$descripcionP'
WHERE nombreP='$nombreP'";
$resultado= mysqli_query($db, $modi);
if($resultado)
{?>
    <script> window.location="./updateProduct.php"; 
    alert("Actualizacion Exitosa");
    </script>
    <?php
}
else{
    ?>
    <script> window.location="./updateProduct.php"; 
    alert("Ocurrio un error, intentelo mas tarde");
    </script>
    <?php
}

    }
    
  

else
?>
</body>
</html>