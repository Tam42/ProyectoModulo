<?php
include("bd.php");
//CONEXIONES
//Obtener la conexión luego la base
$con = connect();
if(!$con)
  die("No se ha podido conectar al servidor.");
else
{
  $db = connectDB1($con, "cafeteria");
}
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
  $consulta = "SELECT * FROM pedidos";  //se hace una consulta a la base
  $respuesta = mysqli_query($conexion, $consulta);
  while($row = mysqli_fetch_array($respuesta))
  {
    echo "Id_pedido: ".$row['id_pedido']."<br>";  //se imprimen los datos
    echo "Nombre: ".$row[1]."<br>";
    echo "NC: ".$row[2]."<br>";
    echo "Cantidad: ".$row[3]."<br>";
    echo "Pago: ".$row[4]."<br>";
    echo "Estado: ";
    $value = 'En proceso';
    setcookie("TestCookie", $value); //se genera una cookie con el tiempo del pedido
    setcookie("TestCookie", $value, time()+60*15);
    if(isset($_COOKIE['TestCookie']))
    {
      echo $_COOKIE['TestCookie'];
      echo "<br>";
      echo "Su pedido esta en proceso";
      echo "<br>";
      date_default_timezone_set("America/Mexico_City");
      $date=date("d-m-Y h:i:s A");
      echo "Hora actual: ".$date;
      echo "<br/>";
      echo "Hora de etrega de pedido: ".date("d-m-Y (H:i:s) A", time() + 60*15);
      echo "<br/>";
      echo "Al dar la hora de entrega de pedido, favor de recargar la página para saber si el pedido ha finalizado.";
    }
    else
    {
    	echo "Pedido finalizado";    //el supervisor elijiré si se entregó o no
      echo "<form action='cafeteria.php' method='post'>";
      echo "  <input type='submit' name='entregado' value= 'se entregó'>";
      echo "  <input type='submit' name='no entregado' value= 'no se entregó'>";
      echo "</form>";
    }
  }
}
?>
