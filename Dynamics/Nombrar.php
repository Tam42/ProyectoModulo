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
$nombre=(isset($_POST['Nombre']) && $_POST['Nombre'] !="") ? $_POST['Nombre']:"";
$descripcion=(isset($_POST['Descripcion']) && $_POST['Descripcion'] !="") ? $_POST['Descripcion']:"";
$disponibilidad=(isset($_POST['Disponibilidad']) && $_POST['Disponibilidad'] !="") ? $_POST['Disponibilidad']:"";
$precio=(isset($_POST['Precio']) && $_POST['Precio'] !="") ? $_POST['Precio']:"";
$id_alimento="  ";

$dir_subida = '../statics/img/menu/';
$archivo = $dir_subida . basename($_FILES['archivo']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo)) {
  echo "El fichero es válido y se subió con éxito.\n";
} else {
  echo "¡Posible ataque de subida de ficheros!\n";
}
$name=str_replace(" ","_",$nombre);
$archivo=rename("$archivo", "../statics/img/menu/"."$name".".jpg");


$conexion = connectDB2("cafeteria");
if(!$conexion) {
  echo mysqli_connect_error()."<br>";
  echo mysqli_connect_errno()."<br>";
  exit();
}
else {
  echo "Ingresaste a la base de datos";
  $consulta1= "SELECT id_alimento FROM alimento ORDER by id_alimento DESC LIMIT 1";
  $respuesta1= mysqli_query($conexion, $consulta1);
  $row=mysqli_fetch_array($respuesta1);
  if (mysqli_fetch_array($respuesta1)===NULL) {
    $id_alimento=$row[0]+1;
    echo "$id_alimento jjjjjjjjjj";
  }
  else {
    $id_alimento=1;
    echo "$id_alimento";
  }
  $sql="";
  $sql = sprintf("INSERT INTO alimento (id_alimento, Nombre_alimento, disponibilidad, precio, descripcion) VALUES ('%d','%s', '%d', '%s', '%s')",
        $id_alimento,
        $name,
        $disponibilidad,
        $precio,
        $descripcion);
  if (mysqli_query($conexion, $sql)) {
    echo "yeiii";
  }
  else {
    echo ":c $sql <br>";
  }
}


$consulta = "SELECT * FROM prueba";
$respuesta = mysqli_query($conexion, $consulta);

/*while($row = mysqli_fetch_array($respuesta)){
  echo "<br>id_alimento: ".$row['id_alimento']."<br>";
  echo "alimento: ".$row[1]."<br>";
  echo "Descripcion: ".$row[2]."<br>";
  echo "Precio: ".$row[3]."<br>";
  echo "Disponibilidad: ".$row[4]."<br>";

}*/




mysqli_close($conexion);
header("Location:../templates/Agregar.php")


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
