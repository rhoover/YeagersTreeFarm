function initialize() {
    var mapOptions = {
    zoom: 13,
    center: new google.maps.LatLng(40.11545, -75.57973),
    mapTypeControl: true,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    },
    zoomControl: true,
    zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL
    },
    streetViewControl: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById('map_canvas'),mapOptions);
    var marker = new google.maps.Marker({
        position: map.getCenter(),
        map: map,
        title: 'Yeagers Tree Farm'
    });
}


function loadScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&callback=initialize';
    document.body.appendChild(script);
}

window.onload = loadScript;

document.getElementById("loading").style.display = "none";