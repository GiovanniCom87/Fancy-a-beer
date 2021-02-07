const { matchesProperty } = require("lodash");

// Navbar
let navbar = document.querySelector('#navbar')

document.addEventListener('scroll', ()=>{
    
    if(window.pageYOffset > 20){
        navbar.classList.add('navbar-scroll')
    }else{
        navbar.classList.remove('navbar-scroll')
    }
})

// Mappe
let mapid = document.querySelector('#map')
let cicle = document.querySelectorAll('.cicle')
let firstLat = cicle[0].getAttribute('lat')
let firstLon = cicle[0].getAttribute('lon')

let myMap = L.map('map').setView([firstLat, firstLon], 9)

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

// Ricerca indirizzi
// let resultDiv = document.querySelector("#results")

//         function chooseAddr(lat1, lng1, addr)
//         {
//             resultDiv.style.opacity = '0'
//             resultDiv.style.zIndex = '-1'
//             lat = lat1.toFixed(8);
//             lon = lng1.toFixed(8);
//             address = addr
//             document.getElementById('address').value = address
//             document.getElementById('lat').value = lat;
//             document.getElementById('lon').value = lon;
//         }
        
//         function myFunction(arr)
//         {
//             var out = "<br />";
//             var i;
//             resultDiv.style.opacity = "1"
//             resultDiv.style.zIndex = "1"
            
//             if(arr.length > 0)
//             {
//                 for(i = 0; i < arr.length; i++)
//                 {
//                     out += `<div class='pointer' title='Show Location and Coordinates' onclick='chooseAddr(${[arr[i].lat, arr[i].lon]}, "${arr[i].display_name}")'> ${arr[i].display_name} </div>`;
//                 }
//                 resultDiv.innerHTML = out;
//             }
//             else
//             {
//                 resultDiv.innerHTML = "Sorry, no results...";
//             }
//         }
        
//         function addr_search()
//         {
//             var inp = document.getElementById("address");
//             var xmlhttp = new XMLHttpRequest();
//             var url = "https://nominatim.openstreetmap.org/search?format=json&limit=5&q=" + inp.value;
//             xmlhttp.onreadystatechange = function()
//             {
//                 if (this.readyState == 4 && this.status == 200)
//                 {
//                     var myArr = JSON.parse(this.responseText);
//                     console.log(myArr)
//                     myFunction(myArr);
//                 }
//             };
//             xmlhttp.open("GET", url, true);
//             xmlhttp.send();
//         }