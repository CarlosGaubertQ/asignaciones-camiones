<?php

include_once("../config/database.php");
if (!$mysqli->set_charset("utf8")) {
  printf("Error cargando el conjunto de caracteres utf8: %\n", $conexion->error);
  exit();
}

$datosM = $_POST;
$array = array();

if ($datosM['query'] == 1) {

  $resultado = $mysqli->query('SELECT MANTENCION.ID_MANTENCION, EQUIPO.NOMBRE_EQUIPO AS "NOMBRE_EQUIPO", CONCAT("Perfil ", 
  PERFIL_EQUIPO.ID_PERFIL_EQUIPO) AS "PERFIL_EQUIPO", DATE_FORMAT(MANTENCION.FECHAINICIO_MANTENCION, "%d/%m/%y") 
  AS "FECHA_INICIO", DATE_FORMAT(MANTENCION.FECHAFIN_MANTENCION, "%d/%m/%y") AS "FECHA_FIN", CONCAT(MANTENCION.DESCRIPCION_MANTENCION) 
  AS "DESCRIPCION", MANTENCION.DIAGNOSTICOTECNICO_MANTENCION AS "DIAGNOSTICO" FROM MANTENCION 
  INNER JOIN EQUIPO ON EQUIPO.ID_EQUIPO = MANTENCION.ID_EQUIPO 
  INNER JOIN SEDE ON EQUIPO.ID_SEDE = SEDE.ID_SEDE
  INNER JOIN PERFIL_EQUIPO ON PERFIL_EQUIPO.ID_PERFIL_EQUIPO = EQUIPO.ID_PERFIL_EQUIPO WHERE MANTENCION.DIAGNOSTICOTECNICO_MANTENCION IS NOT NULL AND MANTENCION.FECHAFIN_MANTENCION IS NOT NULL AND ELIMINAR_MANTENCION IS NULL AND SEDE.NOMBRE_SEDE = "' . $datosM['sede'] . '" ');

  $resultado->data_seek(0);
  $i = 0;

  while ($fila = $resultado->fetch_assoc()) {
    $arr["data"][$i]['ID_MANTENCION'] = $fila['ID_MANTENCION'];
    $arr["data"][$i]['NOMBRE_EQUIPO'] = $fila['NOMBRE_EQUIPO'];
    $arr["data"][$i]['PERFIL_EQUIPO'] = $fila['PERFIL_EQUIPO'];
    $arr["data"][$i]['FECHA_INICIO'] = $fila['FECHA_INICIO'];
    $arr["data"][$i]['FECHA_FIN'] = $fila['FECHA_FIN'];
    $arr["data"][$i]['DESCRIPCION'] = $fila['DESCRIPCION'];
    $arr["data"][$i]['DIAGNOSTICO'] = $fila['DIAGNOSTICO'];
    $i++;
  };

  $mysqli->close();
  echo json_encode($arr);
}
  else if($datosM['query'] == 2){

    $resultado = "UPDATE MANTENCION SET DESCRIPCION_MANTENCION = ?, DIAGNOSTICOTECNICO_MANTENCION = ?, FECHAFIN_MANTENCION = ?,MODIFICAR_MANTENCION = ?   WHERE ID_MANTENCION = ?";
    $statement = $mysqli->prepare($resultado);
    $statement->bind_param('ssssi', $datosM['DESCRIPCION_MANTENCION'], $datosM['DIAGNOSTICOTECNICO_MANTENCION'], $datosM['FECHAFIN_MANTENCION'],$datosM['MODIFICAR_MANTENCION'], $datosM['ID_MANTENCION']);
    $arr = array();
    $result = $statement->execute();
    if ($result === false){
      $arr["success"]         =   false;
      $arr["data"]["respuesta"]   =   "Los datos no han sido actualizados.";
    } else {
        $arr["success"]         =   true;
        $arr["data"]["respuesta"]   =   " Los datos se han actualizado de manera correcta.";
      }
  $mysqli->close();
  echo json_encode($arr);

}