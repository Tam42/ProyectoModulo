<?php
  include("bd.php");
  $condenado=(isset($_POST['Eliminar']) && $_POST['Eliminar'] !="") ? $_POST['Eliminar']:"No ingresaste un ID";
  $muerto=(isset($_POST['Usuario']) && $_POST['Usuario'] !="") ? $_POST['Usuario']:"No ingresaste un Usuario";
  $tipo=(isset($_POST['Tipo']) && $_POST['Tipo'] !="") ? $_POST['Tipo']:"No ingresaste un tipo de usuario";
  $conexion = connectDB2("cafeteria");
  if (connectDB2("cafeteria")) {
    echo "dentro";
  }
  if ($condenado!="No ingresaste un ID") {
    $consulta="DELETE FROM alimento WHERE id_alimento= '$condenado'";
    $respuesta=mysqli_query($conexion,$consulta);
    echo $condenado;

  }
  if ($muerto!="No ingresaste un Usuario" && $tipo!="No ingresaste un tipo de Usuario") {
    if ($tipo=="Profesor") {
      $consulta="DELETE FROM profesor_o_funcionario WHERE RFC= '$muerto'";
      $respuesta=mysqli_query($conexion,$consulta);
      echo "<br>$muerto y $tipo" ;
    }
    if ($tipo=="Alumno") {
      $consulta="DELETE FROM alumno WHERE numero_de_cuenta= '$muerto'";
      $respuesta=mysqli_query($conexion,$consulta);
      echo "<br>$muerto y $tipo" ;
    }
    if ($tipo=="Trabajador") {
      $consulta="DELETE FROM trabajador WHERE numero_de_trabajador= '$muerto'";
      $respuesta=mysqli_query($conexion,$consulta);
      echo "<br>$muerto y $tipo" ;
    }
  }

  mysqli_close($conexion);
  header("Location:../templates/Agregar.php")
/**/
?>
