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
<h1><font color="white">Formulario para eliminar productos</font></h1>
</center>
  <form method="GET" action="deleteProduct.php" class="form1">
        <input type="text" id="s" name="nombre" value="" placeholder="Ingrese el Nombre correctamente escrito del producto que eliminara"  />
        <button type="submit" name="button" class="" onclick="return ConfirmDelete()">Eliminar</button>
        <script>
function ConfirmDelete()
{
    var $respuesta = confirm("Seguro de que deseas eliminar este producto");

    if ($respuesta == true)
    {
        return true;
    }
    else 
    {
        return false;
    }

}
</script>
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
        echo('<h3><font color="white">ERROR en la consulta</font></h3>');
    }
    else
        {
            if($verfilas<1)
            {
               ?>
                <script> window.location="./deleteProduct.php";
                alert("El registro no existe. (Producto no eliminado)");
                </script>
               <?php
            }
            else
            { 

$delete="DELETE FROM products WHERE nombreP = '$nombre'";
$resultado= mysqli_query($db, $delete);
if($resultado)
{
    ?>
    <script> window.location="./deleteProduct.php"; 
    alert("Producto Eliminado con Exito");
    </script>
    <?php
}
else{
    ?>
    <script> window.location="./deleteProduct.php"; 
    alert("Ocurrio un error, intentelo mas tarde");
    </script>
    <?php
    }
        }
    }
                                    }
 ?>
</body>
</html>