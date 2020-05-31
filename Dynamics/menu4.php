<?php

//Cabecera y header
echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!--El titulo que aprecera en la pestaña del navegador-->
    <title>Registro</title>
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
        <li><a href="menu4.php"><i class="fa fa-cutlery"></i></a></li>
        <li><a href="../Templates/historia.html">Conócenos</a></li>
        <li><a href="../Templates/Mapa.html"><i class="fa fa-map-o"></i></a></li>
        <li><a href="../Templates/sessioncaf.html">Acceder</a></li>
        <li><a href="../Templates/RegistroCafe.html">Crear Cuenta</a></li>
        </ul>
      </nav>
     </header>
     <br>
     <br>
     <br>
     <br>';

  include("bd.php");
  $conexion = connectDB2("cafeteria");
  $consulta = "SELECT Nombre_alimento FROM alimento";
  $respuesta = mysqli_query($conexion, $consulta);
  echo "<h3>Menu Coyo Terraza</h3>";
  while($row = mysqli_fetch_array($respuesta)){ //Cada vez que regreso al while es una nueva fila el array
      echo "<br><h3>$row[0]</h3>";
      echo "<br><img margin-left=25px width=200px class='foto' src=../Statics/img/menu/".$row[0 ].".jpg><br>";
  }

  //Footer
   echo'<footer>
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
