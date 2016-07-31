//I Assume that EEE building is UP EEE building
var EEEbuilding = new google.maps.LatLng(14.649512,121.068172);
function initialize() {
	var properties = {
		center:EEEbuilding,
		zoom:15,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("map-container"),properties);
	var marker = new google.maps.Marker({
		position:EEEbuilding,
	});
	marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);