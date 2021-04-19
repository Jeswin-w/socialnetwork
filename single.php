<!DOCTYPE html>
<?php
session_start();
include("include/header.php");

if(!isset($_SESSION['email']))
{
	header("location: index.php");
}
?>
<html>
<head>
	<title>View Post</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: black;">
	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-10">
			<?php single_post();?>
		</div>
	</div>


</body>
</html>