var idAutor = 0;

$(document).ready(function () {
    cargarAutores();

    getAutores(function (autores) {
        cargarSelectAutores('idAutor', autores);
    });

    getEditoriales(function (editoriales) {
        cargarSelectEditoriales('idEditorial', editoriales);
    });

    //  cargarAutoresLibros();


});

function abrirModalFormularioAutor() {
    idAutor = 0;

    $('#nombre').val('');
    $('#apellidos').val('');
    $("#modalFormAutor").modal('show');
}



function cargarAutores() {
    getAutores(function (autores) {
        let htmlAutores = '';

        $.each(autores, function (index, autor) {
            htmlAutores += '<tr>';
            htmlAutores += ' <td>' + autor.id + '</td>';
            htmlAutores += ' <td>' + autor.nombre + '</td>';
            htmlAutores += ' <td>' + autor.apellidos + '</td>';
            htmlAutores += ' <td><button idAutor="' + autor.id + '" type="button" class="btn btn-danger btn-sm" onclick="eliminarAutor(this)"><i class="far fa-trash-alt"></i></button>'
            htmlAutores += ' <button idAutor="' + autor.id + '" type="button" class="btn btn-warning btn-sm" onclick="editarAutor(this)"><i class="fa fa-pencil-square-o"></i></button>';
            htmlAutores += ' <button idAutor="' + autor.id + '" type="button" class="btn btn-primary btn-sm" onclick="mostrarLibros(this)"><i class="fas fa-info-circle"></i></button></td>';
            htmlAutores += '</tr>';
        });

        $('#listadoAutores').html(htmlAutores);
    });
}

function eliminarAutor(boton) {
    idAutor = $(boton).attr('idAutor');
    deleteAutor(idAutor, function (respuesta) {
        alert(respuesta.mensaje);
        cargarAutores();
    });
}


function editarAutor(boton) {
    idAutor = $(boton).attr('idAutor');
    getAutor(idAutor, function (autor) {
        $('#nombre').val(autor.nombre);
        $('#apellidos').val(autor.apellidos);
        $("#modalFormAutor").modal('show');
    });
}


function guardarAutor() {
    nombre = $('#nombre').val();
    apellidos = $('#apellidos').val();

    if (idAutor == 0) {
        // Creación de un nuevo autor
        addAutor(nombre, apellidos, function (respuesta) {
            alert(respuesta.mensaje);
            $("#modalFormAutor").modal('hide');
            cargarAutores();
        });
    } else {
        // Modificación del autor con id = idAutor
        updateAutor(idAutor, nombre, apellidos, function (respuesta) {
            alert(respuesta.mensaje);
            $("#modalFormAutor").modal('hide');
            cargarAutores();
        });
    }
}


/*TODOOOOOOOOOOO****////
function mostrarLibros(boton) {
    idAutor = $(boton).attr('idAutor');

    $("#modalLibros").modal('show');

    getAutoresLibros(function (libros) {
        let htmlAutoresLibros = '';

        $.each(libros, function (index, libro) {
            htmlAutoresLibros += '<tr>';
            htmlAutoresLibros += ' <td>' + libro.titulo + '</td>';
            htmlAutoresLibros += ' <td>' + libro.isbn + '</td>';
            htmlAutoresLibros += '</tr>';
        });

        $('#listadoAutoresLibros').html(htmlAutoresLibros);
    });
}

