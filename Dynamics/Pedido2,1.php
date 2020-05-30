<?php
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

  //Profesor
  elseif($tipo="profesor") {
    $consulta = "SELECT nombre FROM profesor_o_funcionario WHERE RFC=$usuario";
    $respuesta = mysqli_query($conexion, $consulta);
    $row=mysqli_fetch_array($respuesta);
    $nombre=$row[0];
    $consulta="INSERT INTO pedido (id_alimento,RFC,id_lugar) VALUES ($id_alimento,$usuario,$id_lugar)";
    mysqli_query($conexion,$consulta);
    $total=$precio*$disponibilidad;
    echo "<br>Hola! $nombre tu pedido es el siguiente:<br> $alimento<br>
    Precio individual: $precio<br> Pediste:$disponibilidad<br> Total:$$total<br> Lo recogeras en: $NLugar";
  }


  mysqli_close($conexion);



?>
