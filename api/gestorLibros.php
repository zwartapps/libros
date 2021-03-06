<?php
require_once __DIR__ . '/../db/class.GestorDB.php';
require_once __DIR__ . '/../class/class.Libro.php';

$tarea = $_POST['tarea'];

switch ($tarea) {
    case 'getLibro':
        $id = $_POST['id'];
        $libro = new Libro($id);
        echo json_encode($libro->getAtributos());
        break;

    case 'getLibros':
        $conexionDB = new GestorDB();
        $libros = $conexionDB->getRecordsByParams(TABLA_LIBROS, ['*'], null, 'titulo ASC', 'FETCH_ASSOC');
        echo json_encode($libros);
        break;


    case 'deleteLibro':
        $id = $_POST['idLibro'];
        $libro = new Libro($id);

        $respuesta = array();
        $eliminado = $libro->eliminar();
        if ($eliminado) {
            $respuesta['exito'] = 1;
            $respuesta['mensaje'] = 'El libro ha sido eliminado con éxito';
        } else {
            $respuesta['exito'] = 0;
            $respuesta['mensaje'] = 'Ha ocurrido un error al intentar eliminar el libro.';

            if ($eliminado instanceof PDOException) {
                // Añade al log de errores el mensaje de la excepción
                $respuesta['mensaje'] .= ' ' . $eliminado->getMessage();
            }
        }
        echo json_encode($respuesta);
        break;

    case 'addLibro':
        $libro = new Libro();
        $libro->titulo = $_POST['titulo'];
        $libro->idAutor = $_POST['idAutor'];
        $libro->idEditorial = $_POST['idEditorial'];
        $libro->isbn = $_POST['isbn'];
        $libro->stock = $_POST['stock'];
        $libro->precio = $_POST['precio'];

        $respuesta = array();
        $guardado = $libro->guardar();

        if ($guardado) {
            $respuesta['exito'] = 1;
            $respuesta['mensaje'] = 'El libro ha sido creado con éxito';
        } else {
            $respuesta['exito'] = 0;
            $respuesta['mensaje'] = 'Ha ocurrido un error al intentar guardar el libro.';

            if ($guardado instanceof PDOException) {
                // Añade al log de errores el mensaje de la excepción
                $respuesta['mensaje'] .= ' ' . $guardado->getMessage();
            }
        }
        echo json_encode($respuesta);
        break;


    case 'updateLibro':
        $libro = new Libro($_POST['id']);
        $libro->titulo = $_POST['titulo'];
        $libro->idAutor = $_POST['idAutor'];
        $libro->idEditorial = $_POST['idEditorial'];
        $libro->isbn = $_POST['isbn'];
        $libro->stock = $_POST['stock'];
        $libro->precio = $_POST['precio'];

        $respuesta = array();
        $guardado = $libro->guardar();

        if ($guardado) {
            $respuesta['exito'] = 1;
            $respuesta['mensaje'] = 'El libro ha sido editado con éxito';
        } else {
            $respuesta['exito'] = 0;
            $respuesta['mensaje'] = 'Ha ocurrido un error al intentar guardar el libro.';

            if ($guardado instanceof PDOException) {
                // Añade al log de errores el mensaje de la excepción
                $respuesta['mensaje'] .= ' ' . $guardado->getMessage();
            }
        }
        echo json_encode($respuesta);
        break;


    case 'getAutoresLibros':
        $idAutor = $_POST['idAutor'];
        $conexionDB = new GestorDB();
        $libros = $conexionDB->getRecordsByParams(TABLA_LIBROS, ['*'], 'idAutor = ' . $idAutor, 'titulo ASC', 'FETCH_ASSOC');
        echo json_encode($libros);
        break;

    case 'getEditorialesLibros':
        $idEditorial = $_POST['idEditorial'];
        $conexionDB = new GestorDB();
        $libros = $conexionDB->getRecordsByParams(TABLA_LIBROS, ['*'], 'idEditorial = ' . $idEditorial, 'titulo ASC', 'FETCH_ASSOC');
        echo json_encode($libros);
        break;
}
