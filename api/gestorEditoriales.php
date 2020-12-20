<?php
require_once __DIR__.'/../db/class.GestorDB.php';

$tarea = $_POST['tarea'];

switch($tarea) {
    case 'getEditoriales':
        $conexionDB = new GestorDB();

        $editoriales = $conexionDB->getRecordsByParams(TABLA_EDITORIALES,['*'],null,'nombre ASC','FETCH_ASSOC');

        echo json_encode($editoriales);
        break;
}

?>
