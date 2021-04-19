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
	color: violet;
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
	<div class="row" style="background-color: violet;">
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
					<br><br>
				</div>
				<div class="row">
					<div class="col-sm-1">
					</div>
					<div class="col-sm-2" style="background-color: violet;text-align: center;left: 0.9%;border-radius: 5px;">

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
					<div class="col-sm-8">
						<?php
							global $con;

	$per_page =4;

	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	else
	{
		$page=1;
	}
	if(isset($_GET['u_id']))
	{
		$u_id = $_GET['u_id'];
	}
	
	$start_from=($page-1)* $per_page;
	$get_post="select * from posts posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";
	$run=mysqli_query($con,$get_post);

	while ($row=mysqli_fetch_array($run)) {
		$post_id=$row['post_id'];
		$user_id=$row['user_id'];
		$content = substr($row['post_content'], 0,40);
		$post_image = $row['post_image'];
		$post_date = $row['post_date'];
		$post_tag = $row['post_tag'];

		$user = "select * from users where user_id='$user_id'";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['username'];
		$user_image = $row_user['userimage'];

		if($content=='' && strlen($post_image)>=1)
		{
			echo "
			<div class='row'>
				<div class='col-sm-2'></div>
				<div class='col-sm-8' id='posts'>
					<div class='row'>
						<div class='col-sm-2'>
							<img src='users/$user_image' class='img-circle' width=50px height=50px>
						</div>
						<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
							<h4><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h4>
							<h5><small style='color:white;'>Updated a post on <strong>$post_date</strong></small></h5>
						</div>
					
				<div class='col-sm-4'>
				</div>
			</div>
				<div class='row'>
					<div class='col-sm-12'>
						<img id='posts-img' src='imagepost/$post_image' style='height:350px;width:100%'>
					</div>
				</div><br>
				<a href='functions/del.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
				<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>View</button></a>&emsp;
				
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br><hr>";
		}
		else if(strlen($content)>=1 && strlen($post_image)>=1)
		{
			echo "
			<div class='row'>
				<div class='col-sm-2'></div>
				<div class='col-sm-8' id='posts'>
					<div class='row'>
						<div class='col-sm-2'>
							<img src='users/$user_image' class='img-circle' width=50px height=50px>
						</div>
						<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
							<h4><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h4>
							<h5><small style='color:white;'>Updated a post on <strong>$post_date</strong></small></h5>
						</div>
					
				<div class='col-sm-4'>
				</div>
			</div>
				<div class='row'>
				<h4 style='color:white; padding-left:14px;'>$content</h4>
					<div class='col-sm-12'>
						<img id='posts-img' src='imagepost/$post_image' style='height:350px;width:100%'>
					</div></div><br>
				<a href='functions/del.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
				<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>View</button></a>&emsp;
				
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br><hr>";
		}

		else
		{
			echo "
			<div class='row'>
				<div class='col-sm-2'></div>
				<div class='col-sm-8' id='posts'>
					<div class='row'>
						<div class='col-sm-2'>
							<img src='users/$user_image' class='img-circle' width=50px height=50px>
						</div>
						<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
							<h4><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h4>
							<h5><small style='color:white;'>Updated a post on <strong>$post_date</strong></small></h5>
						</div>
					
				<div class='col-sm-4'>
				</div>
			</div>
				<div class='row'>
				<h4 style='color:white; padding-left:14px;'>$content</h4>
					<div class='col-sm-12'>
						
					</div></div><br>
					<a href='functions/del.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
				<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>View</button></a> &emsp;
				
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br><hr>";
		}
		
	}
	include("functions/page.php");
	include("functions/del.php")
						?>

					</div>
				</div>


</body>
</html>