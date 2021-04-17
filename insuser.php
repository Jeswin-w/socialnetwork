<?php 
include ("include/connection.php");
if (isset($_POST['signup'])) 
	{
		$fname=htmlentities(mysqli_real_escape_string($con,$_POST['fn']));
		$lname=htmlentities(mysqli_real_escape_string($con,$_POST['ln']));
		$email=htmlentities(mysqli_real_escape_string($con,$_POST['email']));
		$pwd=htmlentities(mysqli_real_escape_string($con,$_POST['passsword']));
		$role=htmlentities(mysqli_real_escape_string($con,$_POST['role']));
		$dept=htmlentities(mysqli_real_escape_string($con,$_POST['dept']));

		$username=strtolower($fname . $lname);
		$checkusernameq="select username from users where email='$email'";
		$rununame=mysqli_query($con,$checkusernameq);

		if(strlen($pwd)<6)
		{
			echo"<script>alert('passsword shoud me minimum 6 characters')</script>";
			exit();
		}
		$checkemail="select * from users where email='$email'";
		$runemail=mysqli_query($checkemail);
		$check=mysqli_num_rows($runemail);

		if($check==1)
		{
			echo"<script>alert('email exist try logging in')</script>";
			echo"<script>window.open('signup.php','_self')</script>";
			exit();
		}
		$profilepic="prof.jfif";

		$insert="insert into users (fname,lname,username,description,email,password,userimage,role,dept,regdate)
		values('$fname','$lname','$username','No description','$email','$pwd','$profilepic','$role','$dept',NOW())";
		$query=mysqli_query($con,$insert);

		if($query)
		{
			echo "<script>alert('account created')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		}


	}

?>