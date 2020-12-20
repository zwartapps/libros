/*********************************************************
 /* MANEJO DE ACCIONES CON EDITORIALES
 /*********************************************************/

function getEditoriales(callback){
    $.ajax({
        url:urlBase+"/api/gestorEditoriales.php",
        success:function(result){
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error:function(result){
            callback('¡ERROR!');
        },
        data:{
            tarea: 'getEditoriales'
        },
        type:"POST",
        async: true
    });
}

function cargarSelectEditoriales(idSelect, editoriales) {
    $("#"+idSelect).empty();

    $.each(editoriales, function(index, editorial) {
        $("#"+idSelect).append('<option value="'+editorial.id+'">'+editorial.nombre+'</option>');
    });
}