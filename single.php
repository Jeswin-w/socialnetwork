<!DOCTYPE html>
<?php
session_start();
invlude("include/header.php");

if(!isset($_SESSION['email']))
{
	header("location: index.php");
}
?>
<html>
<head>
	<title>View Post</title>
</head>
<body>

</body>
</html>