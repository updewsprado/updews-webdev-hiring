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
			},
			/*
			Graph page
			*/
			graph:
			{
				/*dygraph*/
				dygraph: function()
				{
					webpage.showLoader();
					var g = new Dygraph(
						document.getElementById('graph1'),
						'gamb.csv',
						{
							drawPoints: true,
							drawAxesAtZero: true,
							connectSeparatedPoints: false,
							title: 'Line Graph'
						}
					  );
					 g.ready(function () { webpage.removeLoader(); });
				}
			},
			/*
			PHP AND Ajax Accel
			*/
			accel:
			{
				//get selected node
				getNote: function($id)
				{
					webpage.showLoader();
					var url = 'ajaxfunc.php';
					$.ajax({
						method: 'POST',
						url: url,
						data: {cases:2,id:$id}
					}).done(function(data) {
						var d = $.parseJSON(data),arr=[];
						for(var i in d)
							arr.push([d[i].xval,d[i].yval,d[i].zval,d[i].mval]);
						var g = new Dygraph(
							document.getElementById('graph1'),
							arr,
							{
								drawPoints: true,
								drawAxesAtZero: true,
								connectSeparatedPoints: true,
								title: 'Line Graph'
							}
						);
						 g.ready(function () { webpage.removeLoader(); });
					});
				},
				//get all data of accel using ajax
				getAccelData: function()
				{
					webpage.showLoader();
					var url = 'ajaxfunc.php';
					$.ajax({
						method: 'POST',
						url: url,
						data: {cases:3}
					}).done(function(data) {
						
						$('.json').html(data);
						var d = $.parseJSON(data);
						var tbl = '<div class=\"table-responsive\">';
							tbl += '<table class=\"table table-striped\">';
							tbl += '<thead>';
							tbl += '<tr>';
							tbl += '<th>timestamp</th>';
							tbl += '<th>node</th>';
							tbl += '<th>xval</th>';
							tbl += '<th>yval</th>';
							tbl += '<th>zval</th>';
							tbl += '<th>mval</th>';
							tbl += '<th>purged</th>';
							tbl += '</tr>';
							tbl += '</thead>';
							tbl += '<tbody>';
							
								for(var i in d)
									tbl += '<tr><td>'+d[i].dtime+'</td><td>'+d[i].node+'</td><td>'+d[i].xval+'</td><td>'+d[i].yval+'</td><td>'+d[i].zval+'</td><td>'+d[i].mval+'</td><td>'+d[i].purged+'</td></tr>';
								
							tbl += '</tbody>';
							tbl += '</table>';
							tbl += '</div>';
						$('.load').html(tbl);
						webpage.removeLoader();
					});
				}
			},
			/*
			show loader gif in the body
			*/
			showLoader: function()
			{
				var loader = '<div class=\"overlay\"></div>';
				$('body').append(loader);
			},
			/*
			remove loader gif on the body
			*/
			removeLoader: function()
			{
				$('.overlay').remove();
			}
			
	};
	
	/* inialized functions */
	
	//check if findus page
	if($("#findus").length > 0)
		webpage.findus.initMap();
	 //check if Graph page
	else if($("#graph").length > 0)
		webpage.graph.dygraph();
	//check if phpaccel page
	else if($("#phpAccel").length > 0)
		webpage.accel.getNote(1);
	
	//create random quotes
	$('.random').click(function(){
		webpage.home.quote();
	});	
	
	//php and ajax accel table
	$('.node').change(function(){
		webpage.accel.getNote($(this).val());
	});
	
	//button load accel table
	$('.btnloadaccel').click(function(){
		webpage.accel.getAccelData();
	});
});