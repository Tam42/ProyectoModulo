<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cafeteria</title>
  </head>
  <body>
    <?php
      include("bd.php");
      //Conexion más base y despliegue de errores
      $conexion = connectDB2("cafeteria");
      if(!$conexion)
      {
        echo mysqli_connect_error()."<br>";
        echo mysqli_connect_errno()."<br>";
        exit();
      }
      else
      {
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['tipo'] = $_POST['tipo'];
        $_SESSION['categoria'] = $_POST['categoria'];
        if ( !isset($_SESSION['usuario']) && !isset($_POST['usuario'])) //por si no ha ingresado un usuario
        {
          header("Location: sessioncaf.php");
        }
        if (isset($_POST['usuario']))
        {
          $entregado="";
          $no_entregado="";
          if(isset($_POST['entregado']))$entregado=$_POST['entregado'];//por lo de la cookie del supervisor
          if(isset($_POST['no entregado']))$entregado=$_POST['no entregado'];
          if($entregado)
          {
            "INSERT INTO status VALUES ('entregado')";
          }
          if($no_entregado)
          {
            "INSERT INTO status VALUES ('no entregado')"; //si no es recogida la orden
            $dia=date("D");
            if($dia=="Mon")
            {
              setcookie("bloquear","usuario", time() + 60*60*24*5);//por si es en lunes
            }
            else
            {
              setcookie("bloquear","usuario", time() + 60*60*24*7);//por otro dia
            }
            if(isset($_COOKIE["bloquear"]))
            {
              echo "EL usuario ha sido bloqueado";
            }
          }
          $categoria = $_SESSION['categoria'];
          $eleccion = $_SESSION['tipo'];
          $User= $_SESSION['usuario'];
          if ($categoria == "alumno")
          {
            $dato="numero_de_cuenta";
          }
          if ($categoria == "profesor_o_funcionario")
          {
            $dato="rfc";
          }
          if ($categoria == "trabajador")
          {
            $dato="numero_de_trabajador";
          }
          $cons2="SELECT password FROM $categoria WHERE $dato='$User'"; //consulta para la contraseña
          $result2 = $conexion -> query($cons2);
          while($fila= mysqli_fetch_array ($result2)){
            $fin= $fila[0];
          }
          if(!isset($fin))
          {
            echo "Esta categoria no es adecuada <br>";
          }
          else
          {
            $Pass=substr("$fin", 3);
          }
          if ($eleccion == "Cliente")
          {
            $cons="SELECT * FROM $categoria WHERE $dato='$User'"; //primera consulta para el usuario
            $result = $conexion -> query($cons);
            $count= mysqli_num_rows($result);
            if($count==1)
            {
              if (password_verify($_POST['contraseña'], $Pass)) //se verifica la contraseña
              {
                session_start();
                Header('Location: menu3.php');
              }
              else
              {
                echo "No es la contraseña<br>";
              }
            }
            else
            {
              echo "Usuario no valido";
            }
          }
          if ($eleccion == "Supervisor de pedidos")
          {
            $cons="SELECT * FROM supervisor WHERE usuario_supervisor='$User'";
            $result = $conexion -> query($cons);
            $count= mysqli_num_rows($result);
            if($count==1)
            {
              if (password_verify($_POST['contraseña'], $Pass))
              {
                session_start();
                Header('Location: supervisor.php');
              }
              else
              {
                echo "No es la contraseña<br>";
              }
            }
            else
            {
              echo "Usuario no valido";
            }
          }
          if ($eleccion == "Administrador de sistemas")
          {
            $cons="SELECT * FROM administrador WHERE usuario_administrador='$User'";
            $result = $conexion -> query($cons);
            $count= mysqli_num_rows($result);
            if($count==1)
            {
              if (password_verify($_POST['contraseña'], $Pass))
              {
                session_start();
                Header('Location: agrega.php');
              }
              else
              {
                echo "No es la contraseña<br>";
              }
            }
            else
            {
              echo "Usuario no valido";
            }
          }
        }
      }
    ?>
  </body>
  </html>
