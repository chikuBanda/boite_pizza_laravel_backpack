

var mymap = L.map('mapid', {
    scrollWheelZoom: false
}).setView([32.343504,-6.3609538], 18);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiY2hpa3ViYW5kYSIsImEiOiJja2JjdDUyaDkwNTh6MnFtMmkzYzd2azNlIn0.6pwyB-xj585ezi8p3L8Sfg', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 17,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);

var geocodeService = L.esri.Geocoding.geocodeService();

var restaurantIcon = L.icon({
    iconUrl: '../uploads/img/restaurant_icon.png',

    iconSize:     [50, 60], // size of the icon
    iconAnchor:   [26, 58], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

var marker1 = L.marker([32.343504,-6.3609538], {
    draggable: false,
    icon: restaurantIcon
}).addTo(mymap);

var marker2 = L.marker([32.343927, -6.360257], {
    draggable: true
}).addTo(mymap);

geocodeService.reverse().latlng(marker2.getLatLng()).language("eng").run(function (error, result) {
    if (error) {
        return;
    }

    document.getElementById("address").innerHTML = result.address.Match_addr;
    document.getElementById("address_input").value = result.address.Match_addr;
});

var sector2 = L.circle([32.343504,-6.3609538], {
    color: 'green',
    fillColor: '#lime',
    fillOpacity: 0.1,
    radius: 1000
}).addTo(mymap);

var sector1 = L.circle([32.343504,-6.3609538], {
    color: 'orange',
    fillColor: 'orange',
    fillOpacity: 0.1,
    radius: 500
}).addTo(mymap);

sector1.bindPopup("Sector 1");
sector2.bindPopup("Sector 2");

function isInCircleRadius()
{
    var sector1Radius = sector1.getRadius();
    var sector1CircleCenterPoint = sector1.getLatLng();
    return Math.abs(sector1CircleCenterPoint.distanceTo(marker2.getLatLng())) <= sector1Radius;
}

function isInCircle2Radius()
{
    var sector2Radius = sector2.getRadius();
    var sector2CircleCenterPoint = sector2.getLatLng();
    return Math.abs(sector2CircleCenterPoint.distanceTo(marker2.getLatLng())) <= sector2Radius;
}

if(isInCircleRadius()){
    document.getElementById("sector").innerHTML = "sector 1";
    document.getElementById("sector_input").value = "sector 1";
    val = parseInt(document.getElementById("total_constant").value, 10);
    tot = val + 10;
    console.log(tot)
    document.getElementById("total_amount").value = tot;
    document.getElementById("display_total").innerHTML = "Total: $" + tot;
    document.getElementById("additional_price").innerHTML = "(plus $" + 10 + ")";
}
else if(isInCircle2Radius() && !isInCircleRadius())
{
    document.getElementById("sector").innerHTML = "sector 2";
    document.getElementById("sector_input").value = "sector 2";
    val = parseInt(document.getElementById("total_constant").value, 10);
    tot = val + 20;
    console.log(tot)
    document.getElementById("total_amount").value = tot;
    document.getElementById("display_total").innerHTML = "Total: $" + tot;
    document.getElementById("additional_price").innerHTML = "(plus $" + 20 + ")";
}
else if(!isInCircle2Radius() && !isInCircleRadius())
{
    document.getElementById("sector").innerHTML = "sector 3";
    document.getElementById("sector_input").value = "sector 3";
    val = parseInt(document.getElementById("total_constant").value, 10);
    tot = val + 30;
    console.log(tot)
    document.getElementById("total_amount").value = tot;
    document.getElementById("display_total").innerHTML = "Total: $" + tot;
    document.getElementById("additional_price").innerHTML = "(plus $" + 30 + ")";
}

marker2.on('move', function(e){
    geocodeService.reverse().latlng(e.latlng).language("eng").run(function (error, result) {
        if (error) {
            return;
        }

        document.getElementById("address").innerHTML = result.address.Match_addr;
        document.getElementById("address_input").value = result.address.Match_addr;
    });

    if(isInCircleRadius()){
        document.getElementById("sector").innerHTML = "sector 1";
        document.getElementById("sector_input").value = "sector 1";
        val = parseInt(document.getElementById("total_constant").value, 10);
        tot = val + 10;
        console.log(tot)
        document.getElementById("total_amount").value = tot;
        document.getElementById("display_total").innerHTML = "Total: $" + tot;
        document.getElementById("additional_price").innerHTML = "(plus $" + 10 + ")";
    }
    else if(isInCircle2Radius() && !isInCircleRadius())
    {
        document.getElementById("sector").innerHTML = "sector 2";
        document.getElementById("sector_input").value = "sector 2";
        val = parseInt(document.getElementById("total_constant").value, 10);
        tot = val + 20;
        console.log(tot)
        document.getElementById("total_amount").value = tot;
        document.getElementById("display_total").innerHTML = "Total: $" + tot;
        document.getElementById("additional_price").innerHTML = "(plus $" + 20 + ")";
    }
    else if(!isInCircle2Radius() && !isInCircleRadius())
    {
        document.getElementById("sector").innerHTML = "sector 3";
        document.getElementById("sector_input").value = "sector 3";
        val = parseInt(document.getElementById("total_constant").value, 10);
        tot = val + 30;
        console.log(tot)
        document.getElementById("total_amount").value = tot;
        document.getElementById("display_total").innerHTML = "Total: $" + tot;
        document.getElementById("additional_price").innerHTML = "(plus $" + 30 + ")";
    }

});

mymap.on('click', function (e) {
    geocodeService.reverse().latlng(e.latlng).language("eng").run(function (error, result) {
        if (error) {
            return;
        }

        //L.marker(result.latlng).addTo(mymap).bindPopup(result.address.Match_addr).openPopup();
        L.popup().setLatLng(result.latlng).setContent(result.address.Match_addr).openOn(mymap);
        console.log(result.address.Match_addr);
    });
});
