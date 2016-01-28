var myCenter = new google.maps.LatLng(14.64976, 121.06816);

function initialize() {
	var mapProp = {
		center: myCenter,
		zoom: 18,
		mapTypeId: google.maps.MapTypeId.TERRAIN
	};
	
	var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
	
	var marker=new google.maps.Marker({
		position:myCenter,
	});
	marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);