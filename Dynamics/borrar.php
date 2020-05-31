<?php
//cabecera y header
echo'<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Agregar</title>
    <link rel="stylesheet" type="text/css" href="../Statics/css/formularioreg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sacramento">
  </head>
  <body>
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
   <br>';
   //incluye la bd
  include("bd.php");
  //variables
  $condenado=(isset($_POST['Eliminar']) && $_POST['Eliminar'] !="") ? $_POST['Eliminar']:"No ingresaste un ID";
  $muerto=(isset($_POST['Usuario']) && $_POST['Usuario'] !="") ? $_POST['Usuario']:"No ingresaste un Usuario";
  $tipo=(isset($_POST['Tipo']) && $_POST['Tipo'] !="") ? $_POST['Tipo']:"No ingresaste un tipo de usuario";
  $conexion = connectDB2("cafeteria");
  if (connectDB2("cafeteria")) {
    echo "dentro";
  }
  if ($condenado!="No ingresaste un ID") {
    $consulta="DELETE FROM alimento WHERE id_alimento= '$condenado'";
    $respuesta=mysqli_query($conexion,$consulta);
    echo $condenado;

  }
  if ($muerto!="No ingresaste un Usuario" && $tipo!="No ingresaste un tipo de Usuario") {
    if ($tipo=="Profesor") {
      $consulta="DELETE FROM profesor_o_funcionario WHERE RFC= '$muerto'";
      $respuesta=mysqli_query($conexion,$consulta);
      echo "<br>$muerto y $tipo" ;
    }
    if ($tipo=="Alumno") {
      $consulta="DELETE FROM alumno WHERE numero_de_cuenta= '$muerto'";
      $respuesta=mysqli_query($conexion,$consulta);
      echo "<br>$muerto y $tipo" ;
    }
    if ($tipo=="Trabajador") {
      $consulta="DELETE FROM trabajador WHERE numero_de_trabajador= '$muerto'";
      $respuesta=mysqli_query($conexion,$consulta);
      echo "<br>$muerto y $tipo" ;
    }
  }
  //conexion
  mysqli_close($conexion);
    header("Location:../Dynamics/Agregar.php")
/**/
//footer
 echo '<footer>
     <nav>
        <ul>
           <li class="footer">Copyright &copy; 2020<li>
           <li class="footer">Todos los derechos reservados.</li>
        <ul>
     </nav>
 </footer>';
?>
