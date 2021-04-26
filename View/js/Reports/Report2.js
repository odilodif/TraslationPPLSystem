function staticsTraslationPPL(from, to, crs, typeT) {
    var dat = {
        "Traslation": 'Report2',
        "from": from,
        "to": to,
        "crs": crs,
        "typeT": typeT
    };

    $.ajax({
        data: dat,
        url: './Controller/TraslationController.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {

            $('#respuestaAjax').html('<img id="loader" src="./View/images/giphy.gif"/>');

        }
        ,
        success: function (result) {
            $('#respuestaAjax').html('');
            if (result[0]['success']) {
                var series = [];

                $.each(result, function (i, data) {
                    series.push(new Array(data.names, parseInt(data.numbers, 10)));
                });
                console.log(series);
                setValuesGraph(series);
            }
            else {
                alert(result[0]['message']);
                var series = [];
                setValuesGraph(series);
            }
        }
        ,
        error: function () {

        }


    })
}

function setValuesGraph(result) {
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Sistema de Traslados '
        },
        subtitle: {
            text: 'Fuente: <a href="http://http://snai.atencionintegral.gob.ec/">SNAI Atención Integral</a>'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Numero (tralados)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Numero: <b>{point.y:.1f} traslados</b>'
        },
        series: [{
                name: 'Population',
                data: result,
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    format: '{point.y:.1f}', // one decimal
                    y: 10, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
    });
}

function  validParameters() {
    if (jQuery('#txtdDateTo').val() != '' && jQuery('#txtdDateFrom').val() != '')
    {

        return true;
    }
    else
    {
        return false;
    }
}

function makeReport() {
    if (validParameters()) {

        var datefrom = $('#txtdDateFrom').val();
        var dateTo = $('#txtdDateTo').val();
        var crs = $('#crs_id_destination').val();
        ;
        var typeT = $('#trasl_type_id').val();
        staticsTraslationPPL(datefrom, dateTo, crs, typeT);
    }
    else
    {
        alert('Seleccione Fechas, CPL y Tipo de Traslado para obtener el Reporte')
    }
}
