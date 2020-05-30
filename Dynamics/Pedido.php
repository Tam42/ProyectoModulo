
    <?php

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

        echo "<h2>Tu pedido</h2>";
        $newname=str_replace("_"," ",$nombre); //Se crea un formulario para que el usuario confirme su pedido y seleccione la ubicación
        echo "$newname <br> $$precio<br>
        <form action='Pedido2,1.php' method='post'>
        ¿Cuántos quieres?<br>
        <input type='number' name='cantidad' max='$disponibilidad' min='1' required><br>";
        echo "<select name='Lugar' required>";
        while($row1 = mysqli_fetch_array($respuesta2))
          echo "<option value='$row1[0]'>$row1[1]</option></ul>";
        echo "</select><br>
        <input type='hidden' name='precio' value='$precio'>";
        echo "<input type='hidden' name='alimento' value='$newname'>
        <input type='hidden' name='id_alimento' value='$pedido'>";
        echo "<input type='submit' value='Confirmar pedido'>
        </form>";
        echo "<img class='foto' src=../statics/img/menu/".$nombre.".jpg>";
        mysqli_close($conexion);
    }
    else {//Si el formulario no envio un valor se le regresa al menu
      header("Location:menu3.php");
    }
    ?>
