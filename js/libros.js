/*********************************************************
 /* MANEJO DE ACCIONES CON LIBROS
 /*********************************************************/

function getLibros(callback){
    $.ajax({
        url:urlBase+"/api/gestorLibros.php",
        success:function(result){
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error:function(result){
            callback('¡ERROR!');
        },
        data:{
            tarea: 'getLibros'
        },
        type:"POST",
        async: true
    });
}

function deleteLibro(idLibro, callback){
    $.ajax({
        url:urlBase+"/api/gestorLibros.php",
        success:function(result){
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error:function(result){
            callback('¡ERROR!');
        },
        data:{
            tarea: 'deleteLibro',
            idLibro: idLibro
        },
        type:"POST",
        async: true
    });
}

function addLibro(titulo, idAutor, idEditorial, isbn, stock, precio, callback) {
    $.ajax({
        url:urlBase+"/api/gestorLibros.php",
        success:function(result){
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error:function(result){
            callback('¡ERROR!');
        },
        data:{
            tarea: 'addLibro',
            titulo: titulo,
            idAutor: idAutor,
            idEditorial: idEditorial,
            isbn: isbn,
            stock: stock,
            precio: precio
        },
        type:"POST",
        async: true
    });
}