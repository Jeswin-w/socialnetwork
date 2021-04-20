<!DOCTYPE html>
<?php

session_start();
include("include/header.php");

if(!isset($_SESSION['email'])){
	header("location: index.php");
}
?>
<html>

<head>
	<title>find people</title>
	<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color: black;">
<div class="row">
	<div class="col-sm-12">
		<center><h2 style="color:white; font-family: 'zen dots'">Find new people</h2></center><br><br>
	</div>
</div>
<div class='row'>
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">
		<center>
	<form >
		<label class="control-label" style="color:white; font-family:'zen dots">search users:
			
		</label>
		<input type="text" style="width: 100%; " name="usearch">
		<button class="btn btn-info" type="submit"style="margin-top: 10px;width:15%" name="ubsearch">Search</button>
	</form>
</center>
<?php searchusers(); ?>
</div>
</div>
</body>
</html>