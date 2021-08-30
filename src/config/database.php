<?php
include_once "../env.php";
$mysqli = new mysqli($HOST, $USER, $PASSWORD, $BD);
if ($mysqli->connect_errno) {
  echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
  
if(!$mysqli->set_charset("utf8")){
  printf("Error cargando el conjunto de caracteres utf8: %\n", $conexion->error);
  exit();
}


