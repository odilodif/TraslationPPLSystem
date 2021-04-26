/*******************************************************************************
 * FUNCIONES ENCARGADAS DE MANEJAR LA INFORMACION DEL MAPA
 *******************************************************************************/
MARKERS = {};
MAP = null;
MONITORING = true;
$(document).ready(function () {
    initMap();
    $('.monitoring').click(function () {
        if (MONITORING) {
            $('.monitoring > b').text('Encender Radar !!! ');
            $('.monitoring .fa-gear').removeClass('fa-spin');
            addClassError('.monitoring', false);
        } else {
            $('.monitoring > b').text('Apagar Radar ');
            addClassError('.monitoring', true);
            $('.monitoring .fa-gear').addClass('fa-spin');
            setPositionMarkers();
        }
        MONITORING = !MONITORING;
    });
    $('.error-monitor-content').click(function () {
        addClassError('.error-monitor', true);
        $('.error-monitor').html('0');
    });
    setPositionMarkers();
});
function initMap() {
    var PAIS = new google.maps.LatLng(-0.1538635, -78.4794021);
    var myOptions = {zoom: 13, mapTypeId: google.maps.MapTypeId.ROADMAP, center: PAIS, streetViewControl: false};
    MAP = new google.maps.Map(document.getElementById("map"), myOptions);
    MAP.addListener('rightclick', function (e) {
        console.log(e.latLng.lat() + ',' + e.latLng.lng());
    });
}

function setPositionMarkers() {
    $.post('./controller/controller.TmpGPS.php', {'tmp_gps': 'coordinates'}, 
    function (data, textStatus, jqXHR) {
        if (data.STATUS != undefined) {
            if (data.STATUS) {
                $.each(data.RESPONSE, function (key, value) {
                    if (MARKERS[value.vehi_id] == undefined) {
                        try {
                            addMarker(value);
                        } catch (error) {
                            console.error('Error agregando marcador');
                        }
                    } else {
                        MARKERS[value.vehi_id].setPosition(new google.maps.LatLng({lat: parseFloat(value.lat), lng: parseFloat(value.lng)}));
                    }
                });
            } else {
                $('.error-monitor').text(parseInt($('.error-monitor').text()) + 1);
            }
        }
    }, "json").fail(function (error) {
        $('.error-monitor').text(parseInt($('.error-monitor').text()) + 1);
        addClassError('.error-monitor', true);
        $('.monitoring .fa-gear').removeClass('fa-spin');
    }).always(function () {
        setTimeout(function () {
            if (MONITORING)
                setPositionMarkers();
        }, 8000);
    });
}

function addMarker(info) {
    var marker = new google.maps.Marker({
        map: MAP,
        Label: "",
        icon: "./views/components/images/blue-dot.png",
        position: {lat: parseFloat(info.lat), lng: parseFloat(info.lng)}
    });
    var infowindow = new google.maps.InfoWindow({
        content: info.num_unidad
    });
    infowindow.open(map, marker);
    marker.addListener('click', function (e) {
        showInfoMarker(marker, infowindow);
    });
    MARKERS[info.vehi_id] = marker;
}

function showInfoMarker(marker, infowindow) {
    marker.setAnimation(google.maps.Animation.BOUNCE);
    marker.setAnimation(null);
    infowindow.open(map, marker);
}

function addClassError(element, error) {
    if (error) {
        $(element).removeClass('btn-primary');
        $(element).addClass('btn-danger');
    } else {
        $(element).removeClass('btn-danger');
        $(element).addClass('btn-primary');
    }
}

/**
 * Funciones list group
 */

$(document).ready(function () {
    $('.cd-dropdown').click(function () {
        setActiveElement($(this).find('ul'));
    });
});
function setActiveElement(list) {
//    console.log(list);
    $(list).find('li.cd-active').removeClass('cd-active');
    $(list).find('li:hover').addClass('cd-active');
}