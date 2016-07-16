<?php
$this->title = "Graph Page";
$this->keyword = "graph";
$this->getJsFile("js/dygraph-combined.js");	
	$js = "
	$('.btn').click(function(){
		var url = '/".BASE_FOLDER."/site/quote';
		$.ajax({
			method: 'POST',
			url: url,
		}).done(function(data) {
			var d = $.parseJSON(data);
			if(d.length){
				
			}
		});	
	});
	var g4 = new Dygraph(
    document.getElementById('graphdiv4'),
    '/".BASE_FOLDER."/views/site/gamb.csv',
    {
      rollPeriod: 7,
      showRoller: true,
      errorBars: true,
      valueRange: [50,125]
    }
  );
	";

$this->getJsInline($js);
?>
<div id="home">
	<div class="container">
		<div class="content-wrap" >
			<div class="sidebar">
				 <nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div id="w0-collapse" class="collapse navbar-collapse">
						<ul id="w1" class="navbar-nav navbar-left nav">
							
							<li class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown">Information <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="/<?=BASE_FOLDER?>/site/about">Find Us</a></li>
									<li><a href="/<?=BASE_FOLDER?>/site/findus">About Us</a></li>
								</ul>
							</li>
					
							
						</ul>
					</div>
				</nav>    
			</div>
			<div class="main-content">
				<p style="font-size:25px">Graph</p>
				<div id="graphdiv4" style="width:100%; height:320px;"></div>
			</div>
		</div>
	</div>
</div>
  