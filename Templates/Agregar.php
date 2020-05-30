<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style media="screen">
      div{
        width: 300px;
        margin-left:25%;
        margin-right:25%;
        margin-top:auto;
        margin-button:auto;
      }
      textarea{
        resize: none;
      }
      .fotito{
        width: 100px
      }
    </style>
    <title>Agregar</title>
  </head>
  <body>
    <div>
      <fieldset>
        <legend><h2>Agregar producto</h2></legend>
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
    <div>
      <fieldset>
        <legend><h2>Eliminar producto</h2></legend>
        <form class="" action="../dynamics/borrar.php" method="post">
          <input type="number" name="Eliminar" value="" max="9999"> <br>
          Id del alimento por eliminar <br>
          <input type="submit" name="" value="Borrar">
        </form>
      </fieldset>
    </div>
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
    <div>
      <fieldset>
        <legend><h2>Eliminar usuario</h2></legend>
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
  </body>
</html>
