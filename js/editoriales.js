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


function getEditorialesLibros(callback) {
    $.ajax({
        url: urlBase + "/api/gestorLibros.php",
        success: function (result) {
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error: function (result) {
            callback('¡ERROR!');
        },
        data: {
            tarea: 'getEditorialesLibros',
            idEditorial: idEditorial
        },
        type: "POST",
        async: true
    });
}

function getEditorial(idEditorial, callback) {
    $.ajax({
        url: urlBase + "/api/gestorEditoriales.php",
        success: function (result) {
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error: function (result) {
            callback('¡ERROR!');
        },
        data: {
            tarea: 'getEditorial',
            id: idEditorial
        },
        type: "POST",
        async: true
    });
}

function addEditorial(nombre, callback) {
    $.ajax({
        url: urlBase + "/api/gestorEditoriales.php",
        success: function (result) {
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error: function (result) {
            callback('¡ERROR!');
        },
        data: {
            tarea: 'addEditorial',
            nombre: nombre
        },
        type: "POST",
        async: true
    });
}

function updateEditorial(idEditorial, nombre, callback) {
    $.ajax({
        url: urlBase + "/api/gestorEditoriales.php",
        success: function (result) {
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error: function (result) {
            callback('¡ERROR!');
        },
        data: {
            tarea: 'updateEditorial',
            id: idEditorial,
            nombre: nombre
        },
        type: "POST",
        async: true
    });
}

function deleteEditorial(idEditorial, callback) {
    $.ajax({
        url: urlBase + "/api/gestorEditoriales.php",
        success: function (result) {
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error: function (result) {
            callback('¡ERROR!');
        },
        data: {
            tarea: 'deleteEditorial',
            idEditorial: idEditorial
        },
        type: "POST",
        async: true
    });
}

function getEditorialesLibros(callback) {
    $.ajax({
        url: urlBase + "/api/gestorLibros.php",
        success: function (result) {
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error: function (result) {
            callback('¡ERROR!');
        },
        data: {
            tarea: 'getEditorialesLibros',
            idEditorial: idEditorial
        },
        type: "POST",
        async: true
    });
}