function prueba(p1) {
    alert('probando' + p1);
}


function insertCliente(nombre, apellido) {
//alert('insert')
    console.log('pruebasInsert');
    var datos = {
        "entity": 'cliente',
        "acction": 'crear',
        "nombre": nombre,
        "apellido": apellido

    };
    $.ajax({
        data: datos,
        url: "./controller/GpsTaxiController.php",
        type: "POST",
        dataType: "json",
        beforeSend: function () {
            alert(nombre);

        },
        success: function (result) {

        }
    });



}


function solicitarCarreraRecorrido(hraIni, hraFin, fecha, IdDespach, idClie,direccion,latitud,longitud,distancia) {   
    console.log('testSolicitarCarrera');
    var datos = {
        "entity": 'carrera_recorrido',
        "acction": 'crear',
        "hraIni": hraIni,
        "hraFin": hraFin,
        "fecha": fecha,
        "IdDespach": IdDespach,
        "idClie": idClie,
        "direccion": direccion,
        "latitud": latitud,
        "longitud": longitud,
        "distancia": distancia
        

    };
    $.ajax({
        data: datos,
        url: "./controller/GpsTaxiController.php",
        type: "POST",
        dataType: "json",
        beforeSend: function () {
            alert(fecha);

        },
        success: function (result) {

        }
    });



}


