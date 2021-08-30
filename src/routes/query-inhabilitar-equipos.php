<?php
    include_once('../config/database.php');

    if(!$mysqli->set_charset("utf8")){
        printf("Error cargando el conjunto de caracteres utf8: %\n", $conexion->error);
        exit();
    }

    $datosE=$_POST;
    
    if ($datosE['query'] == 0){
        $nom_sede = $datosE['sede'];
        $stmt = $mysqli->prepare('SELECT E.ID_EQUIPO, E.NOMBRE_EQUIPO, 
        EE.NOMBRE_ESTADO,CONCAT("Perfil " , E.ID_PERFIL_EQUIPO) AS ID_PERFIL_EQUIPO
        FROM EQUIPO AS E 
        INNER JOIN ESTADO_EQUIPO AS EE ON EE.ID_ESTADO = E.ID_ESTADO
        INNER JOIN SEDE AS S ON S.ID_SEDE = E.ID_SEDE
        LEFT OUTER JOIN MANTENCION AS M ON M.ID_EQUIPO = E.ID_EQUIPO
        WHERE S.NOMBRE_SEDE="' . $nom_sede . '"
        AND EE.NOMBRE_ESTADO <> "Inhabilitado"
        AND EE.NOMBRE_ESTADO <> "Asignado"
		AND M.FECHAFIN_MANTENCION IS NULL');
        $stmt->execute();
        $result = $stmt->get_result();
        $i = 0;
        $arr= array();
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $arr["data"][$i]['ID_EQUIPO'] = $row['ID_EQUIPO'];
            $arr["data"][$i]['NOMBRE_EQUIPO'] = $row['NOMBRE_EQUIPO'];
            $arr["data"][$i]['NOMBRE_ESTADO'] = $row['NOMBRE_ESTADO'];
            $arr["data"][$i]['ID_PERFIL_EQUIPO'] = $row['ID_PERFIL_EQUIPO'];
            $i++;
        }
        $mysqli->close();
        echo json_encode($arr);

    }else if ($datosE['query'] == 1){
        $stmt2 = $mysqli->prepare('UPDATE EQUIPO SET ID_ESTADO = 1 WHERE ID_EQUIPO=' . $datosE['ID_EQUIPO']);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        if($datosE['NOMBRE_ESTADO'] == 'Mantención'){
            $stmt3 = $mysqli->prepare('UPDATE MANTENCION SET FECHAFIN_MANTENCION = "' . $datosE['FECHAFIN_MANTENCION']  . '" WHERE ID_EQUIPO= ' . $datosE['ID_EQUIPO']);
            $stmt3->execute();
            $result3 = $stmt3->get_result();
        }
        if ($result2 === false){
            $arr["success"]         =   false;
            $arr["data"]["respuesta"]   =   "Los datos no han sido actualizados.";
        } else {
            $arr["success"]         =   true;
            $arr["data"]["respuesta"]   =   " Los datos se han actualizado de manera correcta.";
        }
        $mysqli->close();
        echo json_encode($arr);
    }
    ?>                 
<?php
?>
