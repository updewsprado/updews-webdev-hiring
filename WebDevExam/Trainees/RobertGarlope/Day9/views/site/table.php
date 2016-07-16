<?php
$_SESSION['session_id']= 2;
$this->title = "Graph Table Accel";
$this->getJsFile("js/dygraph-combined.js");	
	$js = "
    $('.node').change(function(){
		getNote($(this).val());
	});
	
	$('.btn').click(function(){
		loadAccel();
	});
	
	function getNote(id)
	{
		if(id != '')
		{
			loader();
			var url = '/".BASE_FOLDER."/site/node/'+id;
			$.ajax({
				method: 'POST',
				url: url,
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
				g.ready(function () { loaderRemove(); });
			});
		}
	}
		
	function loadAccel()
	{
		loader();
		var url = '/".BASE_FOLDER."/site/accel';
		$.ajax({
			method: 'POST',
			url: url,
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
			loaderRemove();
		});
	}	
	function loader()
	{
		var loader = '<div class=\"overlay\"></div>';
		$('body').append(loader);
	}
	function loaderRemove()
	{
		$('.overlay').remove();
	}
	 ";
$this->getJsInline($js);
$obj = new Site();
?>
<div id="home">
	<div class="container">
		<div class="content-wrap" >
			<h2>Graph</h2>
			<?php
			$obj->getNode();
			?>
			
			<div id="graph1" style="width:100%; height:320px;"></div>
			<button class="btn btn-lg btn-primary btn-block" style="" type="button">Load Accel</button>
			<h2>JSON Format</h2>
			<div class="json" style="width:100%;max-height:400px;overflow:auto;">
			<?php
			//echo $obj->getAccel();
			?>
			</div>
			<h2>Accel Table</h2>
			
			<div class="load" style="padding-top:20px"></div>
			
		</div>
	</div>
</div>
  