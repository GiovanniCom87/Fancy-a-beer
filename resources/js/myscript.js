const { matchesProperty } = require("lodash");
// Mappe

var map = L.map('map', {
    center: [45.47042, 9.18975],
    zoom: 14
});

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(map);