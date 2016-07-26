jQuery(document).ready(function () {
	
	var webpage = 
	{
			/*
			find us page js
			*/
			findus: 
			{ 
				/*
				initiaze map
				*/
				initMap: function()
				{ 
					var eeeb = {lat: 50.936564, lng: -1.395031};
					var map = new google.maps.Map(document.getElementById('map'), {
					  zoom: 8,
					  center: eeeb
					});

					var contentString = 'EEE building'; // infowindow content

					var infowindow = new google.maps.InfoWindow({
					  content: contentString
					});

					var marker = new google.maps.Marker({ // Marker
					  position: eeeb,
					  map: map,
					  title: 'EEE building'
					});
					infowindow.open(map, marker); // initiaze open window
					marker.addListener('click', function() {
					  infowindow.open(map, marker);  // open window
					});
				}
			},
			/*
			Home Page
			*/
			home:
			{
				/*
				Random Quotes
				*/
				quote: function()
				{
					var url = 'ajaxfunc.php';
					$.ajax({
						method: 'POST',
						url: url,
						data: {cases:1}
					}).done(function(data) {
						var d = $.parseJSON(data);
						if(d.length){

							var ul = '<ul>',li='';
							for(var i in d)
								li += '<li>'+d[i]+'</li>'
							ul += li+'</ul>'	
							$('.quote').html(ul);
							
						}
					});	
				}
			}
			
	} 
	//check if findus page
	if($("#findus").length > 0)
		webpage.findus.initMap();
	
	//create random quotes
	$('.random').click(function(){
		webpage.home.quote();
	});	
});