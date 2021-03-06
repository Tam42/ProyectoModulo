<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!--El titulo que aprecera en la pestaña del navegador-->
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="../Statics/css/formularioreg.css">
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
          <li><a href="menu4.php"><i class="fa fa-cutlery"></i></a></li>
          <li><a href="../Templates/historia.html">Conócenos</a></li>
          <li><a href="../Templates/Mapa.html"><i class="fa fa-map-o"></i></a></li>
          <li><a href="../Templates/sessioncaf.html">Acceder</a></li>
          <li><a href="../Templates/RegistroCafe.html">Crear Cuenta</a></li>
        </ul>
      </nav>
     </header>
     <br>
     <br>
     <br>
     <br>
      <!--Indicar una division-->
			<div>
          <!--Insertar un php-->
          <?php
                //La variable que sera recibida del formulario de RegistroCafe.html
                $U=strip_tags($_POST['usuario']);
                //Variables de tipo cadena que seran definidas
                $A="Profesor_o_Funcionario";
                $B="Alumno";
                $C="Trabajador";
                //Condicion de si $A igual que $U hara el if
                if ($A==$U){
                  /*Imprimira un formulario que sera enviado por metodo post a ValidacionProfesorCafe.php y que el contenido del formulario sera un fieldset que lo contendra y la leyenda Ingresa, te pedira el RFC, Nombre, Apellido Paterno y Materno,
                  Te pedira tambien la fecha de nacimeinto y por medio de un select el profesor seleccionara su Colegio, y por ultimo le pedira una contraseña segura*/
                  echo"<form method='post' action='ValidacionProfesorCafe.php'>
                        <fieldset>
                          <legend><h3>Ingresa tus datos</h3></legend>
                            <br>
                            <br>
                            <p>RFC: <input type='text' name='RFC' placeholder='Ejemplo: RLH651213' pattern='^([A-ZÑ\x26]{4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$' title='Esto no es un RFC' required></p>
                            <br>
                            <br>
                            <p>Nombre: <input type='text' name='NombreProf' placeholder='Ejemplo: Carlos' pattern='[a-zA-ZÁÉÍÓÚÑáéíóúñ]{3,20}' title='Este no es un nombre' required></p>
                            <br>
                            <br>
                            <p>Apellido Paterno: <input type='text' name='apPaternoProf' placeholder='Ejemplo: Perez' pattern='[a-zA-ZÁÉÍÓÚÑáéíóúñ]{3,20}' title='Este no es un apellido' required></p>
                            <br>
                            <br>
                            <p>Apellido Materno: <input type='text' name='apMaternoProf' placeholder='Ejemplo: Hernandez' pattern='[a-zA-ZÁÉÍÓÚÑáéíóúñ]{3,20}' title='Este no es un apellido' required></p>
                            <br>
                            <br>
                            <p>Fecha de Nacimiento: <input type='date' name='nacimiento'></p>
                            <br>
                            <br>
                            <p>Colegio:
                              <select name='Colegio'>
                                <optgroup label='I'>
                                  <option>Física</option>
                                  <option>Informática</option>
                                  <option>Matemáticas</option>
                                </optgroup>
                                <optgroup label='II'>
                                  <option>Biología</option>
                                  <option>Educación_Física</option>
                                  <option>Morfología,Fisiología_y_Salud</option>
                                  <option>Orientación_Educativa</option>
                                  <option>Psicologia_e_Higiene_Mental</option>
                                  <option>Química</option>
                                </optgroup>
                                <optgroup label='III'>
                                  <option>Ciencias_Sociales</option>
                                  <option>Geografía</option>
                                  <option>Historia</option>
                                </optgroup>
                                <optgroup label='IV'>
                                  <option>Alemán</option>
                                  <option>Artes_Plásticas</option>
                                  <option>Danza</option>
                                  <option>Dibujo_y_Modelado</option>
                                  <option>Filosofía</option>
                                  <option>Francés</option>
                                  <option>Inglés</option>
                                  <option>Italiano</option>
                                  <option>Letras_Clásicas</option>
                                  <option>Literatura</option>
                                  <option>Música</option>
                                  <option>Teatro</option>
                                </optgroup>
                                <optgroup label='Otro'>
                                  <option>ETE</option>
                                </optgroup>
                              </select>
                            </p>
                            <br>
                            <br>
                            <p>Contraseña:<input type='password' name='passProf1' placeholder='Minimo 10 caracteres' pattern='[A-Za-z0-9@#$%?¡!&/=+*-]{10,25}' title='Una contraseña segura tiene uns longitud entre 10 y 25 caracteres, tiene almenos una letra mayúscula o minúscula, un dígito, o los símbolos @ # $ % ? ¡ ! & / = + * - ' required></p>
                            <br>
                            <br>
                            <input class='send' type='submit' value='Registrarse'>";
                }
                //Si el primer if no se hizo pasara al segundo en el cual revisara si $B es igual que $U, si es igual entrara
                if ($B==$U){
                  /*Imprimira un formulario que sera enviado por metodo post a ValidacionAlumnoCafe.php y que el contenido del formulario sera un fieldset que lo contendra y la leyenda Ingresa, te pedira el Numero de cuenta, Nombre, Apellido Paterno y Materno,
                  te pedira por medio de un select el alumno escogera su grupo, y por ultimo le pedira una contraseña segura*/
                  echo"<form method='post' action='ValidacionAlumnoCafe.php'>
                        <fieldset>
                          <legend><h3>Ingresa tus datos</h3></legend>
                            <br>
                            <br>
                            <p>Numero de Cuenta: <input type='text' name='NumCuenta' placeholder='Ejemplo: 319141887' pattern='[319, 318, 320, 116, 115, 117]{3}\d{6}' title='Tiene que contener exactamente 9 digitos y con los numeros iniciales validos' required></p>
                            <br>
                            <br>
                            <p>Nombre: <input type='text' name='NombreAl' placeholder='Ejemplo: Carlos' pattern='[a-zA-ZÁÉÍÓÚÑáéíóúñ]{3,20}' title='Este no es un nombre' required></p>
                            <br>
                            <br>
                            <p>Apellido Paterno: <input type='text' name='apPaternoAl' placeholder='Ejemplo: Perez' pattern='[a-zA-ZÁÉÍÓÚÑáéíóúñ]{3,20}' title='Este no es un apellido' required></p>
                            <br>
                            <br>
                            <p>Apellido Materno: <input type='text' name='apMaternoAl' placeholder='Ejemplo: Hernandez' pattern='[a-zA-ZÁÉÍÓÚÑáéíóúñ]{3,20}' title='Este no es un apellido' required></p>
                            <br>
                            <br>
                            <p>Grupo:
                              <select name='Grupo'>
                                <optgroup label='Cuarto'>
                                  <option>401</option> <option>402</option> <option>403</option> <option>404</option> <option>405</option>
                                  <option>406</option> <option>407</option> <option>408</option> <option>409</option> <option>410</option>
                                  <option>411</option> <option>412</option> <option>413</option> <option>414</option> <option>415</option>
                                  <option>416</option> <option>417</option> <option>451</option> <option>452</option> <option>453</option>
                                  <option>454</option> <option>455</option> <option>456</option> <option>457</option> <option>458</option>
                                  <option>459</option> <option>460</option> <option>461</option> <option>462</option> <option>463</option>
                                  <option>464</option> <option>465</option>
                                </optgroup>
                                <optgroup label='Quinto'>
                                  <option>501</option> <option>502</option> <option>503</option> <option>504</option> <option>505</option>
                                  <option>506</option> <option>507</option> <option>508</option> <option>509</option> <option>510</option>
                                  <option>511</option> <option>512</option> <option>513</option> <option>514</option> <option>515</option>
                                  <option>516</option> <option>517</option> <option>518</option> <option>551</option> <option>552</option>
                                  <option>553</option> <option>554</option> <option>555</option> <option>556</option> <option>557</option>
                                  <option>558</option> <option>559</option> <option>560</option> <option>561</option> <option>562</option>
                                  <option>563</option> <option>564</option>
                                </optgroup>
                                <optgroup label='Sexto'>
                                  <option>601</option> <option>602</option> <option>603</option> <option>604</option> <option>605</option>
                                  <option>606</option> <option>607</option> <option>608</option> <option>609</option> <option>610</option>
                                  <option>611</option> <option>612</option> <option>613</option> <option>614</option> <option>615</option>
                                  <option>616</option> <option>617</option> <option>618</option> <option>619</option> <option>651</option>
                                  <option>652</option> <option>653</option> <option>654</option> <option>655</option> <option>656</option>
                                  <option>657</option> <option>658</option> <option>659</option> <option>660</option> <option>661</option>
                                  <option>662</option> <option>663</option> <option>664</option>
                                </optgroup>
                              </select>
                            </p>
                            <br>
                            <br>
                            <p>Contraseña:<input type='password' name='passAl1' placeholder='Minimo 10 caracteres' pattern='[A-Za-z0-9@#$%]{10,25}' title='Una contraseña segura tiene uns longitud entre 10 y 25 caracteres, tiene almenos una letra mayúscula o minúscula, un dígito, o los símbolos '@', '#', '$' y '%'' required></p>
                            <br>
                            <br>
                            <input class='send' type='submit' value='Registrarse'>";
                }
                //Si no entro a la segunda condicion revisara si $C es igual a $U, si es igual entrara
                if ($C==$U){
                  /*Imprimira un formulario que sera enviado por metodo post a ValidacionTrabajadorCafe.php y que el contenido del formulario sera un fieldset que lo contendra y la leyenda Ingresa, te pedira el Numero de Trabajador, Nombre, Apellido Paterno y Materno,
                  y por ultimo le pedira una contraseña segura*/
                  echo"<form method='post' action='ValidacionTrabajador.php'>
                        <fieldset>
                          <legend><h3>Ingresa tus datos</h3></legend>
                            <br>
                            <br>
                            <p>Numero de Trabajador: <input type='text' name='NumTrab' placeholder='Ejemplo: 562310'pattern='\d{6}' title='Tiene que contener exactamente 6 digitos' required></p>
                            <br>
                            <br>
                            <p>Nombre: <input type='text' name='NombreTrab' placeholder='Ejemplo: Carlos' pattern='[a-zA-ZÁÉÍÓÚÑáéíóúñ]{3,20}' title='Este no es un nombre' required></p>
                            <br>
                            <br>
                            <p>Apellido Paterno: <input type='text' name='apPaternoTrab' placeholder='Ejemplo: Perez' pattern='[a-zA-ZÁÉÍÓÚÑáéíóúñ]{3,20}' title='Este no es un apellido' required></p>
                            <br>
                            <br>
                            <p>Apellido Materno: <input type='text' name='apMaternoTrab' placeholder='Ejemplo: Hernandez' pattern='[a-zA-ZÁÉÍÓÚÑáéíóúñ]{3,20}' title='Este no es un apellido' required></p>
                            <br>
                            <br>
                            <p>Contraseña:<input type='password' name='passTrab1' placeholder='Minimo 10 caracteres' pattern='[A-Za-z0-9@#$%]{8,20}' title='Una contraseña segura tiene uns longitud entre 10 y 25 caracteres, tiene almenos una letra mayúscula o minúscula, un dígito, o los símbolos '@', '#', '$' y '%'' required></p>
                            <br>
                            <br>
                            <input class='send' type='submit' value='Registrarse'>";
                }
          ?>
          </fieldset>
        </form>
      </div>
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
