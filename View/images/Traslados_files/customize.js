

//<editor-fold desc="LISTADO DE VEHICULOS DISPONIBLES">

function unitsAvailable() {
    // alert('carrrera');
    var datos = {
        'entity': 'Vehiculo',
        'crud': 'list'};
    $.ajax({
        data: datos,
        url: './controller/VehiculoController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (data) {
            // alert(data[0]['success']);
            if (data[0]['success']) {
                //alert('CARGANDO  UNIDADES DISPONIBLES')             

                $("#tbodyUnits").empty();

                $.each(data, function (index, record) {
                    var body = "<tr>";
//                    body += "<td><i class='fa fa-car fa-2x'></i></td>";
                    body += "<td>" + record.codigo + "</td>";
                    body += "<td>" + record.cant_carreras + "</td>";
                    body += "<td>" + record.placas + "</td>";
                    body += "" + record.btnasignar;
                    $("#tblUnits tbody").append(body);
                });

            }
            else {
                alert('NO HAY  UNIDDADES DISPONIBLES');
                $('LBL_SMS_error').html('ERROR AL CARGAR LAS UNIDADES DISPONIBLES');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);
            }
        }
    });
}
//</editor-fold>

//<editor-fold desc="CARRERAS PENDIENTES">
function loadCarreraPendiantes() {
    // alert('carrrera');
    var datos = {
        'entity': 'CarreraRecorrido',
        'crud': 'list'};
    $.ajax({
        data: datos,
        url: './controller/CarreraRecorridoController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //alert('before');
            //$('#respuestaAjax').html('<img id="loader" src="images/loading.gif"/>');

        },
        success: function (data) {
            if (data[0]['success']) {
                $("#tbodyCPendientes").empty();
                $.each(data, function (index, record) {
                    if ($.isNumeric(index)) {
                        // alert(index);
                        var row = $("<tr />");
//                        $("<td />").html('<i class="fa fa-street-view fa-2x"></i>').appendTo(row);
                        $("<td />").text(record.idcarrera).appendTo(row);
                        $("<td />").text(record.direccion).appendTo(row);
                        $("<td />").text(record.cliente).appendTo(row);

                        row.appendTo('#tbodyCPendientes');
                    }
                });
            }
            else {
                alert('ERROR AL CARGAR EL LISTADO DE CARRRERAS');
                $('LBL_SMS_error').html('ERROR AL CARGAR CARRERAS PENDIANTES');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);
            }
        }
    });
}
//</editor-fold>

//<editor-fold desc="CARRERRAS PENDIENTE MODAL">
function loadCarreraPendiantesModal() {

    var datos = {
        'entity': 'CarreraRecorrido',
        'crud': 'list'};
    $.ajax({
        data: datos,
        url: './controller/CarreraRecorridoController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //alert('before');
            //$('#respuestaAjax').html('<img id="loader" src="images/loading.gif"/>');

        },
        success: function (data) {
            if (data[0]['success']) {
                $("#tbodymodalcp").empty();
                $.each(data, function (index, record) {
                    if ($.isNumeric(index)) {
                        // alert(index);
                        var row = $("<tr />");
//                        $("<td />").html('<i class="fa fa-street-view fa-2x"></i>').appendTo(row);
                        $("<td />").text(record.idcarrera).appendTo(row);
                        $("<td />").text(record.direccion).appendTo(row);
                        $("<td />").text(record.cliente).appendTo(row);

                        row.appendTo('#tbodymodalcp');
                    }
                });


            }
            else {
                alert('ERROR AL CARGAR EL LISTADO DE CARRRERAS');
                $('LBL_SMS_error').html('ERROR AL CARGAR CARRERAS PENDIANTES');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);
            }
        }
    });
}
//</editor-fold>

//<editor-fold desc="ASIGNAR UNIDAD CARRERA">
function asignarUnidadCarrera(idunidad, codigo, idchofer) {
    //alert(idchofer);
    $('#txtIdUnit').val(idunidad);
    $('#txtCodUnit').val(codigo);
    $('#txtIdConductor').val(idchofer);
    loadCarreraPendiantesModal();
    $('#modalAsignar').modal('show')


}
//</editor-fold>

//<editor-fold desc="VEHICULO_CRUD_VIEW_MODAL">
//
function vehiculoCrudView(crud, id) {
    //alert(crud);
    switch (crud) {
        case 'read':
            loadConductors();
            loadDetallVehicule(id, crud);
            var elementoDom = $('#formVehiculo');
            elementoDom.find('#btnSaveVehicule').hide();
            elementoDom.find('#selectorConductor').hide();
            elementoDom.find('#divConductor').show();
            ;
            elementoDom.find('#placaunit').prop('readonly', true);
            elementoDom.find('#codunit').prop('readonly', true);
            elementoDom.find('#colorunit').prop('readonly', true);
            elementoDom.find('#modelunit').prop('readonly', true);
            elementoDom.find('marcaunit').prop('readonly', true);
            //elementoDom.find('#idvehicule').val();
            $('#modalVehiculoCrudView').modal('show');
            //alert('read');
            break;
        case  'update':
            //alert('update');
            loadConductors();
            loadDetallVehicule(id, crud);
            var elementoDom = $('#formVehiculo');
            elementoDom.find('#btnSaveVehicule').show();
            elementoDom.find('#selectorConductor').show();
            elementoDom.find('#divConductor').hide();
            elementoDom.find('#placaunit').prop('readonly', false);
            elementoDom.find('#codunit').prop('readonly', false);
            elementoDom.find('#colorunit').prop('readonly', false);
            elementoDom.find('#modelunit').prop('readonly', false);
            elementoDom.find('#marcaunit').prop('readonly', false);
            elementoDom.find('#idvehicule').val();
            $('#modalVehiculoCrudView').modal('show');

            break;
        case "delete":
            deleteVehicule(id);

            break;
    }


}
//</editor-fold>

//<editor-fold desc="VEHICULO LOAD DETALLS VEHICULE VIEW DETALLS VEHICULE">
function loadDetallVehicule(id, crud) {
    // alert(id);
    var datos = {
        'entity': 'Vehiculo',
        'crud': 'read',
        'id': id
    };
    $.ajax({
        data: datos,
        url: './controller/VehiculoController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //$('#btnSaveVehicule').css('visible', 'hidden');
        },
        success: function (data) {
            if (data) {
                // alert('exito');
                var elementoDom = $('#formVehiculo');
                if (crud == 'read') {
                    // alert('read');
                    elementoDom.find('#placaunit').prop('readonly', true).val(data.placas);
                    elementoDom.find('#codunit').prop('readonly', true).val(data.codigo);
                    elementoDom.find('#colorunit').prop('readonly', true).val(data.color);
                    elementoDom.find('#modelunit').prop('readonly', true).val(data.modelo);
                    elementoDom.find('#marcaunit').prop('readonly', true).val(data.marca);
                    elementoDom.find('#txtConductor').prop('readonly', true).val(data.chofer);

                } else if (crud == 'update') {
                    elementoDom.find('#placaunit').val(data.placas);
                    elementoDom.find('#codunit').val(data.codigo);
                    elementoDom.find('#colorunit').val(data.color);
                    elementoDom.find('#modelunit').val(data.modelo);
                    elementoDom.find('#marcaunit').val(data.marca);
                    elementoDom.find('#txtConductor').val(data.chofer);
                    elementoDom.find('#idvehicule').val(id);
                }
            }
            else {
                alert('ERROR AL REALIZAR' + crud);
                $('LBL_SMS_error').html('ERROR AL REALIZAR' + crud);
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);
            }
        }


    });

}

//</editor-fold>
//<editor-fold desc="VEHICULO SAVE TAXIS">
//
function saveVehicule(placas, codigo, color, modelo, idconductor, marca) {
    console.log(placas + codigo + color + modelo + idconductor);

    var datos = {
        'entity': 'Vehiculo',
        'crud': 'create',
        'placas': placas,
        'codigo': codigo,
        'color': color,
        'modelo': modelo,
        'marca': marca,
        'idconductor': idconductor
    };

    $.ajax({
        data: datos,
        url: './controller/VehiculoController.php',
        type: 'POST',
        dataType: 'JSON',
        before: function () {
            //preload(true);

            $('#btnSaveVehicule').attr('disabled');
        },
        success: function (datos) {
            $('#btnSaveVehicule').attr('enable');
            if (datos['success']) {
                cleanFieldsVehiculo();
                alert('Vehiculo Registrado exitosamente');
            }
            else {
                alert('ERROR AL REGISTRAR EL VEHICULO');
                $('LBL_SMS_error').html('ERROR AL INGESAR  VEHICULO');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);

            }

        }

    });

}
//</editor-fold>

//<editor-fold desc="VEHICULO LIST VEHICULES TAXIS">
//
function loadVehicules() {
    //alert('load list vehi');
    var datos = {
        'entity': 'Vehiculo',
        'crud': 'listVehicules'
    };
    $.ajax({
        data: datos,
        url: './controller/VehiculoController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (result) {
            if (result[0]['success']) {
                //alert('exito');
                $('#tblListVehicules tbody').empty();
                $.each(result, function (index, record) {
                    var tbody = '<tr>';
                    tbody += '<td>' + record.marca + '</td>';
                    tbody += '<td>' + record.placa + '</td>';
                    tbody += '<td>' + record.codigo + '</td>';
                    tbody += '<td>' + record.color + '</td>';
                    tbody += '<td>' + record.chofer + '</td>';
                    tbody += '<td>' + record.btnsCrud + '</td>';
                    $('#tblListVehicules tbody').append(tbody);
                });
//                $('#tblDetallUsers').DataTable({
//                    dom: 'Bfrtip',
//                    buttons: [
//                        'copy', 'csv', 'excel', 'pdf', 'print'
//                    ]
//                });


            }
            else {
                alert('ERROR EN CARGAR LA LISTA DE VEHICULOS');
            }

        }

    });
}
//</editor-fold>

//<editor-fold desc="VEHICULO UPDATE_VEHICULE">
function updateVehicule(placas, codigo, color, modelo, idconductor, idv, marca) {
    //alert(marca)
    console.log(placas + codigo + color + modelo + idconductor, idv);

    var datos = {
        'entity': 'Vehiculo',
        'crud': 'update',
        'placas': placas,
        'codigo': codigo,
        'color': color,
        'modelo': modelo,
        'marca': marca,
        'idconductor': idconductor,
        'id': idv
    };

    $.ajax({
        data: datos,
        url: './controller/VehiculoController.php',
        type: 'POST',
        dataType: 'JSON',
        before: function () {
            //preload(true);

            $('#btnSaveVehicule').attr('disabled');
        },
        success: function (datos) {
            $('#btnSaveVehicule').attr('enable');
            if (datos['success']) {
                cleanFieldsVehiculo();
                alert('Vehiculo Actualizado exitosamente');
            }
            else {
                alert('ERROR AL ACTUALIZAR EL VEHICULO');
                $('LBL_SMS_error').html('ERROR AL ACTUALIZAR  VEHICULO');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);

            }

        }

    });
}

//</editor-fold>

//<editor-fold desc="VEHICULO DELETE VEHICULE">
function deleteVehicule(idVehicule) {
    var del = confirm("Esta seguro que quiere eliminar este registro?");
    if (del == true) {
        //alert("record deleted")
        var datos = {
            'entity': 'Vehiculo',
            'crud': 'delete',
            'id': idVehicule
        };

        $.ajax({
            data: datos,
            url: './controller/VehiculoController.php',
            type: 'POST',
            dataType: 'JSON',
            before: function () {
            },
            success: function (datos) {
                if (datos['success']) {
                    loadVehicules();
                    alert('Unidad  Eliminada ');

                }
                else {
                    alert('ERROR AL ELIMINAR LA UNIDAD');
                    $('LBL_SMS_error').html('ERROR AL ELIMINAR LA UNIDAD');
                    setTimeout(function () {
                        $('LBL_SMS_error').fadeIn().fadeOut(2000);
                    }, 10);
                }
            }
        });
    }

}

//</editor-fold>




//<editor-fold desc="ASIGNAR UNIDAD CARRERA CONTROLLER  ROUTING">
function routingAsigCarreraCont(idunidad, idcarrera, codserie, client, idchofer) {
    //alert(idchofer);
    var flag = false;
    var datos = {
        'entity': 'CarreraRecorrido',
        'crud': 'update',
        'idunidad': idunidad,
        'idcarrera': idcarrera,
        'idchofer': idchofer
    };
    $.ajax({
        data: datos,
        url: './controller/CarreraRecorridoController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (data) {
            if (data['success']) {
                unidadesCunrso();
                loadCarreraPendiantes();
                unitsAvailable();
                loadCarreraPendiantesModal();


                alert('CARRERA: ' + idcarrera + '  ASIGNADA A LA UNIDAD: ' + codserie + '  PARA EL CLIENTE: ' + client);
                return flag = true;
            }
            else {
                alert('ERROR AL ASIGNAR CARRERA');
                $('LBL_SMS_error').html('ERROR AL ASIGNAR CARRERA');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);
            }
        }
    });
    return flag;
}
//</editor-fold>

//<editor-fold desc="ASIGNAR CARRERA UNIDAD">
function asignarCarreraUnidad() {


}
//</editor-fold>

//<editor-fold desc="ASIGNAR CARRERA UNIDAD">
function unidadesCunrso() {
    var datos = {'entity': 'Vehiculo', 'crud': 'encurso'};
    $.ajax({
        data: datos,
        url: './controller/VehiculoController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (data) {
            if (data[0]['success']) {
                $("#tbodyEnCurso").empty();
                $.each(data, function (index, record) {
                    if ($.isNumeric(index)) {
                        // alert(index);
                        var row = $("<tr />");
//                        $("<td />").html('<i class="fa fa-map-marker fa-2x"></i>').appendTo(row);
                        $("<td />").text(record.codigo).appendTo(row);
                        $("<td />").text(record.placas).appendTo(row);
                        row.appendTo('#tbodyEnCurso');
                    }
                });
            }
            else {
                alert('NO HAY CARRERAS EN CURSO');
                $('LBL_SMS_error').html('ERROR AL CARGAR EL LISTADO CARRERAS EN CURSO');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);
            }
        }
    });

}
//</editor-fold>





function loadProfiles() {
    var datos = {'entity': 'Perfil', 'crud': 'list'};
    $.ajax({
        data: datos,
        url: './controller/ProfileController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //alert('before');
            //$('#respuestaAjax').html('<img id="loader" src="images/loading.gif"/>');
            // preload(true);
        },
        success: function (data) {
            // alert(data[0]['success']);
            if (data[0]['success']) {
                var id = 'Seleccione Perfil';
                $('#selectUsers')
                        .empty()
                        .append('<option value="' + id + '">' + 'SELECCIONE UN PERFIL' + '</option>');
                $.each(data, function (i, data) {
                    $('#selectUsers').append($('<option>').text(data.des).attr('value', data.id));
                });

            }
            else {
                alert('ERROR EL COMBO BOX');
                $('LBL_SMS_error').html('ERROR AL ELIMINAR EL PRODUTO');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);
            }


        }
    });
}


//Save User 
function saveUser(name, lastname, email, phone, cedula, password, address, idprofile) {

    console.log('Paramters : ' + 'nombre: ' + name + 'apellido:  ' + lastname
            + 'email: ' + email + 'telefono: ' + phone + 'cedula: ' + cedula
            + 'password: ' + password + 'direccion:' + address + 'perfil ' + idprofile);
    ////INSERT INTO usuario (USU_NOMBRE,USU_APELLIDO,USU_EMAIL,USU_TELEFONO,
    //USU_CEDULA,USU_PASSWORD,USU_ESTADO,USU_DIRECCION,PERF_ID) 
    var datos = {
        'entity': 'User',
        'crud': 'create',
        'name': name,
        'lastname': lastname,
        'email': email,
        'phone': phone,
        'cedula': cedula,
        'password': password,
        'address': address,
        'idprofile': idprofile
    };

    $.ajax({
        data: datos,
        url: './controller/UserController.php',
        type: 'POST',
        dataType: 'JSON',
        before: function () {
            //preload(true);

            $('#btnSaveUser').attr('disabled');
        },
        success: function (datos) {
            $('#btnSaveUser').attr('enable');
            if (datos['success']) {
                cleanFields();
                alert('Usuario Registrado exitosamente');
            }
            else {
                alert('ERROR AL REGISTRAR EL USUARIO');
                $('LBL_SMS_error').html('ERROR AL INGESAR  USUARIO');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);

            }

        }

    });
}

function cleanFields() {
    //$('#name').val() , $('#lastname').val() , $('#email').val() , $('#address').val() , $('#phone').val() , $('#password').val() ,$('#myselect').val()
    $('#txtIdUser').val('');
    $('#name').val('');
    $('#lastname').val('');
    $('#email').val('');
    $('#address').val('');
    $('#phone').val('');
    $('#password').val('');
    loadProfiles();
}

function cleanFieldsVehiculo() {
    //$('#name').val() , $('#lastname').val() , $('#email').val() , $('#address').val() , $('#phone').val() , $('#password').val() ,$('#myselect').val()
    $('#placaunit').val('');
    $('#codunit').val('');
    $('#colorunit').val('');
    $('#modelunit').val('');
    $('#marcaunit').val('');
    loadConductors();
}

//< editor-fold desc="LIST USERS">
function loadListUsers() {
    var datos = {
        'entity': 'User',
        'crud': 'listUsers',
        'profile': '4'
    };
    $.ajax({
        data: datos,
        url: './controller/UserController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (result) {
            if (result[0]['success']) {
                //alert('exito');
                $('#tblDetallUsers tbody').empty();
                $.each(result, function (index, record) {
                    var tbody = '<tr>';
                    tbody += '<td>' + record.id + '</td>';
                    tbody += '<td>' + record.name + '</td>';
                    tbody += '<td>' + record.lname + '</td>';
                    tbody += '<td>' + record.email + '</td>';
                    tbody += '<td>' + record.phone + '</td>';
                    tbody += '<td>' + record.address + '</td>';
                    tbody += '<td>' + record.profile + '</td>';
                    tbody += '<td>' + record.btnsCrud + '</td>';
                    $('#tblDetallUsers tbody').append(tbody);
                });
//                $('#tblDetallUsers').DataTable({
//                    dom: 'Bfrtip',
//                    buttons: [
//                        'copy', 'csv', 'excel', 'pdf', 'print'
//                    ]
//                });


            }
            else {
                alert('ERROR AL CARGAR EL LISTADO DE UUSSUARIOS');
                $('LBL_SMS_error').html('ERROR AL CARGAR EL LISTADO DE USUARIOS');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);
            }

        }

    });

}


//</editor-fold>
//<editor-fold desc="USERS LOAD CONDUCTORS">
//
function loadConductors() {
    var datos = {'entity': 'User', 'crud': 'ListConductors'};
    $.ajax({
        data: datos,
        url: './controller/UserController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //alert('before');
            //$('#respuestaAjax').html('<img id="loader" src="images/loading.gif"/>');
            // preload(true);
        },
        success: function (data) {
            // alert(data[0]['success']);
            if (data[0]['success']) {
                var id = 'Seleccione Perfil';
                $('#coductorunit')
                        .empty()
                        .append('<option value="' + id + '">' + 'SELECCIONE UN CONDUCTOR' + '</option>');
                $.each(data, function (i, data) {
                    $('#coductorunit').append($('<option>').text(data.nombres).attr('value', data.id));
                });

            }
            else {
                alert('ERROR EL COMBO BOX');
                $('LBL_SMS_error').html('ERROR AL ELIMINAR EL PRODUTO');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);
            }


        }
    });
}
//</editor-fold>
//<editor-fold desc="USERS Usuario_CRUD_VIEW_MODAL">
//
function userCrudView(crud, id) {
    //alert(crud);
    switch (crud) {
        case 'read':
            loadProfiles();
            loadDetallUser(id, crud);
            var elementoDom = $('#formUser');
            elementoDom.find('#btnUpdateUser').hide();
            elementoDom.find('#divtxtProile').show();
            elementoDom.find('#divCBoxProfile').hide();
            elementoDom.find('#name').prop('readonly', true);
            elementoDom.find('#lastname').prop('readonly', true);
            elementoDom.find('#email').prop('readonly', true);
            elementoDom.find('#address').prop('readonly', true);
            elementoDom.find('#password').prop('readonly', true);
            elementoDom.find('#phone').prop('readonly', true);
            elementoDom.find('#txtProfile').prop('readonly', true);
            //elementoDom.find('#idvehicule').val();
            $('#modalUsersCrudView').modal('show');
            //alert('read');
            break;
        case  'update':
            //alert('update');
            cleanFields();
            loadProfiles();
            loadDetallUser(id, crud);
            var elementoDom = $('#formUser');
            elementoDom.find('#txtIdUser').val(id);
            elementoDom.find('#btnUpdateUser').show();
            elementoDom.find('#selectUsers').show();
            elementoDom.find('#divtxtProile').hide();
            elementoDom.find('#divCBoxProfile').show();
            elementoDom.find('#name').prop('readonly', false);
            elementoDom.find('#lastname').prop('readonly', false);
            elementoDom.find('#email').prop('readonly', false);
            elementoDom.find('#address').prop('readonly', false);
            elementoDom.find('#password').prop('readonly', false);
            elementoDom.find('#phone').prop('readonly', false);

            $('#modalUsersCrudView').modal('show');

            break;
        case "delete":
            deleteUser(id);
            break;
    }


}
//</editor-fold>

//<editor-fold desc="USERS LOAD DETALLES USER">
function loadDetallUser(id, crud) {
    // alert(id);
    var datos = {
        'entity': 'User',
        'crud': 'read',
        'id': id
    };
    $.ajax({
        data: datos,
        url: './controller/UserController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            //$('#btnSaveVehicule').css('visible', 'hidden');
        },
        success: function (data) {
            if (data) {
                // alert('exito');
                var elementoDom = $('#formUser');
                if (crud == 'read') {
                    // alert('read');
                    elementoDom.find('#txtIdUser').prop('readonly', true).val(id);
                    elementoDom.find('#name').prop('readonly', true).val(data.name);
                    elementoDom.find('#lastname').prop('readonly', true).val(data.lastname);
                    elementoDom.find('#email').prop('readonly', true).val(data.email);
                    elementoDom.find('#address').prop('readonly', true).val(data.address);
                    elementoDom.find('#password').prop('readonly', true).val(data.password);
                    elementoDom.find('#phone').prop('readonly', true).val(data.phone);
                    elementoDom.find('#txtProfile').prop('readonly', true).val(data.profile);


                } else if (crud == 'update') {
                    elementoDom.find('#name').val(data.name);
                    elementoDom.find('#lastname').val(data.lastname);
                    elementoDom.find('#email').val(data.email);
                    elementoDom.find('#address').val(data.address);
                    elementoDom.find('#password').val(data.password);
                    elementoDom.find('#phone').val(data.phone);
                    // elementoDom.find('#txtProfile').val(data.profile);               

                }
            }
            else {
                alert('ERROR AL REALIZAR' + crud);
                $('LBL_SMS_error').html('ERROR AL REALIZAR' + crud);
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);
            }
        }


    });

}
//</editor-fold>
//<editor-fold desc="USERS UPDATE USUARIO CRUD VIEW">
function updateUser(name, lastname, email, address, password, phone, txtIdUser, idP) {

    console.log(name + lastname + email + address + password + phone + txtIdUser + idP);

    var datos = {
        'entity': 'User',
        'crud': 'update',
        'name': name,
        'lastname': lastname,
        'email': email,
        'address': address,
        'password': password,
        'phone': phone,
        'id': txtIdUser,
        'idP': idP
    };

    $.ajax({
        data: datos,
        url: './controller/UserController.php',
        type: 'POST',
        dataType: 'JSON',
        before: function () {
            //preload(true);

            $('#btnUpdateUser').attr('disabled');
        },
        success: function (datos) {
            $('#btnUpdateUser').attr('enable');
            if (datos['success']) {
                loadListUsers();
                cleanFields();
                alert('Usuario Actualizado exitosamente');
            }
            else {
                alert('ERROR AL ACTUALIZAR EL USUARIO');
                $('LBL_SMS_error').html('ERROR AL ACTUALIZAR EL USUARIO');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);

            }

        }

    });

}

//</editor-fold>

//<editor-fold desc="USERS DELETE USER">
function deleteUser(iduser) {
    var del = confirm("Esta seguro que quiere eliminar este registro?");
    if (del == true) {
        //alert("record deleted")
        var datos = {
            'entity': 'User',
            'crud': 'delete',
            'id': iduser
        };

        $.ajax({
            data: datos,
            url: './controller/UserController.php',
            type: 'POST',
            dataType: 'JSON',
            before: function () {
            },
            success: function (datos) {

                if (datos['success']) {
                    loadListUsers();
                    alert('Usuario Eliminado ');
                }
                else {
                    alert('ERROR AL ELIMINAR EL USUARIO');
                    $('LBL_SMS_error').html('ERROR AL ELIMINAR EL USUARIO');
                    setTimeout(function () {
                        $('LBL_SMS_error').fadeIn().fadeOut(2000);
                    }, 10);
                }
            }
        });
    }

}

//</editor-fold>

//<editor-fold desc="MODULO CLIENTES">

//<editor-fold desc="CLENTS LOAD LIST">
function loadClientList() {
    var datos = {
        'entity': 'User',
        'crud': 'ClientsList',
        'profile': '4'
    };
    $.ajax({
        data: datos,
        url: './controller/UserController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (result) {
            if (result[0]['success']) {
                //alert('exito');
                $('#tblDetallClients tbody').empty();
                $.each(result, function (index, record) {
                    var tbody = '<tr>';
                    tbody += '<td>' + record.id + '</td>';
                    tbody += '<td>' + record.name + '</td>';
                    tbody += '<td>' + record.lname + '</td>';
                    tbody += '<td>' + record.email + '</td>';
                    tbody += '<td>' + record.phone + '</td>';
                    tbody += '<td>' + record.address + '</td>';
                    tbody += '<td>' + record.profile + '</td>';
                    //tbody += '<td>' + record.btnsCrud + '</td>';
                    $('#tblDetallClients tbody').append(tbody);
                });
//                $('#tblDetallUsers').DataTable({
//                    dom: 'Bfrtip',
//                    buttons: [
//                        'copy', 'csv', 'excel', 'pdf', 'print'
//                    ]
//                });


            }
            else {
                alert('ERROR AL CARGAR EL LISTADO DE UUSSUARIOS');
                $('LBL_SMS_error').html('ERROR AL CARGAR EL LISTADO DE USUARIOS');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);
            }

        }

    });

}
//</editor-fold>



//</editor-fold>

//<editor-fold desc="LISTADO DE CARRERAS DE RECORRIDOS EN CURSO GLOBAL">
function list_carrera_recorrido_curso_g() {
//alert('listCarreraRecorridoEnCusroG');
    var datos = {
        'entity': 'CarreraRecorrido',
        'crud': 'listCarreraCursoG'
    };

    $.ajax({
        data: datos,
        url: './controller/CarreraRecorridoController.php',
        type: 'POST',
        dataType: 'JSON',
        before: function () {
            //$('#load').show();
        },
        success: function (datos) {
            if (datos[0]['success']) {

                $('#tblDetallsCarreraR tbody').empty();
                $.each(datos, function (index, record) {

                    var tbody = '<tr>';
                    tbody += '<td>' + record.id + '</td>';
                    tbody += '<td>' + record.fecha + '</td>';
                    tbody += '<td>' + record.cliente + '</td>';
                    tbody += '<td>' + record.placa + '</td>';
                    tbody += '<td>' + record.unidad + '</td>';
                    tbody += '<td>' + record.conductor + '</td>';
                    tbody += '<td>' + record.hraIni + '</td>';
                    tbody += '<td>' + record.hraFin + '</td>';
                    tbody += '<td>' + record.solicitada + '</td>';
                    tbody += '<td>' + record.asignada + '</td>';
                    tbody += '<td>' + record.aceptada + '</td>';
                    tbody += '<td>' + record.cancelada + '</td>';
                    tbody += '<td>' + record.realizada + '</td>';
                    tbody += '<td>' + record.hraDeSolicitud + '</td>';
                    $('#tblDetallsCarreraR tbody').append(tbody);
                });
//                $('#tblDetallUsers').DataTable({
//                    dom: 'Bfrtip',
//                    buttons: [
//                        'copy', 'csv', 'excel', 'pdf', 'print'
//                    ]
//                });


            }
            else {
                alert('ERROR AL CARGAR EL LISTADO DE CARRERAS');
                $('LBL_SMS_error').html('ERROR AL CARGAR LISTADO DE CARRERAS');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);

            }

        }

    });

}

//</editor-fold>


//<editor-fold desc="LISTADO DE CARRERAS DE RECORRIDO REALIZADAS">
function list_carrera_recorrido_realizadas() {
    var datos = {
        'entity': 'CarreraRecorrido',
        'crud': 'listCarreraCursoRealizadas'
    };

    $.ajax({
        data: datos,
        url: './controller/CarreraRecorridoController.php',
        type: 'POST',
        dataType: 'JSON',
        before: function () {
            //$('#load').show();
        },
        success: function (datos) {
            if (datos[0]['success']) {

                $('#tblDetallsCarreraRealizadas tbody').empty();
                $.each(datos, function (index, record) {

                    var tbody = '<tr>';
                    tbody += '<td>' + record.id + '</td>';
                    tbody += '<td>' + record.fecha + '</td>';
                    tbody += '<td>' + record.cliente + '</td>';
                    tbody += '<td>' + record.placa + '</td>';
                    tbody += '<td>' + record.unidad + '</td>';
                    tbody += '<td>' + record.conductor + '</td>';
                    tbody += '<td>' + record.hraIni + '</td>';
                    tbody += '<td>' + record.hraFin + '</td>';
                    tbody += '<td>' + record.solicitada + '</td>';
                    tbody += '<td>' + record.asignada + '</td>';
                    tbody += '<td>' + record.aceptada + '</td>';
                    tbody += '<td>' + record.cancelada + '</td>';
                    tbody += '<td>' + record.realizada + '</td>';
                    tbody += '<td>' + record.hraDeSolicitud + '</td>';
                    $('#tblDetallsCarreraRealizadas tbody').append(tbody);
                });
//                $('#tblDetallUsers').DataTable({
//                    dom: 'Bfrtip',
//                    buttons: [
//                        'copy', 'csv', 'excel', 'pdf', 'print'
//                    ]
//                });


            }
            else {
                alert('ERROR AL CARGAR EL LISTADO DE CARRERAS');
                $('LBL_SMS_error').html('ERROR AL CARGAR LISTADO DE CARRERAS');
                setTimeout(function () {
                    $('LBL_SMS_error').fadeIn().fadeOut(2000);
                }, 10);

            }

        }

    });
}

//</editor-fold>


//<editor-fold desc="CALL NEW CARRERA">

function callNewCarreraAviso() {
//alert('test 2 fro call  new carrera');     
$('#modal_new_carrera').modal('show');
//playVideo();
playmp3();
}
//</editor-fold>

//<editor-fold desc="CLOSE WINDOWS MODADL AVISO CARRERA">

function stopWindowsAviso(){    
    $('#modal_new_carrera').modal('hide');
    stopmp3();
    flagAviso=true;
}

//</editor-fold>