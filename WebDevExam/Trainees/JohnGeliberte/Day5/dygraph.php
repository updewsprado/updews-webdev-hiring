<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Day5-Javascript</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/main.css" rel="stylesheet">
	<script src="//cdnjs.cloudflare.com/ajax/libs/dygraph/1.1.1/dygraph-combined.js" type="text/javascript">
	</script>
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script id="dsq-count-scr" src="//day5-javascript.disqus.com/count.js" async></script>
</head>
<body>
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Day5-Javascript</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="home.php">Home</a></li>
					<li class="active"><a href="dygraph.php">Dygraph</a></li>
					<li><a href="disqus.php">Disqus</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<div class="content-container">
	<h2>Dygraph</h2>
		<div id="graphdiv"></div>
		<script type="text/javascript">
			g = new Dygraph(document.getElementById("graphdiv"),"gamb.csv");
		</script>
	</div>
</body>
</html>