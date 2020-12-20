<?php

require_once __DIR__.'/../db/class.GestorDB.php';

class Libro {
    protected $id;
    protected $titulo;
    protected $idAutor;
    protected $idEditorial;
    protected $isbn;
    protected $stock;
    protected $precio;

    public function __construct($id = 0) {
        if ($id != 0) {
            // Consultamos los datos por id en la BD
            $gestorDB = new GestorDB();
            $registros = $gestorDB->getRecordsByParams(TABLA_LIBROS,['*'],'id = '.$id,NULL,'FETCH_ASSOC');
            foreach ($registros as $registro) {
                foreach ($registro as $campo => $valor) {
                    $this->$campo = $valor;
                }
            }
        }
        return true;
    }

    public function __set($atributo, $valor) {
        if (property_exists($this,$atributo)) {
            $this->$atributo = $valor;
            return true;
        }
        return false;
    }

    public function __get($atributo) {
        if (property_exists($this,$atributo)) {
            return $this->$atributo;
        }
        return false;
    }

    public function guardar() {
        $gestorDB = new GestorDB();

        if ($this->id != 0) {
            // Hay que hacer un UPDATE
            $clavesPrimarias = array('id' => $this->id);
            $resultado = $gestorDB->updateDB(TABLA_LIBROS,get_object_vars($this),$clavesPrimarias);
            if ($resultado instanceof PDOException) {
                // Ha ocurrido un error
                // Hay que insertar en el log
                return false;
            } else {
                return true;
            }
        } else {
            // Hay que hacer un INSERT
            $resultado = $gestorDB->insertIntoDB(TABLA_LIBROS,get_object_vars($this),['id']);
            if ($resultado instanceof PDOException) {
                // Ha ocurrido un error
                // Hay que insertar en el log
                return false;
            } else {
                $this->id = $resultado;
                return true;
            }
        }
    }

    public function eliminar() {
        $gestorDB = new GestorDB();
        $clavesPrimarias = array('id' => $this->id);
        $resultado = $gestorDB->deleteDB(TABLA_LIBROS,$clavesPrimarias);

        return $resultado;
    }

    public function getAtributos() {
        return get_object_vars($this);
    }
}

?>
