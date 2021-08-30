<?php
include_once("../config/database.php");

$datos = $_POST;

if ($datos['query'] == 1) {
    $resultado = $mysqli->query('SELECT EQUIPO.ID_EQUIPO, EQUIPO.NOMBRE_EQUIPO, CONCAT("Perfil " , PERFIL_EQUIPO.ID_PERFIL_EQUIPO) as "PERFIL" FROM EQUIPO INNER JOIN PERFIL_EQUIPO ON PERFIL_EQUIPO.ID_PERFIL_EQUIPO = EQUIPO.ID_PERFIL_EQUIPO INNER JOIN ESTADO_EQUIPO ON ESTADO_EQUIPO.ID_ESTADO = EQUIPO.ID_ESTADO INNER JOIN SEDE ON SEDE.ID_SEDE = EQUIPO.ID_SEDE WHERE SEDE.NOMBRE_SEDE = "' . $datos['sede'] . '" AND ESTADO_EQUIPO.NOMBRE_ESTADO = "Disponible"');

    $i = 0;
    $resultado->data_seek(0);
    $arr    =   array();
    while ($item = $resultado->fetch_assoc()) {
        $arr["data"][$i]['ID_EQUIPO']  = $item['ID_EQUIPO'];
        $arr["data"][$i]['NOMBRE_EQUIPO']  = $item['NOMBRE_EQUIPO'];
        $arr["data"][$i]['PERFIL']  = $item['PERFIL'];
        $i++;
    }

    $mysqli->close();
    echo json_encode($arr);
} else if ($datos['query'] == 2) {
    $resultado = $mysqli->query('SELECT DISTINCT PROGRAMAFUNCIONARIO.ID_PROGRAMAFUNCIONARIO, FUNCIONARIO.RUT_FUNCIONARIO,CONCAT(FUNCIONARIO.PRIMERNOMBRE_FUNCIONARIO ," " , FUNCIONARIO.PRIMERAPELLIDO_FUNCIONARIO," ", FUNCIONARIO.SEGUNDOAPELLIDO_FUNCIONARIO) as "NOMBRE" FROM PROGRAMAFUNCIONARIO INNER JOIN FUNCIONARIO ON PROGRAMAFUNCIONARIO.RUT_FUNCIONARIO = FUNCIONARIO.RUT_FUNCIONARIO INNER JOIN PROGRAMA ON PROGRAMA.ID_PROGRAMA = PROGRAMAFUNCIONARIO.ID_PROGRAMA INNER JOIN FACULTAD ON FACULTAD.ID_FACULTAD = PROGRAMA.ID_FACULTAD INNER JOIN SEDE ON SEDE.ID_SEDE = FACULTAD.ID_SEDE WHERE SEDE.NOMBRE_SEDE = "' . $datos['sede'] . '"');

    $i = 0;
    $resultado->data_seek(0);
    $arr    =   array();
    while ($item = $resultado->fetch_assoc()) {
        $arr["data"][$i]['ID_PROGRAMAFUNCIONARIO']  = $item['ID_PROGRAMAFUNCIONARIO'];
        $arr["data"][$i]['RUT_FUNCIONARIO']  = $item['RUT_FUNCIONARIO'];
        $arr["data"][$i]['NOMBRE']  = $item['NOMBRE'];
        $i++;
    }

    $mysqli->close();
    echo json_encode($arr);
} else if ($datos['query'] == 3) {
    $arr    =   array();


    $sql = $mysqli->prepare("INSERT INTO ASIGNACION (ID_EQUIPO, ID_PROGRAMAFUNCIONARIO, FECHAINICIO_ASIGNACION, FECHAFINAL_ASIGNACION, USUARIO_ASIGNACION, ESTADO_REASIGNACION, ELIMINADO_ASIGNACION) VALUES( ?, ?, ?,?,?,0,0)");

    $sql->bind_param("iisss", $datos['id_equipo'], $datos['id_programafuncionario'], $datos['fechainicio'], $datos['fechafin'], $datos['user']);

    $result = $sql->execute();
    if ($result === false) {
        $arr["success"]         =   false;
        $arr["data"]["respuesta"]   =   "Ha ocurrido un error, no se ha registrado la información de manera correcta.";
    } else {
        $sql = $mysqli->prepare("UPDATE EQUIPO SET ID_ESTADO=3 WHERE EQUIPO.ID_EQUIPO = ?");

        $sql->bind_param("i", $datos['id_equipo']);

        $result = $sql->execute();
        if ($result === false) {
            $arr["success"]         =   false;
            $arr["data"]["respuesta"]   =   "Ha ocurrido un error, no se ha registrado la información de manera correcta.";
        } else {
            $arr["success"]         =   true;
            $arr["data"]["respuesta"]   =   "Se ha registrado la información de manera correcta.";
        }
    }
    $mysqli->close();
    echo json_encode($arr);
}
