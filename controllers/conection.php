<?php
 // Datos de la base de datos
 $host = "localhost";
 $user = "root";
 $pass = "";
 $dbname = "app";



 // Conexión a la base de datos
 $mysqli = new mysqli($host, $user, $pass, $dbname);

 // Verificación de la conexión
 if ($mysqli->connect_errno) {
   die("Error en la conexión a la base de datos: " . $mysqli->connect_error);
 }

 // Configuración de la codificación de caracteres
 $mysqli->set_charset("utf8");


?>
