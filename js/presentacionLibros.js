var idLibro = 0;

$(document).ready(function(){
    cargarLibros();

    getAutores(function(autores) {
        cargarSelectAutores('idAutor',autores);
    });

    getEditoriales(function(editoriales) {
        cargarSelectEditoriales('idEditorial',editoriales);
    });
});

function abrirModalFormularioLibro() {
    idLibro = 0;

    $('#titulo').val('');
    $('#idAutor').val(1);
    $('#idEditorial').val(1);
    $('#isbn').val('');
    $('#stock').val('0');
    $('#precio').val('');
    $("#modalFormLibro").modal('show');
}

function cargarLibros(){
    getLibros(function(libros){
        let htmlLibros = '';

        $.each(libros, function(index,libro) {
            htmlLibros += '<tr>';
            htmlLibros += ' <td>'+libro.id+'</td>';
            htmlLibros += ' <td>'+libro.isbn+'</td>';
            htmlLibros += ' <td>'+libro.titulo+'</td>';
            htmlLibros += ' <td>'+libro.stock+'</td>';
            htmlLibros += ' <td>'+libro.precio+'</td>';
            htmlLibros += ' <td><button idLibro="'+libro.id+'" type="button" class="btn btn-danger btn-sm" onclick="eliminarLibro(this)"><i class="far fa-trash-alt"></i></button>'
            htmlLibros += ' <button idLibro="'+libro.id+'" type="button" class="btn btn-warning btn-sm" onclick="editarLibro(this)"><i class="fa fa-pencil-square-o"></i></button></td>';
            htmlLibros += '</tr>';
        });

        $('#listadoLibros').html(htmlLibros);
    });
}

function eliminarLibro(boton) {
    idLibro = $(boton).attr('idLibro');
    deleteLibro(idLibro, function(respuesta){
        alert(respuesta.mensaje);
        cargarLibros();
    });
}

function guardarLibro() {
    idAutor = $('#idAutor').val();
    titulo = $('#titulo').val();  
    idEditorial = $('#idEditorial').val();
    isbn = $('#isbn').val();
    stock = $('#stock').val();
    precio = $('#precio').val();

    if (idLibro == 0) {
        // Creación de un nuevo libro
        addLibro(titulo, idAutor, idEditorial, isbn, stock, precio, function(respuesta){
            alert(respuesta.mensaje);
            $("#modalFormLibro").modal('hide');
            cargarLibros();
        });
    } else {
        // Modificación del libro con id = idLibro
        updateLibro(idLibro, titulo, idAutor, idEditorial, isbn, stock, precio, function(respuesta){
            alert(respuesta.mensaje);
            $("#modalFormLibro").modal('hide');
            cargarLibros();
        });
    }
}

function editarLibro(boton){
    idLibro = $(boton).attr('idLibro');
    
    getLibro(idLibro, function(libro){
       
        $('#titulo').val(libro.titulo);
        $('#idAutor').val(libro.idAutor);
        $('#idEditorial').val(libro.idEditorial);
        $('#isbn').val(libro.isbn);
        $('#stock').val(libro.stock);
        $('#precio').val(libro.precio);
        $("#modalFormLibro").modal('show');
       });
}