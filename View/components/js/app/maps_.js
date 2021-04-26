
$(document).ready(function () {
    initMap();
    $('.monitoring').click(function () {
        displayMarker(0);
    });
});

map;
marker;
var points = [{lat: -0.1415132037475103, lng: -78.48291635513306},
    {lat: -0.1440666587999194, lng: -78.48310947418213},
    {lat: -0.14758570562907944, lng: -78.48371028900146},
    {lat: -0.15119058229132162, lng: -78.48405361175537},
    {lat: -0.15505294947921341, lng: -78.48491191864014},
    {lat: -0.15917280703588985, lng: -78.48362445831299},
    {lat: -0.15754203018359475, lng: -78.48087787628174},
    {lat: -0.15505294947921341, lng: -78.47744464874268}];
function initMap() {
    var PAIS = new google.maps.LatLng(-0.1538635, -78.4794021);
    var myOptions = {zoom: 14, mapTypeId: google.maps.MapTypeId.ROADMAP, center: PAIS, streetViewControl: false};
    map = new google.maps.Map(document.getElementById("map"), myOptions);
    map.addListener('click', function (e) {
        console.log(e.latLng.lat() + ',' + e.latLng.lng());
    });

    marker = new google.maps.Marker({
        map: map,
        Label: "",
        icon: "./components/images/blue-dot.png",
        animation: google.maps.Animation.DROP,
        position: {lat: -0.1415132037475103, lng: -78.48291635513306}
    });
    infowindow = new google.maps.InfoWindow({
        content: "UNIDAD 1"
    });
    infowindow.open(map, marker);
    marker.addListener('click', getInfoMarker);
//                displayMarker(3);
//                console.log(marker.position.lat() + ',' + marker.position.lng());
}
function displayMarker(x) {
    if (x < points.length) {
//                    console.log('empieza '+x)
        marker.setPosition(new google.maps.LatLng(points[x]));
        setTimeout(function () {
            displayMarker(x += 1);
        }, 1000);
    } else {
        displayMarker(0);
    }
}
function getInfoMarker() {
    marker.setAnimation(google.maps.Animation.BOUNCE);
    console.log(marker)
    marker.setAnimation(null);
    infowindow.open(map, marker);
}