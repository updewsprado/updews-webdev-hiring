<?php
define('DS', DIRECTORY_SEPARATOR); // separator
define('ROOT', dirname(__FILE__)); //root directory
require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'classes' . DS . 'autoload.php');

$isave = 0;
if(isset($_POST['txtfname'])) // submitted form checked
{
	$isave = 1;
	if(trim($_POST['txtfname']) && trim($_POST['txtage']) && trim($_POST['txtemail']))
	{
		$obj = new Model();
		if($obj->register($_POST))
			$message = "User Info successfully saved";
		else
			$message = "Server Error";
	}
	else
	{
		$message = "Please fill up your name,age,email";
	}
}
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
	<body>
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
							</ul>
						</div>
					</div>
				</nav>    
			</div>
			<div class="clear"></div>
			<div class="container">
				<div class="content-wrap" >
					<h1>Registration form</h1>
					<?php
					if($isave)
					{
					?>
					<div class="alert alert-info fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<?php echo $message; ?>
					</div>
					<?php
					}
					?>
					<div class="row">
						<form name="frmreg" id="frmreg" action="register.php" method="post">
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text" class="form-control" value="<?php echo (isset($_POST['txtfname']) ? $_POST['txtfname'] : '') ?>" id="txtfname" name="txtfname" placeholder="Name" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" value="<?php echo (isset($_POST['txtage']) ? $_POST['txtage'] : '') ?>" id="txtage" name="txtage" placeholder="Age" >
								</div>
								<div class="form-group">
									<input type="email" value="<?php echo (isset($_POST['txtemail']) ? $_POST['txtemail'] : '') ?>" class="form-control" id="txtemail" name="txtemail" placeholder="Email" required>
								</div>	
								<button class="btn btn-lg btn-primary btn-block" type="submit">submit</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
  		</div>
		<footer class="footer">
			<div class="container">
				<p style="text-align:center;color:#2ba6cb;padding:50px 10px">&copy; 2016</p>
			</div>
		</footer>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/site.js"></script>
	</body>
</html>