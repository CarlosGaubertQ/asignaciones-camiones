<?php

include_once("../config/database.php");
if (!$mysqli->set_charset("utf8")) {
  printf("Error cargando el conjunto de caracteres utf8: %\n", $conexion->error);
  exit();
}

$datos = $_POST;
$arr = array();

if ($datos['query'] == 1) {

  $resultado = $mysqli->query('SELECT A.ID_ASIGNACION,
  E.NOMBRE_EQUIPO,
  E.ID_EQUIPO,
  CONCAT("PERFIL ", P.ID_PERFIL_EQUIPO) AS "PERFIL_EQUIPO",
  F.PRIMERNOMBRE_FUNCIONARIO,
  DATE_FORMAT( A.FECHAINICIO_ASIGNACION,"%d/%m/%Y") AS "FECHA_INICIO",
  DATE_FORMAT( A.FECHAFINAL_ASIGNACION,"%d/%m/%Y") AS "FECHA_FINAL"
  FROM ASIGNACION A 
  INNER JOIN EQUIPO E ON E.ID_EQUIPO = A.ID_EQUIPO 
  INNER JOIN PERFIL_EQUIPO P ON P.ID_PERFIL_EQUIPO = E.ID_PERFIL_EQUIPO 
  INNER JOIN PROGRAMAFUNCIONARIO PF ON PF.ID_PROGRAMAFUNCIONARIO = A.ID_PROGRAMAFUNCIONARIO 
  INNER JOIN FUNCIONARIO F ON F.RUT_FUNCIONARIO = PF.RUT_FUNCIONARIO 
  INNER JOIN SEDE S ON S.ID_SEDE = E.ID_SEDE 
  WHERE A.ID_EQUIPO = E.ID_EQUIPO AND E.ID_PERFIL_EQUIPO = P.ID_PERFIL_EQUIPO AND A.ID_PROGRAMAFUNCIONARIO = PF.ID_PROGRAMAFUNCIONARIO AND S.NOMBRE_SEDE = "' . $datos['sede'] . '" AND A.ELIMINADO_ASIGNACION != 1');

  if ($resultado===false) {
    $arr["data"]['ID_ASIGNACION'] = '';
    $arr["data"]['NOMBRE_EQUIPO'] = '';
    $arr["data"]['PERFIL_EQUIPO'] = '';
    $arr["data"]['PRIMERNOMBRE_FUNCIONARIO'] = '';
    $arr["data"]['FECHA_INICIO'] = '';
    $arr["data"]['FECHA_FINAL'] = '';
    $arr["data"]['ID_EQUIPO'] = '';
  }else{
    $resultado->data_seek(0);
    $i = 0;
  
    while ($item = $resultado->fetch_assoc()) {
      $arr["data"][$i]['ID_ASIGNACION'] = $item['ID_ASIGNACION'];
      $arr["data"][$i]['NOMBRE_EQUIPO'] = $item['NOMBRE_EQUIPO'];
      $arr["data"][$i]['PERFIL_EQUIPO'] = $item['PERFIL_EQUIPO'];
      $arr["data"][$i]['PRIMERNOMBRE_FUNCIONARIO'] = $item['PRIMERNOMBRE_FUNCIONARIO'];
      $arr["data"][$i]['FECHA_INICIO'] = $item['FECHA_INICIO'];
      $arr["data"][$i]['FECHA_FINAL'] = $item['FECHA_FINAL'];
      $arr["data"][$i]['ID_EQUIPO'] = $item['ID_EQUIPO'];
      $i++;
    };
  }
  

  $mysqli->close();
  echo json_encode($arr);

} else if ($datos['query'] == 2) {

  $sql = $mysqli->prepare("UPDATE ASIGNACION
  SET ASIGNACION.ELIMINADO_ASIGNACION = 1
  WHERE ASIGNACION.ID_ASIGNACION =  ? ");

  $sql->bind_param("i", $datos['id']);

  $result = $sql->execute();
  if ($result === false) {
    $arr["success"]         =   false;
    $arr["data"]["respuesta"]   =   "Ha ocurrido un error, no se ha registrado la información de manera correcta.";
  } else {
    $stmt2 = $mysqli->prepare('UPDATE EQUIPO SET ID_ESTADO = 2 WHERE ID_EQUIPO=' . $datos['idEquipo'] . '');
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    if ($result2 === false){
        $arr["success"]         =   false;
        $arr["data"]["respuesta"]   =   "Los datos no han sido actualizados.";
    } else {
        $arr["success"]         =   true;
        $arr["data"]["respuesta"]   =   " Los datos se han actualizado de manera correcta.";
    }
  }

  

  $mysqli->close();
  echo json_encode($arr);

}
