/*********************************************************
 /* MANEJO DE ACCIONES CON AUTORES
 /*********************************************************/

function getAutores(callback) {
    $.ajax({
        url: urlBase + "/api/gestorAutores.php",
        success: function (result) {
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error: function (result) {
            callback('¡ERROR!');
        },
        data: {
            tarea: 'getAutores'
        },
        type: "POST",
        async: true
    });
}

function cargarSelectAutores(idSelect, autores) {
    $("#" + idSelect).empty();

    $.each(autores, function (index, autor) {
        $("#" + idSelect).append('<option value="' + autor.id + '">' + autor.apellidos + ', ' + autor.nombre + '</option>');
    });
}

function deleteAutor(idAutor, callback) {
    $.ajax({
        url: urlBase + "/api/gestorAutores.php",
        success: function (result) {
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error: function (result) {
            callback('¡ERROR!');
        },
        data: {
            tarea: 'deleteAutor',
            idAutor: idAutor
        },
        type: "POST",
        async: true
    });
}

function getAutor(idAutor, callback) {
    $.ajax({
        url: urlBase + "/api/gestorAutores.php",
        success: function (result) {
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error: function (result) {
            callback('¡ERROR!');
        },
        data: {
            tarea: 'getAutor',
            id: idAutor
        },
        type: "POST",
        async: true
    });
}

function addAutor(nombre, apellidos, callback) {
    $.ajax({
        url: urlBase + "/api/gestorAutores.php",
        success: function (result) {
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error: function (result) {
            callback('¡ERROR!');
        },
        data: {
            tarea: 'addAutor',
            nombre: nombre,
            apellidos: apellidos
        },
        type: "POST",
        async: true
    });
}

function updateAutor(idAutor, nombre, apellidos, callback) {
    $.ajax({
        url: urlBase + "/api/gestorAutores.php",
        success: function (result) {
            respuestaAJAX = JSON.parse(result);
            callback(respuestaAJAX);
        },
        error: function (result) {
            callback('¡ERROR!');
        },
        data: {
            tarea: 'updateAutor',
            id: idAutor,
            nombre: nombre,
            apellidos: apellidos
        },
        type: "POST",
        async: true
    });
}

function getAutoresLibros(callback) {
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
            tarea: 'getAutoresLibros',
            idAutor: idAutor
        },
        type: "POST",
        async: true
    });
}