// L= leaflet library class object
//initialize the map and set its view to our chosen geographical coordinates and a zoom level
let map=L.map('map');//setView(latitude, longitude, zoom level),setView call also returns the map object
//{s}: style, {z}: zoom level, {x}:latitude, {y}:longitude
//Creating a tile layer by setting the URL template for the tile images, the attribution text, and the maximum zoom level of the layer
let tileURL ='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
//required attribution for copyright notice.
let attribution ={attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
maxZoom: 18};

let tiles = L.tileLayer(tileURL, {attribution});
//add a tile layer to add to our map
tiles.addTo(map);

//Geolocation
if("geolocation" in navigator){
navigator.geolocation.getCurrentPosition(function(position){
   const lat = position.coords.latitude;
   const lng = position.coords.longitude;
   console.log(position);
   let marker = L.marker([lat, lng]).addTo(map);
   map.setView([lat, lng], 14);
   marker.bindPopup("<b>Your are here! </b> <br>"+ lat.toString()+","+lng.toString());
});
}else{
   console.log("geolocation not available")
}

marker.on("click", markerClick);
function markerClick(event) {
this.getPopup()
.setLatLng(event.latlng)
.setContent("Συντεταγμένες σημείου: " + event.latlng.toString());
}

// const api_url = "https://api.openstreetmap.org/api/0.6/map?bbox=<min long>, <min lat>, <max long>, <max lat>";

// async function getdata(){
//    const response = await fetch(api_url);
//    const data = await response.json();
//    const {latitude, longitude} = data;

   
//    L.marker([latitude, longitude]).addTo(mymap);

//    document.getElementById("lat").te
// }

// getdata();