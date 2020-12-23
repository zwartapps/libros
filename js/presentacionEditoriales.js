var idEditorial = 0;

$(document).ready(function () {
    cargarEditoriales();
   
       getAutores(function (autores) {
            cargarSelectAutores('idAutor', autores);
        });
    
    
      getEditoriales(function (editoriales) {
            cargarSelectEditoriales('idEditorial', editoriales);
        });
 
});

function abrirModalFormEditorial() {
    idEditorial = 0;

    $('#nombre').val('');
     $("#modalFormEditorial").modal('show');
}


function cargarEditoriales() {
    getEditoriales(function (editoriales) {
        let htmlEditoriales = '';

        $.each(editoriales, function (index, editorial) {
            htmlEditoriales += '<tr>';
            htmlEditoriales += ' <td>' + editorial.id + '</td>';
            htmlEditoriales += ' <td>' + editorial.nombre + '</td>';           
            htmlEditoriales += ' <td><button idEditorial="' + editorial.id + '" type="button" class="btn btn-danger btn-sm" onclick="eliminarEditorial(this)"><i class="far fa-trash-alt"></i></button>'
            htmlEditoriales += ' <button idEditorial="' + editorial.id + '" type="button" class="btn btn-warning btn-sm" onclick="editarEditorial(this)"><i class="fa fa-pencil-square-o"></i></button>';
            htmlEditoriales += ' <button idEditorial="' + editorial.id + '" type="button" class="btn btn-primary btn-sm" onclick="mostrarLibros(this)"><i class="fas fa-info-circle"></i></button></td>';
            htmlEditoriales += '</tr>';
        });

        $('#listadoEditoriales').html(htmlEditoriales);
    });
}


function eliminarEditorial(boton) {
    var eliminar = confirm("Al eliminar este editorial, también se eliminarán sus libros!\n Continuar?");
    if (eliminar == true) {
        idEditorial = $(boton).attr('idEditorial');
        deleteEditorial(idEditorial, function (respuesta) {
            alert(respuesta.mensaje);
            cargarEditoriales();
        });

        //eliminamos los libros asociados a ese editorial
        getEditorialesLibros(function (libros) {
            $.each(libros, function (index, libro) {
                idLibro = libro.id;
                deleteLibro(idLibro, function (respuesta) {
                 //   alert(respuesta.mensaje);
                    cargarLibros();
                });
            });
        });
    }
}


function editarEditorial(boton) {
    idEditorial = $(boton).attr('idEditorial');
    getEditorial(idEditorial, function (editorial) {
        $('#nombre').val(editorial.nombre);    
        $("#modalFormEditorial").modal('show');
    });
}


function guardarEditorial() {
    nombre = $('#nombre').val(); 

    if (idEditorial == 0) {
        // Creación de un nuevo editorial
        addEditorial(nombre, function (respuesta) {
            alert(respuesta.mensaje);
            $("#modalFormEditorial").modal('hide');
            cargarEditoriales();
        });
    } else {
        // Modificación del autor con id = editorial
        updateEditorial(idEditorial, nombre, function (respuesta) {
            alert(respuesta.mensaje);
            $("#modalFormEditorial").modal('hide');
            cargarEditoriales();
        });
    }
}


function mostrarLibros(boton) {
    idEditorial = $(boton).attr('idEditorial');

    $("#modalLibros").modal('show');

    getEditorialesLibros(function (libros) {
        let htmlEditorialLibros = '';

        $.each(libros, function (index, libro) {
            htmlEditorialLibros += '<tr>';
            htmlEditorialLibros += ' <td>' + libro.titulo + '</td>';
            htmlEditorialLibros += ' <td>' + libro.isbn + '</td>';
            htmlEditorialLibros += '</tr>';
        });

        $('#listadoLibros').html(htmlEditorialLibros);
    });
}

