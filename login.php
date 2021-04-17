<!doctype html>
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
<head><title>login</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script></head>
<style type="text/css">
	form{
		border-width: 1px;
    	border-style: solid;
    	margin: 80px 550px;
    	box-shadow: 2px 2px;
	}
	body
	{
		overflow-x: hidden;
	}
	
</style>
<html>
<head><title>Login</title></head>
<body>
	<div class="row" style="background-color: black; border-radius:0% 0% 50% 50%;">
	<h1 style="text-align:center;color: white;font-family: lobster;">Tce Network</h1>
	</div>
	<form action="" method="post">
		<h3 style="text-align: center;">Log in</h3>
		<div class="row" style="padding:20px 30px">
						<label>Email: </label>
						<input type="Email" class="form-control" required="required" name="email">
					</div>
		<div class="row" style="padding:20px 30px">
						<label>Password: </label>
						<input type="Password" class="form-control" required="required" name="passsword">
					</div>
					<a href="signup.php" color="blue" style="padding-left: 35%;">Create an account</a>
		<div class="row" style="padding:20px 43%">
						<button id="login" class="btn btn-info btn-lg" name="login" >Login</button>
						<?php include("clogin.php"); ?>
					</div>
	</form>

</body>
</html>