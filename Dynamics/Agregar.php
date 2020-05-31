<!DOCTYPE html>
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
   <!--Primer Formulario-->
    <div>
      <fieldset>
        <legend><h3>Agregar producto</h3></legend>
        <form enctype="multipart/form-data" action="../dynamics/Nombrar.php" method="POST">
          Nombre del alimento
          <br><input type="text" name="Nombre" value=""><br>
          <br>Descripción del alimento
          <br><textarea name="Descripcion" maxlength="70" rows="4"></textarea><br>
          <br>Precio del alimento
          <br><input type="number" name="Precio" value=""><br>
          <br>Cantidad disponible
          <br><input type="number" name="Disponibilidad" value=""><br>
          <br>Imagen
          <br><input type="file" name="archivo" value="archivo"><br>
          <br> <input type="submit" name="" value="Subir">
        </form>
      </fieldset>
    </div>
    <!--Segundo Formulario-->
    <div>
      <fieldset>
        <legend><h3>Eliminar producto</h3></legend>
        <form class="" action="../dynamics/borrar.php" method="post">
          Id del alimento por eliminar <br>
          <input type="number" name="Eliminar" value="" max="9999"> <br><br>
          <input type="submit" name="" value="Borrar">
        </form>
      </fieldset>
    </div>
    <!--PHP-->
    <?php
      include("../dynamics/bd.php");//Llamamos al php que tiene nuestras funciones
      $conexion = connectDB2("cafeteria");//Nos conectamos a la base de datos


      $consulta = "SELECT * FROM alimento";
      $respuesta = mysqli_query($conexion, $consulta);

      while($row = mysqli_fetch_array($respuesta)){ //De nuestra base de datos tomamos los valores y se muestran en una lista para que el administrador tenga una mejor percepción de los productos
        $newname=str_replace("_"," ",$row[1]);   //En la base de datos los espacios se guardaron con un _ asi que los remplazamos antes de mostrarlos
        echo "<table>
          <ul>
            <li>ID: $row[0]</li>
            <li>Alimento: $newname</li>
            <li>Cantidad: $row[4]</li>
            <li>Precio: $$row[3]</li>
            <li>Descripcion: $row[2]</li>
            <img class='fotito' src=../statics/img/menu/".$row[1].".jpg>
          </ul>
        </table>";

      }

    ?>
    <!--Tercer Formulario-->
    <div>
      <fieldset>
        <legend><h3>Eliminar usuario</h3></legend>
        <form class="" action="../dynamics/borrar.php" method="post">
        <select class="" name="Tipo">
          <option value="Alumno">Alumno</option>
          <option value="trabajdor">Trabajador</option>
          <option value="Profesor">Profesor o funcionario</option>
        </select><br>
          Tipo de usuario por eliminar <br>
          <input type="text" name="Usuario" value=""> <br>
          Id del alimento por eliminar <br>
          <input type="submit" name="" value="Borrar">
        </form>
      </fieldset>
    </div>
    <br>
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
