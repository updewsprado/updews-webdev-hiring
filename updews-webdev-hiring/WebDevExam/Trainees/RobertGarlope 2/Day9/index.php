<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="example">
	<meta name="keywords" content="">
	<title>Browser Tab</title>
    <link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
</head>
	<body>
		<div class="wrap">
			<div id="header-wrap">
				<?php
					require_once('header.php');
				?> 
			</div>
			<div class="clear"></div>
			<div class="container">
				<div class="content-wrap" >
					<div class="sidebar">
						<nav class="navbar navbar-default" role="navigation">
							<div class="container">
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
										<a class="dropdown-toggle" href="#" data-toggle="dropdown">Menu<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="findus.php">Find Us</a></li>
											<li><a href="about.php">About Us</a></li>
										</ul>
									</ul>
								</div>
							</div>
						</nav>
					</div>
					<div class="main-content">
						<button class="btn btn-lg btn-primary btn-block random" type="button">Generate quote</button>
						<h3>Random Quotes</h3>
						<div class="quote"></div>
						<div class="clear" style="padding-top:10px"></div>
						<div id="disqus_thread"></div>
						<div class="clear" style=""></div>
					</div>
				</div>
			</div>
  		</div>
		<footer class="footer">
			<div class="container">
				<p style="text-align:center;color:#2ba6cb">&copy; 2016</p>
			</div>
		</footer>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<script>
		(function() { // DON'T EDIT BELOW THIS LINE
			var d = document, s = d.createElement('script');
			s.src = '//myrobert.disqus.com/embed.js';
			s.setAttribute('data-timestamp', +new Date());
			(d.head || d.body).appendChild(s);
		})();
		</script>
		<script id="dsq-count-scr" src="//myrobert.disqus.com/count.js" async></script>
		<script src="js/site.js"></script>
	</body>
</html>