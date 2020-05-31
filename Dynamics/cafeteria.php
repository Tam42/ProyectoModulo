<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!--El titulo que aprecera en la pestaña del navegador-->
    <title>Cafeteria</title>
    <link rel="stylesheet" type="text/css" href="../Statics/css/formularioreg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sacramento">
  </head>
  <body>
  </head>
  <body>
    <!--Header-->
      <header>
        <a id="logo-header" href="../Templates/Principal.html"><img src="../Statics/img/logo.png" class="logo">
      </a>
       <nav>
        <ul>
          <li><a href="menu3.php"><i class="fa fa-cutlery"></i></a></li>
          <li><a href="../Templates/Mapa.html"><i class="fa fa-map-o"></i></a></li>
          <li><a href="../Templates/privacidad.html">Privacidad</a></li>
			    <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>
      </nav>
     </header>
     <br>
     <br>
     <br>
     <br>
    <?php
      include("bd.php");
      //Conexion más base y despliegue de errores
      $conexion = connectDB2("cafeteria");
      if(!$conexion)
      {
        echo mysqli_connect_error()."<br>";
        echo mysqli_connect_errno()."<br>";
        exit();
      }
      else
      {
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['tipo'] = $_POST['tipo'];
        $_SESSION['categoria'] = $_POST['categoria'];
        if ( !isset($_SESSION['usuario']) && !isset($_POST['usuario'])) //por si no ha ingresado un usuario
        {
          header("Location: sessioncaf.php");
        }
        if (isset($_POST['usuario']))
        {
          $entregado="";
          $no_entregado="";
          if(isset($_POST['entregado']))$entregado=$_POST['entregado'];//por lo de la cookie del supervisor
          if(isset($_POST['no entregado']))$entregado=$_POST['no entregado'];
          if($entregado)
          {
            "INSERT INTO status VALUES ('entregado')";
          }
          if($no_entregado)
          {
            "INSERT INTO status VALUES ('no entregado')"; //si no es recogida la orden
            $dia=date("D");
            if($dia=="Mon")
            {
              setcookie("bloquear","usuario", time() + 60*60*24*5);//por si es en lunes
            }
            else
            {
              setcookie("bloquear","usuario", time() + 60*60*24*7);//por otro dia
            }
            if(isset($_COOKIE["bloquear"]))
            {
              echo "<h3>EL usuario ha sido bloqueado</h3>";
            }
          }
          $categoria = $_SESSION['categoria'];
          $eleccion = $_SESSION['tipo'];
          $nombre= $_POST['usuario'];
          $cons2="SELECT password FROM $categoria WHERE Nombre='$nombre'"; //consulta para la contraseña
          $result2 = $conexion -> query($cons2);
          while($fila= mysqli_fetch_array ($result2)){
            $fin= $fila[0];
          }
          $Pass=substr("$fin", 3);
          if ($eleccion == "Cliente")
          {
            $cons="SELECT * FROM $categoria WHERE Nombre='$nombre'"; //primera consulta para el usuario
            $result = $conexion -> query($cons);
            $count= mysqli_num_rows($result);
            if($count==1)
            {
              if (password_verify($_POST['contraseña'], $Pass)) //se verifica la contraseña
              {
                session_start();
                Header('Location: principal.php');
              }
              else
              {
                echo "<h3>No es la contraseña</h3><br>";
              }
            }
            else
            {
              echo "<h3>Usuario no valido</h3>";
            }
          }
          if ($eleccion == "Supervisor de pedidos")
          {
            $cons="SELECT * FROM $categoria WHERE Nombre='$nombre'";
            $result = $conexion -> query($cons);
            $count= mysqli_num_rows($result);
            if($count==1)
            {
              if (password_verify($_POST['contraseña'], $Pass))
              {
                session_start();
                Header('Location: supervisor.php');
              }
              else
              {
                echo "<h3>No es la contraseña</h3><br>";
              }
            }
            else
            {
              echo "<h3>Usuario no valido</h3>";
            }
          }
          if ($eleccion == "Administrador de sistemas")
          {
            $cons="SELECT * FROM $categoria WHERE Nombre='$nombre'";
            $result = $conexion -> query($cons);
            $count= mysqli_num_rows($result);
            if($count==1)
            {
              if (password_verify($_POST['contraseña'], $Pass))
              {
                session_start();
                Header('Location: agrega.php');
              }
              else
              {
                echo "<h3>No es la contraseña</h3><br>";
              }
            }
            else
            {
              echo "<h3>Usuario no valido</h3>";
            }
          }
        }
      }
    ?>
    <!--Footer-->
    <footer>
        <nav>
           <ul>
              <li class="footer">Copyright &copy; 2020<li>
              <li class="footer">Todos los derechos reservados.</li>
           <ul>
        </nav>
    </footer>
  </body>
  </html>
