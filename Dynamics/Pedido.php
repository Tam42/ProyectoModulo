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
      $conexion = connectDB2("cafeteria");
      $pedido=(isset($_POST['pedido']) && $_POST['pedido'] !="") ? $_POST['pedido']:"no";


      if ($pedido!="no") {
        $consulta2="SELECT * FROM direccion_de_entrega";  //Establecemos una consulta para poder mostrar las opciones de entrega
        $respuesta2 = mysqli_query($conexion, $consulta2);

        $consulta = "SELECT Nombre_alimento,disponibilidad,precio FROM alimento WHERE id_alimento=$pedido"; //Se conuslta la informacion del alimento que selecciono en el menu
        $respuesta = mysqli_query($conexion, $consulta);
        $row=mysqli_fetch_array($respuesta);
        $nombre=$row[0];
        $disponibilidad=$row[1];
        $precio=$row[2];

        echo "<h2>Tu pedido</h2><br><br><br>";
        $newname=str_replace("_"," ",$nombre); //Se crea un formulario para que el usuario confirme su pedido y seleccione la ubicación
        echo "$newname <br><br> $$precio<br><br>
        <form action='Pedido2,1.php' method='post'>
        ¿Cuántos quieres?<br><br>
        <input type='number' name='cantidad' max='$disponibilidad' min='1' required><br><br>";
        echo "<select name='Lugar' required>";
        while($row1 = mysqli_fetch_array($respuesta2))
          echo "<option value='$row1[0]'>$row1[1]</option></ul>";
        echo "</select><br>
        <input type='hidden' name='precio' value='$precio'><br><br>";
        echo "<input type='hidden' name='alimento' value='$newname'>
        <input type='hidden' name='id_alimento' value='$pedido'><br><br>";
        echo "<input type='submit' value='Confirmar pedido'><br><br><br>
        </form>";
        echo "<img class='foto' src=../statics/img/menu/".$nombre.".jpg><br><br>";
        mysqli_close($conexion);
    }
    else {//Si el formulario no envio un valor se le regresa al menu
      header("Location:menu3.php");
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
