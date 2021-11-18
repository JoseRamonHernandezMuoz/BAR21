<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar 21</title>
    <link rel="stylesheet" href="./css/styles.css"> 
</head>
<body>
<?php
  require_once "./db/conexion.php";
  ?>
    <center>
        <font color="white">
        <h1>BAR 21</h1>
        <h4> By DJ caco</h4>
</font>
</center>
<form class="login-form" action="index.php" method="GET"> 
        <p class="login-text">
          <span class="fa-stack fa-lg">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-lock fa-stack-1x"></i>
          </span>
        </p>
        <input type="text" name="user" class="login-username" autofocus="true" required="true" placeholder="Email" />
        <input type="password" name="pass" class="login-password" required="true" placeholder="Password" />
        <input type="submit" name="Login" value="Acceder" class="login-submit" />
      </form>
      <!-- <a href="#" class="login-forgot-pass">forgot password?</a> -->
      
      <div class="underlay-photo"></div>
      <div class="underlay-black"></div> 
      <?php
         if(isset($_GET['Login'])==1)
         {
            $user = $_GET['user'];
            $pass = $_GET['pass'];

            $consulta= "SELECT * FROM user WHERE user='$user' and pass='$pass'";
            $ejecutarconsulta= mysqli_query($db,$consulta);
            $verfilas= mysqli_num_rows($ejecutarconsulta);
            $fila= mysqli_fetch_array($ejecutarconsulta);
        
            if($verfilas >= 1)
            {?>
              <script> window.location="./pageHome.php"; </script>
              <?php
            }
            else
            {?>
               <script> window.location="./index.php"; 
              alert("Error. Usuario y/o Contraseña Incorrectos");
              </script>
              <?php
             
            }
            }
      ?>
</body>
</html>