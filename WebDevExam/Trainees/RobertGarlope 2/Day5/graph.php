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
	<body id="graph">
		<div class="wrap">
			<div id="header-wrap">
				<div class="header"><p>This Is Sample Home Page</p></div>
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
								<li><a href="index.php">Home</a></li>
								<li><a href="register.php">Register</a></li>
								<li><a href="graph.php">Graph</a></li>
							</ul>
						</div>
					</div>
				</nav>    
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
						<h1>Graph</h1>
						<div id="graph1" style="width:100%; height:320px;"></div>
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
		<script src="js/dygraph-combined.js"></script>
		<script src="js/site.js"></script>
	</body>
</html>