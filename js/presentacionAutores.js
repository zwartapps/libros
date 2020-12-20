var idAutor = 0;

$(document).ready(function(){
    cargarAutores();

    getAutores(function(autores) {
        cargarSelectAutores('idAutor',autores);
    });

    getEditoriales(function(editoriales) {
        cargarSelectEditoriales('idEditorial',editoriales);
    });
});

function abrirModalFormularioAutor() {
    idAutor = 0;

    $('#idAutor').val('');
    $('#nombre').val('');
    $('#apellidos').val('');
    $("#modalFormAutor").modal('show');
}

function cargarAutores(){
    getAutores(function(autores){
        let htmlAutores = '';

        $.each(autores, function(index,autor) {
            htmlAutores += '<tr>';
            htmlAutores += ' <td>'+autor.id+'</td>';
            htmlAutores += ' <td>'+autor.nombre+'</td>';
            htmlAutores += ' <td>'+autor.apellidos+'</td>';
            htmlAutores += ' <td><button idAutor="'+autor.id+'" type="button" class="btn btn-danger btn-sm" onclick="eliminarAutor(this)"><i class="far fa-trash-alt"></i></button>'
            htmlAutores += ' <button idAutor="'+autor.id+'" type="button" class="btn btn-warning btn-sm" onclick="editarAutor(this)"><i class="fa fa-pencil-square-o"></i></button></td>';
            htmlAutores += '</tr>';
        });

        $('#listadoAutores').html(htmlAutores);
    });
}

function eliminarAutor(boton) {
    idAutor = $(boton).attr('idAutor');      
 //  alert("autor es " +idAutor);
    deleteAutor(idAutor, function(respuesta){
        alert(respuesta.mensaje);
        cargarAutores();
    });
}

function guardarLibro() {
    titulo = $('#titulo').val();
    idLibro = $('#idAutor').val();
    idEditorial = $('#idEditorial').val();
    isbn = $('#isbn').val();
    stock = $('#stock').val();
    precio = $('#precio').val();

    if (idLibro == 0) {
        // Creación de un nuevo libro
        addLibro(titulo,idLibro,idEditorial,isbn,stock,precio, function(respuesta){
            alert(respuesta.mensaje);
            $("#modalFormLibro").modal('hide');
            cargarLibros();
        });
    } else {
        // Modificación del libro con id = idLibro
        updateLibro(idLibro, titulo,idLibro,idEditorial,isbn,stock,precio, function(respuesta){
            alert(respuesta.mensaje);
            $("#modalFormLibro").modal('hide');
            cargarLibros();
        });
    }
}

function editarAutor(boton){
    idAutor = $(boton).attr('idAutor');
 //   alert("autor es " +idAutor);
    getAutor(idAutor, function(autor){
        $('#nombre').val(autor.nombre);
        $('#apellidos').val(autor.apellidos);
           $("#modalFormAutor").modal('show');
       });
}