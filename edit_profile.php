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
	  <title>Send message</title>
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
	<?php 
	global $con;
	$select="select * from users users where user_id='$user_id'";
    $run=mysqli_query($con,$select);
    $roww=mysqli_fetch_array($run);

    $name= $row['username'];
	$img= $row['userimage'];
	$mail= $row['email'];
	$fname= $row['fname'];
	$lname= $row['lname'];
	$description=$row['description'];
	$role= $row['role'];
	$dept= $row['dept'];
	$password= $row['password'];
	
	echo"<div class='col-sm-12'><center><h2 style='color:white; font-family: lobster;'>Edit Profile</h2></center><br><br>
	</div>
	<div class='row' style='color: white;'>
		<div class='col-sm-2'></div>
		<center><div class='col-sm-2'><h3>First Name:</h3></div></center>
		<div class='col-sm-2'><h3>$fname</h3></div>
		<form method='post'>
			<div class='col-sm-2'><label>New First Name:
				<input type='text' name='cf' style='color:black;'></label></div>
				<div class='col-sm-2' name='cl'>
					<center style='margin-top: 15px;'><button class='btn btn-info' name='f'>Change</button></center>
				</div>
			</form>
</div>
		";
		if(isset($_POST['f']))
		{
			$c=$_POST['cf'];
			if($c=='')
			{
				echo "<script>alert('Enter data to change')</script>";
			}
			else
			{
				
				$update="update users set fname='$c' where user_id='$user_id'";
				$run=mysqli_query($con,$update);
				if($run){
								
							header("Refresh:0");
						}
			}
		}
       echo"
	<div class='row' style='color: white;'>
		<div class='col-sm-2'></div>
		<center><div class='col-sm-2'><h3>Last Name:</h3></div></center>
		<div class='col-sm-2'><h3>$lname</h3></div>
		<form method='post'>
			<div class='col-sm-2'><label>New last Name:
				<input type='text' name='cl' style='color:black;'></label></div>
				<div class='col-sm-2' name='cl'>
					<center style='margin-top: 15px;'><button class='btn btn-info' name='f2'>Change</button></center>
				</div>
			</form>
</div>
		";
		if(isset($_POST['f2']))
		{
			$c=$_POST['cl'];
			if($c=='')
			{
				echo "<script>alert('Enter data to change')</script>";
			}
			else
			{
				
				$update="update users set lname='$c' where user_id='$user_id'";
				$run=mysqli_query($con,$update);
				if($run){
								
							header("Refresh:0");
						}
			}
		}?>
		<?php

		echo"
	<div class='row' style='color: white;'>
		<div class='col-sm-2'></div>
		<center><div class='col-sm-2'><h3>user Name:</h3></div></center>
		<div class='col-sm-2'><h3>$name</h3></div>
		<form method='post'>
			<div class='col-sm-2'><label>New user Name:
				<input type='text' name='cu' style='color:black;'></label></div>
				<div class='col-sm-2' name='cu'>
					<center style='margin-top: 15px;'><button class='btn btn-info' name='f3'>Change</button></center>
				</div>
			</form>
</div>";
		if(isset($_POST['f3']))
		{
			$c=$_POST['cu'];
			if($c=='')
			{
				echo "<script>alert('Enter data to change')</script>";
			}
			else
			{
				
				$update="update users set username='$c' where user_id='$user_id'";
				$run=mysqli_query($con,$update);
				
			}
		}

		echo"
	<div class='row' style='color: white;'>
		<div class='col-sm-2'></div>
		<center><div class='col-sm-2'><h3>descrption</h3></div></center>
		<div class='col-sm-2'><h3>$description</h3></div>
		<form method='post'>
			<div class='col-sm-2'><label>New description:
				<textarea name='d' style='color:black;'></textarea></label></div>
				<div class='col-sm-2' name='cu'>
					<center style='margin-top: 15px;'><button class='btn btn-info' name='f5'>Change</button></center>
				</div>
			</form>
</div>";
		if(isset($_POST['f5']))
		{
			$c=$_POST['d'];
			if($c=='')
			{
				echo "<script>alert('Enter data to change')</script>";
			}
			else
			{
				
				$update="update users set description='$c' where user_id='$user_id'";
				$run=mysqli_query($con,$update);
				
			}
		}

		echo"
	<div class='row' style='color: white;'>
		<div class='col-sm-2'></div>
		<center><div class='col-sm-2'><h3>Password:</h3></div></center>
		
				
		<form method='post'>
			<div class='col-sm-2'><label>old password:
				<input type='password' name='op' style='color:black;'></label></div>
			<div class='col-sm-2'><label>New password:
				<input type='password' name='np' style='color:black;'></label></div>
				<div class='col-sm-2' name='cu'>
					<center style='margin-top: 15px;'><button class='btn btn-info' name='f4'>Change</button></center>
				</div>
			</form>
</div>";
		if(isset($_POST['f4']))
		{
			$cp=$_POST['op'];
			$np=$_POST['np'];
			if($cp=='' && $np=='')
			{
				echo "<script>alert('Enter data to change')</script>";
			}
			else
			{
				if($cp==$password)
				{
				
				$update="update users set password='$np' where user_id='$user_id'";
				$run=mysqli_query($con,$update);
				echo "<script>alert('password changed')</script>";}
				else if($cp!=$password){
								echo "<script>alert('incorrect old password')</script>";

					}
				
			}
		}


	?>
</div>
</body>
</html>