<!doctype html>
<html>

<style type="text/css">
	form{
		border-width: 1px;
    	border-style: solid;
    	margin: 60px 550px;
    	box-shadow: 2px 2px;
	}
	body
	{
		overflow-x: hidden;
	}
</style>
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
<head>
	<title>Signin</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="row" style="background-color: black; border-radius:0% 0% 50% 50%;">
	<h1 style="text-align:center;color: white;font-family: lobster;">Tce Network</h1>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form action="" method="post">
				<h3 style="text-align:center;">Signin</h3>
				<div class="inp">
					<div class="row" style="padding-top: 20px;">
						<div class="col-sm-6" style="padding-left: 30px;">
							<label>First name:</label>
							<input type="text" class="form-control" name="fn">
						</div>
						<div class="col-sm-6" style="padding-right: 30px">
							<label>last name:</label>
							<input type="text" class="form-control" name="ln">
						</div>
					</div>
					<div class="row" style="padding:15px 30px">
						<label>Email: </label>
						<input type="Email" class="form-control" name="email">
					</div>
					<div class="row" style="padding:15px 30px">
						<label>Role: </label>&emsp; &emsp;
						<input type="radio" name="role" value="Student"> Student &emsp; &emsp;
						<input type="radio" name="role" value="Teacher"> Teacher
					</div>
					<div class="row" style="padding:15px 30px">
						

						<label>department:</label> &emsp;

						<select style="width:40%;" id="items" name="dept">
						  <option value="mech">Mechanical</option>
						  <option value="civil">Civil</option>
						  <option value="eee">EEE</option>
						  <option value="ece">ECE</option>
						  <option value="cs">CSE</option>
						  <option value="it">IT</option>
						  <option value="me">Mechatronics</option>
						</select>
						</div>
					<div class="row" style="padding:15px 30px">
						<label>Password: </label>
						<input type="Password" class="form-control" name="passsword">
					</div>
					

					<a href="login.php" color="blue" style="padding-left: 30%;">Already have an account?</a>
						
					<div class="row" style="padding:15px 43%">
						<button id="signup" class="btn btn-info btn-lg" name="signup">Signin</button>
					</div>
					<?php
					include("insuser.php");?>


		</div>
	</form>
	</div>
</body>
</html>
