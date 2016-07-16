<?php
$ur_session = rand(0, 15);
$_SESSION['session_id']= 2;
$this->title = "Browser Tab";
$this->keyword = "";
	$js = "
	$('.btn').click(function(){
		var url = '/".BASE_FOLDER."/site/quote';
		$.ajax({
			method: 'POST',
			url: url,
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
	});
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
									<li><a href="/<?=BASE_FOLDER?>/site/findus">Find Us</a></li>
									<li><a href="/<?=BASE_FOLDER?>/site/about">About Us</a></li>
								</ul>
							</li>
					
							
						</ul>
					</div>
				</nav>    
			</div>
			<div class="main-content">
				<button class="btn btn-lg btn-primary btn-block" type="button">Generate quote</button>
				<h3>Random Quotes</h3>
				<div class="quote"></div>
			</div>
		</div>
	</div>
</div>
  