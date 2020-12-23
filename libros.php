<?php

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php include(__DIR__ . "/lib/header.php"); ?>

    <script src="./js/generales.js"></script>
    <script src="./js/libros.js"></script>
    <script src="./js/autores.js"></script>
    <script src="./js/editoriales.js"></script>
    <script src="./js/presentacionLibros.js"></script>
</head>


<body>
    <!-- Incluimos el menú de navegación -->
    <?php include("./menu/menu.php"); ?>

    <!--MODAL FORMULARIO-->
    <div class="modal fade" id="modalFormLibro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalLongTitle">Libro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- TÍTULO DEL LIBRO -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Título</span>
                                </div>
                                <input id="titulo" type="text" class="form-control" placeholder="Título del libro" aria-label="Título" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <!-- FIN TÍTULO DEL LIBRO -->

                    <!-- DESPLEGABLE AUTORES -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Autor</span>
                                </div>
                                <select id="idAutor">
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- FIN DESPLEGABLE AUTORES -->

                    <!-- DESPLEGABLE EDITORIALES -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Editorial</span>
                                </div>
                                <select id="idEditorial">
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- FIN DESPLEGABLE EDITORIALES -->

                    <!-- ISBN DEL LIBRO -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">ISBN</span>
                                </div>
                                <input id="isbn" type="text" class="form-control" placeholder="ISBN" aria-label="ISBN" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <!-- FIN ISBN DEL LIBRO -->

                    <!-- ISBN DEL LIBRO -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Stock</span>
                                </div>
                                <input id="stock" type="text" class="form-control" placeholder="Stock" aria-label="Stock" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Precio</span>
                                </div>
                                <input id="precio" type="text" class="form-control" placeholder="Precio" aria-label="Precio" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <!-- FIN ISBN DEL LIBRO -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" onclick="guardarLibro()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!--FIN MODAL FORMULARIO-->


    <section class="mt-3">
        <div class="container">
            <!-- PANEL DE ACCIONES -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <b>Acciones</b>
                        </div>
                        <div class="card-body">
                            <button id="botonAbrirFormLibro" type="button" class="btn btn-success" onclick="abrirModalFormularioLibro()">Añadir libro</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN PANEL DE ACCIONES -->

            <!-- TABLA DE LIBROS -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Título</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="listadoLibros">
                            <!-- Rellenar con JS -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- FIN TABLA DE LIBROS -->
        </div>
    </section>

    <footer class="footer">
        <!-- Incluimos el menú de navegación -->
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>