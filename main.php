<!doctype html>
<html>
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
<style>
	body
	{
		overflow-x: hidden;
	}
	#signup{
		width:60%;

		border-radius: 30px;

	}
	#login{
		width:60%;
		background-color: white;
		border:1px solid #1da1f2;
		color:#1da1f2;
		border-radius: 30px;

	}

	#login:hover
	{
		width:60%;
		background-color: white;
		border:3px solid #1da1f2;
		color:#1da1f2;
		border-radius: 30px;
	}
	

</style>
<head>
	<title>
	Tce network
	</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
<body>
	<div class="row" style="background-color: black; border-radius:0% 0% 50% 50%;padding-bottom: 100px;"><br>
		<div class="text-center" style="color: blue;font-family: lobster;"><strong><h1>Tce Network</h1></strong></div><br>

		<div class="text-center" style="color:white;"><h4>A network to share your creations like articles,projects,photos and your skills</div>
			
	</div>
	<div class="row" style="margin-top: 50px;">
		<div class="col-sm-6">
			<img src="img_mountains_wide.jpg" style="width:100%; height: 50%; margin-left: 40px;">
		</div>
		<div class="col-sm-6" style="margin-top: 30px;">
			<div class="text-center" style="font-weight: 600px;"><b><h3>Join our network now</h3></b>
				<br>
				<form method="post" action="" >
					<label>Create an account: </label><br>
					<button id="signup" class="btn btn-info btn-lg" name="signup1" >Signin</button><br><br>
					<?php
					    if(isset($_POST['signup1'])){
					    echo "<script>window.open('signup.php','_self')</script>";
					}?>
					<label>Already have an account</label><br>
					<button id="login" class="btn btn-info btn-lg" name="login1" >login</button><br>
					<?php
					    if(isset($_POST['login1'])){
					    echo "<script>window.open('login.php','_self')</script>";
					}?>
				</form>
			</div>
		</div>


		
	</div>
	
</body>
</html>