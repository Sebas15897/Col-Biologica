'use strict';
let latitud = parseFloat(document.getElementById('lati').value);
let longitud = parseFloat(document.getElementById('longi').value);
console.log(latitud)
console.log(longitud)
// Initialize and add the map
function initMap() {
    // The location of Uluru
    const uluru = { lat: latitud, lng: longitud };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 6,
      center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
}