<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="<?php echo $this->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <meta name="description" content="<?php echo $this->description; ?>">
	<meta name="keywords" content="<?php echo $this->keyword; ?>">
	<title><?php echo $this->title ?></title>
    <link href="<?=BASE_HOST .'/'.BASE_FOLDER?>/css/bootstrap.css" rel="stylesheet">
	<?php
	$this->setCssFile(); 
	$this->setCssInline();
	?>
	<link href="<?=BASE_HOST.'/'. BASE_FOLDER?>/css/style.css" rel="stylesheet">
</head>
	<body>
		<div class="wrap">
			<div id="header-wrap">
				<div class="header-title"><h1>Philippine Institute of Volcanology and Seismology</h1></div>
				<div class="header-banner"><img src="/dyexample/img/lava.gif" alt="home banner" ></div>
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
								<li><a href="home">Home</a></li>
							</ul>
						</div>
					</div>
				</nav>    
			</div>
			<div class="clear"></div>
			<?php echo $content ?>
		</div>
		<div class="footer-line" style=""></div>
		<footer class="footer">
			<div class="container">
				<p style="text-align:center;color:#2ba6cb">&copy; <?php echo date('Y') ?></p>
			</div>
		</footer>
		<script src="<?=BASE_HOST .'/'.BASE_FOLDER?>/js/jquery.js"></script>
		<script src="<?=BASE_HOST .'/'.BASE_FOLDER?>/js/bootstrap.js"></script>
		<script src="<?=BASE_HOST .'/'.BASE_FOLDER?>/js/site.js"></script>
		<?php
			$this->setJsFile();
			$this->setJsInline();
		?>

	</body>
</html>