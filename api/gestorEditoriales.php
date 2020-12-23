<?php
require_once __DIR__ . '/../db/class.GestorDB.php';
require_once __DIR__ . '/../class/class.Editorial.php';

$tarea = $_POST['tarea'];

switch ($tarea) {
    case 'getEditoriales':
        $conexionDB = new GestorDB();

        $editoriales = $conexionDB->getRecordsByParams(TABLA_EDITORIALES, ['*'], null, 'nombre ASC', 'FETCH_ASSOC');

        echo json_encode($editoriales);
        break;


    case 'getEditorial':
        $id = $_POST['id'];
        $editorial = new Editorial($id);
        echo json_encode($editorial->getAtributos());
        break;


    case 'addEditorial':
        $editorial = new Editorial();
        $editorial->nombre = $_POST['nombre'];

        $respuesta = array();
        $guardado = $editorial->guardar();

        if ($guardado) {
            $respuesta['exito'] = 1;
            $respuesta['mensaje'] = 'El editorial ha sido creado con éxito';
        } else {
            $respuesta['exito'] = 0;
            $respuesta['mensaje'] = 'Ha ocurrido un error al intentar guardar el editorial.';

            if ($guardado instanceof PDOException) {
                // Añade al log de errores el mensaje de la excepción
                $respuesta['mensaje'] .= ' ' . $guardado->getMessage();
            }
        }
        echo json_encode($respuesta);
        break;


    case 'updateEditorial':

        $editorial = new Editorial($_POST['id']);
        $editorial->nombre = $_POST['nombre'];

        $respuesta = array();
        $guardado = $editorial->guardar();

        if ($guardado) {
            $respuesta['exito'] = 1;
            $respuesta['mensaje'] = 'El editorial ha sido editado con éxito';
        } else {
            $respuesta['exito'] = 0;
            $respuesta['mensaje'] = 'Ha ocurrido un error al intentar guardar el editorial.';

            if ($guardado instanceof PDOException) {
                // Añade al log de errores el mensaje de la excepción
                $respuesta['mensaje'] .= ' ' . $guardado->getMessage();
            }
        }

        echo json_encode($respuesta);
        break;


        case 'deleteEditorial':
            $id = $_POST['idEditorial'];
            $editorial = new Editorial($id);
    
            $respuesta = array();
            $eliminado = $editorial->eliminar();
            if ($eliminado) {
                $respuesta['exito'] = 1;
                $respuesta['mensaje'] = 'El editorial ha sido eliminado con éxito';
            } else {
                $respuesta['exito'] = 0;
                $respuesta['mensaje'] = 'Ha ocurrido un error al intentar eliminar el editorial.';
    
                if ($eliminado instanceof PDOException) {
                    // Añade al log de errores el mensaje de la excepción
                    $respuesta['mensaje'] .= ' ' . $eliminado->getMessage();
                }
            }
            echo json_encode($respuesta);


            break;




}
