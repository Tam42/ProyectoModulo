<?php
//Destruye sesión
   session_start();
   session_unset();
   session_destroy();
  header("Location: ../Templates/Principal.html");
 ?>
