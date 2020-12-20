<?php
require_once __DIR__ . '/../db/class.GestorDB.php';

$tarea = $_POST['tarea'];

switch ($tarea) {

    case 'getAutor':
        $id = $_POST['id'];

        $autor = new Autor($id);

        echo json_encode($autor->getAtributos());
        break;


    case 'getAutores':
        $conexionDB = new GestorDB();

        $autores = $conexionDB->getRecordsByParams(TABLA_AUTORES, ['*'], null, 'apellidos, nombre ASC', 'FETCH_ASSOC');

        echo json_encode($autores);
        break;
        

    case 'deleteAutor':
        $id = $_POST['idAutor'];
        $autor = new Autor($id);
      
        $respuesta = array();
        $eliminado = $autor->eliminar();
        if ($eliminado) {
            $respuesta['exito'] = 1;
            $respuesta['mensaje'] = 'El autor ha sido eliminado con éxito';
        } else {
            $respuesta['exito'] = 0;
            $respuesta['mensaje'] = 'Ha ocurrido un error al intentar eliminar el autor.';

            if ($eliminado instanceof PDOException) {
                // Añade al log de errores el mensaje de la excepción
                $respuesta['mensaje'] .= ' ' . $eliminado->getMessage();
            }
        }

        echo json_encode($respuesta);
        break;
}
