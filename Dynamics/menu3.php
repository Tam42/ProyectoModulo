<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Menú</title>
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
      echo "<h1>Menú</h1>";
      include("bd.php");
      $conexion = connectDB2("cafeteria");
      $consulta = "SELECT * FROM alimento"; //Connsulto todos mis registros de alimento
      $respuesta = mysqli_query($conexion, $consulta);
      while($row = mysqli_fetch_array($respuesta)){ //Cada vez que regreso al while es una nueva fila el array
        $newname=str_replace("_"," ",$row[1]);  //Para evitar problemas con los espacios en los nombres remplazo los guiones bajos con espacios en una nueva variable
        echo "<h2>$newname</h2>
        <img class='foto' src=../statics/img/menu/".$row[1].".jpg>
          <ul>
          <li>Descripcion: $row[2]</li>
          <li>Tenemos: $row[4]</li>
          <li>$$row[3]</li>
        </ul>"; //En esta lista se muestran datos especificos como nombre, precio y disponabilidad
        if ($row[4]!=0) { //En base a la disponibilidad de la base de datos se determina si se puede ofrecer el producto al usuario
          echo "<form action='Pedido.php' method='post'>
            <input type='hidden' name='pedido' value='$row[0]'>
            <input type='submit' value='Pedirlo'>
          </form><br>";//Se crea un formulario que tiene el id del alimento para posteriormente dentificar la elección del usuario
        }
        else {
          echo "Se nos terminaron<br>";  //Si se terminaron se muestra un mensaje y no se da el formulario para ese alimento
        }
      }
      mysqli_close($conexion); //Cierro mi base de datos por seguridad
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
