<!doctype html>
<?php

session_start();
include("include/header.php");

if(!isset($_SESSION['email'])){
	header("location: index.php");
}
?>

<html>
<style>
	label{
	padding: 7px;
	display: table;
	color: #000;
}
input[type="file"]{
	display: none;
}
#name{
	font-family: lobster;
	color:gold;

}
</style>
<head>
	<?php
	$user = $_SESSION['email'];
			$get_user = "select * from users where email='$user'"; 
			$run_user = mysqli_query($con,$get_user);
			$row=mysqli_fetch_array($run_user);
					
			$user_name = $row['username'];?>
	<title><?php echo "$user_name";?></title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: black;">
	<div class="row">
		<div class="col-sm-5">
		</div>
		<div class="col-sm-2">
			<?php 
			$n=strtoupper($user_name);
			echo "<h1 id='name'>$n</h1>;"?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
		</div>
		<div id="profileimg" style="margin-top:20px; margin-left: 319px;">
		<div class="col-sm-4">
			
			
				<?php echo"
				<img src='users/$user_image' alt='profileimage' class='img-circle' width='180px' height='185px' style='margin-left:250px;'>"?></div>
			
			<div class="col-sm-1" style="margin-left: 70px;">
				<center>
					<?php echo"
				<form action='profile.php?u_id=u_id=$user_id' method='post' enctype='multipart/form-data'>
					<label id='imgchg'>Change image 
					<input type='file' name='profimg'   size='60' /> </label><br><br>
					<button id='profbut' name='chgbut' class='btn btn-info'>Update profile</button></form><br> ";?></div>
					<?php
					if(isset($_POST['chgbut']))
					{
						$u_image=$_FILES['profimg']['name'];
						$img_tmp=$_FILES['profimg']['tmp_name'];
						$random=rand(1,100);
						if($u_image==''){
							echo  "<script> alert('select an image')</script>";
							echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
							exit();
						}
						else
						{
							move_uploaded_file($img_tmp,"users/$u_image.$random");
							$update="update users set userimage='$u_image.$random' where user_id='$user_id'";
							$run=mysqli_query($con,$update);

							if($run){
								echo  "<script> alert('Updated image')</script>";
							echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";

							}
						}
					}
					?>
				</center></div></div></div><br><br>
				<div class="row">
					<div class="col-sm-5">
					</div>
					<div class="col-sm-2" style="background-color: #e6e6e6;text-align: center;left: 0.9%;border-radius: 5px;">

		<?php
		echo"
			<center><h2><strong>About</strong></h2></center>
			<center><h4><strong>$first_name $last_name</strong></h4></center>
			<p><strong><i style='color:grey;'>$describe_user</i></strong></p><br>
			<p><strong>Role: </strong> $role</p><br>
			<p><strong>department: </strong> $department</p><br>
			<p><strong>Member Since: </strong> $register_date</p><br>
			
		";
		?>
	</div>


</body>
</html>