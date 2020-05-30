<?php
include("bd.php");

  $conexion = connectDB2("prueba3");
  if(!$conexion) {
    echo mysqli_connect_error()."<br>";
    echo mysqli_connect_errno()."<br>";
    exit();
  }
  else {

    $PK=$_POST['NumCuenta'];
    $Name= $_POST['NombreAl'];
    $ApPt= $_POST['apPaternoAl'];
    $ApMt= $_POST['apMaternoAl'];
    $Gr= $_POST['Grupo'];
    $Pass= password_hash($_POST['passProf1'], PASSWORD_BCRYPT);

    $sal = rand();
    echo "$sal";
    $password_con_sal_hasheados = $Pass+$sal;
    echo"$password_con_sal_hasheados";

    $sql = "INSERT INTO alumno VALUES ('$PK', \"$Name\", \"$ApPt\", \"$ApMt\", \"$Gr\", \"$Pass\" )";
    if(mysqli_query($conexion, $sql)){
      echo "Insercion exitosa";
    }
    else{
      echo "Registro existente o hubo un problema inentelo mas tarde :(";
    }
  }
 ?>
