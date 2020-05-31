<?php

echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Agregar</title>
    <link rel="stylesheet" type="text/css" href="../Statics/css/agregar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sacramento">
  </head>
  <body>
  <!--Header-->
    <header>
      <a id="logo-header" href="../Templates/Principal.html"><img src="../Statics/img/logo.png" class="logo">
    </a>
     <nav>
      <ul>
        <li><a href="menu4.php"><i class="fa fa-cutlery"></i></a></li>
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

  include("bd.php");
  $alimento=(isset($_POST['alimento']) && $_POST['alimento'] !="") ? $_POST['alimento']:"hamburguesa";
  $precio=(isset($_POST['precio']) && $_POST['precio'] !="") ? $_POST['precio']:"54";
  $cantidad=(isset($_POST['cantidad']) && $_POST['cantidad'] !="") ? $_POST['cantidad']:"1";
  $id_alimento=(isset($_POST['id_alimento']) && $_POST['id_alimento'] !="") ? $_POST['id_alimento']:"0";
  $Lugar=(isset($_POST['Lugar']) && $_POST['Lugar'] !="") ? $_POST['Lugar']:"1";


  $conexion = connectDB2("cafeteria");
  $consulta = "SELECT * FROM alimento WHERE id_alimento=$id_alimento";
  $respuesta= mysqli_query($conexion,$consulta);
  if (mysqli_query($conexion,$consulta)) {
  }
  $row=mysqli_fetch_array($respuesta);

  $consulta = "SELECT Lugar FROM direccion_de_entrega WHERE id_lugar=$Lugar";
  $respuesta = mysqli_query($conexion, $consulta);
  $row=mysqli_fetch_array($respuesta);
  $NLugar=$row[0];

  $tipo="estudiante";//variables provisonales antes de poner las sesiones
  $usuario=319294404;
  $id_lugar=1;
  //Consultar estudiante
  if ($tipo="estudiante") {
    $consulta = "SELECT nombre FROM estudiante WHERE numero_de_cuenta=$usuario";
    $respuesta = mysqli_query($conexion, $consulta);
    $row=mysqli_fetch_array($respuesta);
    $nombre=$row[0];
    $consulta="INSERT INTO pedido (id_alimento,numero_de_cuenta,id_lugar) VALUES ($id_alimento,$usuario,$id_lugar)";
    mysqli_query($conexion,$consulta);
    $total=$precio*$cantidad;
    echo "<br>Hola! $nombre tu pedido es el siguiente:<br> $alimento<br>
    Precio individual: $precio<br> Pediste:$cantidad <br> Total:$$total<br> Lo recogeras en: $NLugar";
  }

  elseif($tipo="trabajador") {
    $consulta = "SELECT nombre FROM trabajador WHERE numero_de_trabajador=$usuario";
    $respuesta = mysqli_query($conexion, $consulta);
    $row=mysqli_fetch_array($respuesta);
    $nombre=$row[0];
    $consulta="INSERT INTO pedido (id_alimento,numero_de_trabajador,id_lugar) VALUES ($id_alimento,$usuario,$id_lugar)";
    mysqli_query($conexion,$consulta);
    $total=$precio*$disponibilidad;
    echo "<br>Hola! $nombre tu pedido es el siguiente:<br> $alimento<br>
    Precio individual: $precio<br> Pediste:$disponibilidad<br> Total:$$total<br> Lo recogeras en: $NLugar";
  }
  echo '<footer>
      <nav>
         <ul>
            <li class="footer">Copyright &copy; 2020<li>
            <li class="footer">Todos los derechos reservados.</li>
         <ul>
      </nav>
  </footer>
 </body>
</html>';
?>
