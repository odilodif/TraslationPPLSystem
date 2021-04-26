/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function () {
//alert('test');

    callNewCarrera();
});


function callNewCarrera() {
    $.post('./controller/CarreraRecorridoController.php', {'entity': 'CarreraRecorrido', 'crud': 'newCarrera'},
    function (data, textStatus, jqXHR) {
        // alert(data['num_nuevacarrera']);
        console.log('CallAviso.js-> callNewCarrera() num_nuevacarrera: ' + data['num_nuevacarrera']);
       if (data['success']&& parseInt(data['num_nuevacarrera'])>0 && !flagAviso) {
        //if (!flagAviso) {
       
            callNewCarreraAviso();
        }
        else {
            //alert('carrera null'); 
        }
    }, "json").fail(function (error) {

    }).always(function () {
        setTimeout(function () {
            if (true)
                callNewCarrera();
        }, 20000);
    });
}







