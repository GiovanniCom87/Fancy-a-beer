const { matchesProperty } = require("lodash");

// Mappe
let mapid = document.querySelector('#map')
let cicle = document.querySelectorAll('.cicle')
let firstLat = cicle[0].getAttribute('lat')
let firstLon = cicle[0].getAttribute('lon')

let myMap = L.map('map').setView([firstLat, firstLon], 14)

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(myMap);

let beerIcon = L.icon({
    iconUrl: '/media/beerIcon.png',
    iconSize: [46, 46],
    iconAnchor: [23, 23],
    popupAnchor: [0, -28],
});

let markers = L.markerClusterGroup();

cicle.forEach(el => {
    let lat = el.getAttribute('lat')
    let lon = el.getAttribute('lon')
    let name = el.getAttribute('name')
    let description = el.getAttribute('description')
    let address = el.getAttribute('address')
    let link = el.getAttribute('link')

    let popup = 
        `
        <h3>${name}</h3>
        <p class="lead">${description}</p>
        <p class="font-italic">${address}</p>
        <div class="d-flex justify-content-end">
            <a class="btn bg-first text-light text-decoration-none" href="${link}">Vai al dettaglio</a>
        </div>
        `
    let marker = L.marker([lat, lon], {icon: beerIcon}).bindPopup(popup).openPopup()
    markers.addLayer(marker)
});



myMap.addLayer(markers)

