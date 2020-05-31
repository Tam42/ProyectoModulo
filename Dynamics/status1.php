<?php
//Cabecera
$value = $_POST['progreso'];

//Crea cookie
setcookie("TestCookie", $value);
setcookie("TestCookie", $value, time()+60);

//Imprime header
echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  	<title>Status</title>
    <link rel="stylesheet" type="text/css" href="../Statics/css/sesion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sacramento">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo+2">
  </head>
  <body>
    <!--Header-->
    <header>
      <a id="logo-header" href="../Templates/Principal.html"><img src="../Statics/img/logo.png" class="logo">
		  </a>
	    <nav>
		    <ul>
          <li><a href="../Templates/privacidad.html">Privacidad</a></li>
			    <li><a href="logout.php">Cerrar sesión</a></li>
		    </ul>
	    </nav>
    </header>
	 <br>
	 <br>
	 <br>
	 <br>
';

//Condición que verifica si la cookie existe
if(isset($_COOKIE["TestCookie"])){
	//Si es verdadero imprime el # de pedido, el status del pedido, la hora y la hora propuesta para la entrega del pedido
    echo "<h1>".$_COOKIE["TestCookie"]."</h1>";
    echo "<br>";
    echo "<br>";
		echo "<p>Gracias por su compra.</p>";
		echo "<br>";
		echo "<p>STATUS DEL PEDIDO:</p>";
		echo "<br>";
		echo "<p>Su pedido esta en proceso.</p>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br/>";
		date_default_timezone_set("America/Mexico_City");
		$date=date("d-m-Y h:i:s", time());
		echo "<p>Hora actual: ".$date. "</p>";
		echo "<br/>";
		echo "<p>Hora de etrega de pedido: ".date("d-m-Y H:i:s", time() + 60*15)."</p>";
		echo "<br/>";
		echo "<p>Al dar la hora de entrega de pedido, favor de recargar la página para saber si el pedido ha finalizado.</p>";
	}
  //Si la cookie no existe
  else{
	  //Imprime el status del pedido y manda al usuario a cerrar sesión
	    echo "<h1>Pedido finalizado</h1>";
	    echo "<br/>";
			echo "<br/>";
			echo "<p><a href='logout.php'>Cerrar sesión</a><p>";
		}

//Imprime footer
echo '<footer>
	<nav>
		<ul>
			<li class="footer">Copyright &copy; 2020<li>
			<li class="footer">Todos los derechos reservados.</li>
		<ul>
	 </nav>
</footer>';
?>
