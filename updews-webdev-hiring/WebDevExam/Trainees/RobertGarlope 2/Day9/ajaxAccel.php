<?php
define('DS', DIRECTORY_SEPARATOR); // separator
define('ROOT', dirname(__FILE__)); //root directory
require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'classes' . DS . 'autoload.php');
?>
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
	<body id="ajaxAccel">
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
						<h1>Graph</h1>
						Select Node
						<?php
						$obj = new Model();
						$arr_node = $obj->getNode();
						echo '<select name="node" class="node">';
						foreach($arr_node as $val)
						{
							echo '<option value="'.$val.'">'.$val.'</option>';
						}
						echo '</select>';
						$arr_accel = $obj->getAccel();
						?>
						<div id="graph1" style="width:100%; height:320px;"></div>
						<h2>Accel</h2>
						<button class="btn btn-lg btn-primary btn-block btnloadaccel" style="" type="button">Load Accel</button>
						<div class="load" style="padding-top:20px;width:100%;max-height:400px;overflow:auto;"></div>
						<h2>JSON Format</h2>
						<div class="json" style="width:100%;max-height:400px;overflow:auto;">
							<?=json_encode($arr_accel)?>
						</div>
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