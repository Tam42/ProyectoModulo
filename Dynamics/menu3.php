<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style media="screen">
      li{
        font-family: cursive;
      }
      .foto {
        width: 300px;
        margin-top:25px;
        margin-left:25px;
      }
    </style>
    <title>Menú</title>
  </head>
  <body>
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
  </body>
</html>
