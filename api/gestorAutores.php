<?php
require_once __DIR__.'/../db/class.GestorDB.php';

$tarea = $_POST['tarea'];

switch($tarea) {
    case 'getAutores':
        $conexionDB = new GestorDB();

        $autores = $conexionDB->getRecordsByParams(TABLA_AUTORES,['*'],null,'apellidos, nombre ASC','FETCH_ASSOC');

        echo json_encode($autores);
        break;
}

?>
