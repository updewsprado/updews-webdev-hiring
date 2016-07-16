<?php
$_SESSION['session_id']= 2;
$this->title = "Graph Table Accel";
$this->getJsFile("js/dygraph-combined.js");	
	$js = "
    $('.node').change(function(){
		getNote($(this).val());
	});
	getNote(1);
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
				console.log(arr);
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
			<h2>Accel Table</h2>
			<?php
			$accel = $obj->getAccel();
			?>
			<div class="table-responsive">
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>timestamp</th>
					<th>node</th>
					<th>xval</th>
					<th>yval</th>
					<th>zval</th>
					<th>mval</th>
					<th>purged</th>
				  </tr>
				</thead>
				<tbody>
					<?php
						while(list($key, $value) = each($accel))
						{
							echo "<tr><td>{$value['dtime']}</td><td>{$value['node']}</td><td>{$value['xval']}</td><td>{$value['yval']}</td><td>{$value['zval']}</td><td>{$value['mval']}</td><td>{$value['purged']}</td></tr>";
						}
					?>
				 </tbody>
			  </table>
			</div>
			
		</div>
	</div>
</div>
  