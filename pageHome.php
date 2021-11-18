<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="./css/pageHome.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    </head>
<body>
<?php
  require_once "./db/conexion.php";
  ?>
  
  <div class="container2">
    <a href="./pageHome.php"><button type="submit" class="boton">Inicio</button></a>
   <a href="./saleProduct.php"><button type="submit" class="boton">Realizar Venta</button></a>
   <a href="./createProduct.php"><button type="submit" class="boton">Registrar Nuevo Producto</button></a>
   <a href="./updateProduct.php"><button type="submit" class="boton">Actualizar Productos</button></a>
   <a href="./deleteProduct.php"><button type="submit" class="boton">Eliminar Productos</button></a>
   <a href="./index.php"><button type="submit" class="boton">Cerrar Sesión</button></a>
</div>
<br>
<center>
    <h1><font color="white">Menú</font></h1>
</center>
<br>
<div class="container">
        <div class="row">
<!--        
        <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/image2.jpg" class="zoom" alt="">
                        <div class="card-body">
                            <h1 class="card-title">Caguama</h1>
                            <h6 class="card-title">Descripción: Solo una caguama</h6>
                            <h2>Precio: $45</h2>
                          </div>
                    </div>
                </div>
                 -->
        <?php
    $consulta= "SELECT * FROM products";
    $ejecutarconsulta= mysqli_query($db,$consulta);
    $verfilas= mysqli_num_rows($ejecutarconsulta);
    $fila= mysqli_fetch_array($ejecutarconsulta);
// echo $verfilas;
    if(!$ejecutarconsulta)
    {
        echo("ERROR en la consulta");
    }
    else
        {
            if($verfilas<1)
            {
                echo('<h3><font color="white">Sin Registros</font></h3>');
            }
            else
            {
                for($x=0; $x<=$fila; $x++)
                {   
                    echo'  <div class="col-sm-4">
                    <div class="card" style="width: 18rem; border-radius:20px;  margin-top:50px !important; ">
                        <img src="./img/productos/'.$fila[4].'" style="border-radius:20px" alt="">
                        <div class="card-body">
                            <h1 class="card-title">'.$fila[1].'</h1>
                            <h6 class="card-title">Descripción: '.$fila[3].'</h6>
                            <h2>Precio: $'.$fila[2].'</h2>
                          </div>
                    </div>
                </div>
                ';
                $fila=mysqli_fetch_array($ejecutarconsulta);
            }
         }
     }

 ?>
           
</div>
</div>
<script src="./js/cards.js"></script>
</body>
</html>