<?php
define('DS', DIRECTORY_SEPARATOR); // separator
define('ROOT', dirname(__FILE__)); //root directory
require_once(ROOT . DS . 'config' . DS . 'config.php');
$apikey = MAP_API;
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="example">
	<meta name="keywords" content="">
	<title>Find Us</title>
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
	<body id="findus">
		<div class="wrap">
			<div id="header-wrap">
				<?php
					require_once('header.php');
				?>   
			</div>
			<div class="clear"></div>
			<div class="container">
				<div class="content-wrap" >
					<div style="padding-top:10px"></div>
				<div id="map" class="mapclass"></div>
				</div>
			</div>
  		</div>
		<footer class="footer">
			<div class="container">
				<p style="text-align:center;color:#2ba6cb;padding:50px 10px">&copy; 2016</p>
			</div>
		</footer>
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=<?=$apikey?>" type="text/javascript"></script>
		<script src="js/site.js" type="text/javascript"></script>
	</body>
</html>