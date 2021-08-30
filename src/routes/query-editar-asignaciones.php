<?php
  include_once("../config/database.php");

  if(!$mysqli->set_charset("utf8")){
    printf("Error cargando el conjunto de caracteres utf8: %\n", $conexion->error);
    exit();
  }

  $datosE = $_POST;
  
  if ($datosE['query'] == 1){

    $resultado = $mysqli->query('SELECT ASIGNACION.ID_ASIGNACION, EQUIPO.NOMBRE_EQUIPO, 
    CONCAT("Perfil " , PERFIL_EQUIPO.ID_PERFIL_EQUIPO) AS "PERFIL", 
    CONCAT(FUNCIONARIO.PRIMERNOMBRE_FUNCIONARIO, " ", FUNCIONARIO.PRIMERAPELLIDO_FUNCIONARIO, " ", 
    FUNCIONARIO.SEGUNDOAPELLIDO_FUNCIONARIO) AS "NOMBRE_FUNCIONARIO", 
    DATE_FORMAT(ASIGNACION.FECHAINICIO_ASIGNACION, "%d/%m/%Y") AS "FECHA_INICIO", 
    DATE_FORMAT(ASIGNACION.FECHAFINAL_ASIGNACION, "%d/%m/%Y") AS "FECHA_FIN" 
    FROM ASIGNACION INNER JOIN EQUIPO 
    ON EQUIPO.ID_EQUIPO = ASIGNACION.ID_EQUIPO INNER JOIN PERFIL_EQUIPO 
    ON PERFIL_EQUIPO.ID_PERFIL_EQUIPO = EQUIPO.ID_PERFIL_EQUIPO INNER JOIN PROGRAMAFUNCIONARIO 
    ON PROGRAMAFUNCIONARIO.ID_PROGRAMAFUNCIONARIO = ASIGNACION.ID_PROGRAMAFUNCIONARIO INNER JOIN FUNCIONARIO 
    ON PROGRAMAFUNCIONARIO.RUT_FUNCIONARIO = FUNCIONARIO.RUT_FUNCIONARIO INNER JOIN SEDE 
    ON SEDE.ID_SEDE = EQUIPO.ID_SEDE WHERE SEDE.NOMBRE_SEDE = "' . $datosE['sede'] . '" AND EQUIPO.ID_ESTADO = 3');

    $i = 0;
    $resultado->data_seek(0);

    $arr = array();
    while ($item = $resultado->fetch_assoc()){
      $arr['data'][$i]['ID_ASIGNACION'] = $item['ID_ASIGNACION'];
      $arr['data'][$i]['NOMBRE_EQUIPO'] = $item['NOMBRE_EQUIPO'];
      $arr['data'][$i]['PERFIL'] = $item['PERFIL'];
      $arr['data'][$i]['NOMBRE_FUNCIONARIO'] = $item['NOMBRE_FUNCIONARIO'];
      $arr['data'][$i]['FECHA_INICIO'] = $item['FECHA_INICIO'];
      $arr['data'][$i]['FECHA_FIN'] = $item['FECHA_FIN'];
      $i++;
    }
    $mysqli->close();
    echo json_encode($arr);
  
  } else if($datosE['query'] == 2){
      $resultado = "UPDATE ASIGNACION SET FECHAINICIO_ASIGNACION = ?, 
      FECHAFINAL_ASIGNACION = ? WHERE ID_ASIGNACION = ? ";
      $statement = $mysqli->prepare($resultado);
      $statement->bind_param('ssi', $datosE['FECHA_INICIO'], $datosE['FECHA_FIN'], $datosE['ID_ASIGNACION']);
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
