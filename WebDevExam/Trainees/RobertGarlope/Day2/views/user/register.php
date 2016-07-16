<?php
$_SESSION['session_id']= 1;
$this->title = "Registration Page";
$this->keyword = "registration";

?>
<!-- Registration form - START -->
<div class="container">
	<div class="body-content" id="login" style="padding-bottom:100px">
	<h1>Registration form</h1>
	<?php
	if(isset($isave))
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
		<form name="frmreg" id="frmreg" action="/<?=BASE_FOLDER?>/user/register" method="post">
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
<!-- Registration form - END -->
