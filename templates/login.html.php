<!DOCTYPE html>
<html lang="en">
<head>
	<title>Brokfree Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="../brokfree/templates/favicon.ico"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../brokfree/templates/CSS/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../brokfree/templates/CSS/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../brokfree/templates/CSS/animate.css">
	<link rel="stylesheet" type="text/css" href="../brokfree/templates/CSS/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../brokfree/templates/CSS/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../brokfree/templates/CSS/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../brokfree/templates/CSS/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../brokfree/templates/CSS/util.css">
	<link rel="stylesheet" type="text/css" href="../brokfree/templates/CSS/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
	<style>
	.jumbotron{
		background-color:inherit;
		font-size: 30px;
		margin:0px 10px;
		color: aliceblue;
	}
	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../brokfree/templates/bg-01.jpg');">
			<div class="wrap-login100">
				<?php if($error):?>
					<div class="jumbotron text-capitalize text-center"><?=$msg?></div>
				<?php endif;?>
				<form action="login.php" class="login100-form validate-form" method="POST">
					<span class="login100-form-logo">
						<img src="https://tlr.stripocdn.email/content/guids/CABINET_75694a6fc3c4633b3ee8e3c750851c02/images/12331522050090454.png">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="text" name="email" placeholder="Email" autocomplete="off">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="ksi">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="../brokfree/templates/JS/animsition.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="../brokfree/templates/JS/select2.min.js"></script>
	<script src="../brokfree/templates/JS/moment.min.js"></script>
	<script src="../brokfree/templates/JS/daterangepicker.js"></script>
	<script src="../brokfree/templates/JS/countdowntime.js"></script>
	<script src="../brokfree/templates/JS/main.js"></script>
</body>
</html>