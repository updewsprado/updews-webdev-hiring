<?php
$this->title = "Find Us";
$this->keyword = "find us";
$apikey = MAP_API;
$this->getOutSideJsFile("https://maps.googleapis.com/maps/api/js?key=".$apikey);

	$js = "function initMap(){ //initiaze map
			var eeeb = {lat: 50.936564,-1.395031};
			var map = new google.maps.Map(document.getElementById('map'), {
			  zoom: 5,
			  center: eeeb
			});

			var contentString = 'Building';

			var infowindow = new google.maps.InfoWindow({
			  content: contentString
			});

			var marker = new google.maps.Marker({
			  position: eeeb,
			  map: map,
			  title: 'EEE Building'
			});
			infowindow.open(map, marker);
			marker.addListener('click', function() {
			  infowindow.open(map, marker);
			});
		};
		initMap();
		";
		
$this->getJsInline($js);	
	
$css = '
		#map {
        height: 350px;
		width: 500px;
		margin:0 auto;
      }
	';
$this->getCssInline($css);	
?>
<div id="about">
	<div class="container">
		<div class="content-wrap" >
			<h3>Find Us</h3>
			<div style="padding-top:10px"></div>
			<div id="map"></div>
		</div>
	</div>
</div>
  