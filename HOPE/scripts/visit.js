// L= leaflet library class object
//get the date for the current user
var current_date = new Date();
//get day
console.log(current_date);
var current_day = current_date.toLocaleString('en-us', {
   weekday: 'long'
});
console.log(current_day);

//create layerGroup
var markers = new L.layerGroup();
 // set view to our chosen geographical coordinates and a zoom level
   //initialize the map 
   let map=L.map('map');
   let tileURL ='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
   //required attribution for copyright notice.
   let attribution ={attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
   maxZoom: 18};
   map.addLayer(new L.TileLayer(tileURL, {attribution}));

//Geolocation
if("geolocation" in navigator){
   navigator.geolocation.getCurrentPosition(function(position){
   const lat = position.coords.latitude;
   const lng = position.coords.longitude;
   // console.log(position);
   let singleMarker = L.marker([lat, lng]).addTo(map);
   map.setView([lat, lng], 14);//setView(latitude, longitude, zoom level),setView call also returns the map object
   //{s}: style, {z}: zoom level, {x}:latitude, {y}:longitude
   singleMarker.bindPopup("<b>Your are here! </b> <br>"+ lat.toString()+","+lng.toString()+ "<br>" + popupContent);
   var popupContent = "Click here to register your visit." + '<a class="smallPolygonLink" href="visitation.php"></a>';
   // singleMarker.bindPopup(popupContent);
   markers.addLayer(singleMarker);
   // $('<a href="#" class="speciallink">TestLink</a>').click(function() {
   //  alert("test");})[0];
});
}else{
   console.log("geolocation api not available in this browser.")
}

let Search = new L.Control.Search(
   {sourceData: searchByAjax, 
   position: "topright",
   delayType: 1500,
   collapsed: false,
   textPlaceholder: 'Search...',
   hideMarkerOnCollapse: true,
   markerLocation: true,
   autoType: true,
   }
)
map.addControl(Search);
map.addLayer(markers);

Search.on('search:collapsed', () => {
   markers.clearLayers();
   console.log();
})

//filterData options for control search
function searchByAjax(text, callResponse){//callback for 3rd party ajax requests
      console.log(text);
      const result = $.ajax({
         url: 'includes/data.inc.php?=q',
         type: 'POST',
         data: {q: text},
         dataType: 'json',
         success: function(data) {
            callResponse(data);
            console.log(data);
         }
      });

   result.done(getHours); 
   
   function getHours(response){
      // console.log(response[1].name);
      let name = [];
      let address = [];
      let lat = [];
      let lng = [];
      let ids = [];

      for(let i=0; i<response.length; i++){
         name.push(response[i].name);
         address.push(response[i].address);
         lat.push(response[i].lat);
         lng.push(response[i].lng);
         ids.push(response[i].id);
      }
      
         const h = $.ajax({
         url: 'includes/popEst.inc.php',
         type: 'POST',
         data: {q: current_day, ids : ids},
         // dataType: 'text',
         success: function(data) {
            // callResponse(json);
            console.log(data);
            hours = JSON.parse(data);

            if (response.length == hours.length){

               for(let i=0; i<hours.length; i++){
                  let Hours = [];
                  Hours = Object.values(hours[i]);
                  // console.log(Hours);
                  let pop = [];
                  pop.push(Hours[current_date.getHours()+1], Hours[current_date.getHours()+2], Hours[current_date.getHours()+3]);

                  let estimate = calcPop(pop);

                  if (estimate >= 0 && estimate <= 32) {
				         var marker = L.marker(L.latLng(lat[i], lng[i]), {icon: green}).addTo(map);
				      } 
                  else if (estimate >= 33 && estimate <= 65) {
					      var marker = L.marker(L.latLng(lat[i], lng[i]), {icon: orange}).addTo(map);
				      } 
                  else if (estimate >= 66) {
					      var marker = L.marker(L.latLng(lat[i], lng[i]), {icon: red}).addTo(map);
				      } 
                  else {
			            var marker = L.marker(L.latLng(lat[i], lng[i]), {icon: blue}).addTo(map);
				      } 

                  marker.bindPopup( name[i] + "<br>   Address : "+ address[i]+ "<br> Average visitors in the next two hours : "+ calcPop(pop));
                  markers.addLayer(marker);
               }
            }
         }
      });
   }  
}

function calcPop(pop){
         est = Math.round(pop.reduce((a, b) => a + b) / pop.length);
         return est; 
      }

const green = L.icon({
		iconUrl: 'img/green.png',
		iconSize: [38, 38],
		iconAnchor: [20, 0]
	});

	const orange = L.icon({
		iconUrl: 'img/orange.png',
		iconSize: [38, 38],
		iconAnchor: [20, 0]
	});

	const red = L.icon({
		iconUrl: 'img/red.png',
		iconSize: [38, 38],
		iconAnchor: [20, 0]
	});

	const blue = L.icon({
		iconUrl: 'img/blue.png',
		iconSize: [38, 38],
		iconAnchor: [20, 0]
	});




