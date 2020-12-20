/*********************************************************
 /* MANEJO DE ACCIONES CON AUTORES
 /*********************************************************/

function getAutores(callback){
    $.ajax({
        url:urlBase+"/api/gestorAutores.php",
        success:function(result){
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error:function(result){
            callback('¡ERROR!');
        },
        data:{
            tarea: 'getAutores'
        },
        type:"POST",
        async: true
    });
}

function cargarSelectAutores(idSelect, autores) {
    $("#"+idSelect).empty();

    $.each(autores, function(index, autor) {
        $("#"+idSelect).append('<option value="'+autor.id+'">'+autor.apellidos+', '+autor.nombre+'</option>');
    });
}