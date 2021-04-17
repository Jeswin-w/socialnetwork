<?php 

session_start();
include("include/connection.php");

if(isset($_POST['login']))
{
	$email=htmlentities(mysqli_real_escape_string($con,$_POST['email']));
	$pass=htmlentities(mysqli_real_escape_string($con,$_POST['passsword']));

	$selectuser="select * from users where email='$email' AND  password='$pass'";
	$query=mysqli_query($con,$selectuser);
	$checkuser=mysqli_num_rows($query);

	if ($checkuser==1)
	{
		$_SESSION['email']=$email;
		echo "<script>window.open('home.php','_self')</script>";
	}
	else
	{
		echo "<script>alert('email or password is incorrect')</script>";
	}
}
?>