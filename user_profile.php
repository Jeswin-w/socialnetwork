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
<style type="text/css">
	#a{
		font-family: 'zen dots';
		color:white;
	}
</style>
<body style="background-color: black;">
<div class="row">
	<?php

		if(isset($_GET['u_id']))
		{
			$u_id = $_GET['u_id'];
		}

		if($u_id<0 || $u_id=="")
		{
			echo"<script>window.open('home.php','_self')</script>";
		}
		else{

		}
	?>
	<div class="col-sm-12">
		<?php 
		
		if(isset($_GET['u_id']))
		{
			global $con;
			$user_id = $_GET['u_id'];
		
			$select="select * from users where user_id='$user_id'";
			$run=mysqli_query($con,$select);
			$row=mysqli_fetch_array($run);

			$name= $row['username'];
		}
		?>

		<?php
			if(isset($_GET['u_id']))
				{
					global $con;
					$user_id = $_GET['u_id'];
				
					$select="select * from users where user_id='$user_id'";
					$run=mysqli_query($con,$select);
					$row=mysqli_fetch_array($run);

					$name= $row['username'];
					$id= $row['user_id'];
					$img= $row['userimage'];
					$fname= $row['fname'];
					$lname= $row['lname'];
					$description=$row['description'];
					$role= $row['role'];
					$dept= $row['dept'];
					$date=$row['regdate'];

					$d=strtoupper($dept);

					echo "<div class='row'>
					<div class='col-sm-1'>
					</div>
					<div class='col-sm-2' style='background-color: violet;text-align: center;left: 0.9%;border-radius: 5px;'>

					
						<center><h2><strong>About</strong></h2></center>
						<img src='users/$img' class='img-circle' width=150px height=150px>
						<center><h4><strong>$fname $lname</strong></h4></center>
						<p><strong><i style='color:grey;'>$description</i></strong></p><br>
						<p><strong>Role: </strong> $role</p><br>
						<p><strong>department: </strong> $d</p><br>
						<p><strong>Member Since: </strong> $date</p><br>
						<button class='btn btn-info' name='msg'><a href='send.php?u_id=$user_id' style='color:black;'>Message</button></a><br><p> <p>
						";
						if(isset($_POST['msg']))
						{
							echo"<script>alert('$id')</script>";
						}


						
					
					echo"</div>
					
					<div class='col-sm-8'>
						<center><u><h2 id='a'><strong> $fname</strong> Posts</h2></u></center><br>";
						global $con;
						if(isset($_GET['u_id']))
							{
								
								$u_id = $_GET['u_id'];
							}

						$get_post="select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 10";
						$run=mysqli_query($con,$get_post);

						while($row=mysqli_fetch_array($run))
						{
							$post_id=$row['post_id'];
							$user_id=$row['user_id'];
							$content = substr($row['post_content'], 0,40);
							$post_image = $row['post_image'];
							$post_date = $row['post_date'];
							$post_tag = $row['post_tag'];

							$user = "select * from users where user_id='$user_id'";
							$run_user= mysqli_query($con,$user);
							$row_user=mysqli_fetch_array($run_user);

							$name= $row_user['username'];
							$img= $row_user['userimage'];
							$fname= $row_user['fname'];
							$lname= $row_user['lname'];


							if($content=='' && strlen($post_image)>=1)
		{
			echo "
			<div class='row'>
				<div class='col-sm-2'></div>
				<div class='col-sm-8' id='posts'>
					<div class='row'>
						<div class='col-sm-2'>
							<img src='users/$img' class='img-circle' width=50px height=50px>
						</div>
						<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
							<h4><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$name</a></h4>
							<h5><small style='color:white;'>Updated a post on <strong>$post_date</strong></small></h5>
						</div>
					
				<div class='col-sm-2'></div>
				<div class='col-sm-2'>
				<center><h5 style='border:1px solid blue;color:blue;border-radius:40%'>$post_tag</h5></center>
				</div>
			</div>
				<div class='row'>
					<div class='col-sm-12'>
						<img id='posts-img' src='imagepost/$post_image' style='height:350px;width:100%'>
					</div>
				</div><br>
				<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
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
							<img src='users/$img' class='img-circle' width=50px height=50px>
						</div>
						<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
							<h4><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$name</a></h4>
							<h5><small style='color:white;'>Updated a post on <strong>$post_date</strong></small></h5>
						</div>
					
				<div class='col-sm-2'></div>
				<div class='col-sm-2'>
				<center><h5 style='border:1px solid blue;color:blue;border-radius:40%'>$post_tag</h5></center>
				</div>
			</div>
				<div class='row'>
				<h4 style='color:white; padding-left:14px;'>$content</h4>
					<div class='col-sm-12'>
						<img id='posts-img' src='imagepost/$post_image' style='height:350px;width:100%'>
					</div></div><br>
				
				<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
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
							<img src='users/$img' class='img-circle' width=50px height=50px>
						</div>
						<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
							<h4><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$name</a></h4>
							<h5><small style='color:white;'>Updated a post on <strong>$post_date</strong></small></h5>
						</div>
					
				<div class='col-sm-2'></div>
				<div class='col-sm-2'>
				<center><h5 style='border:1px solid blue;color:blue;border-radius:40%'>$post_tag</h5></center>
				</div>
			</div>
				<div class='row'>
				<h4 style='color:white; padding-left:14px;'>$content</h4>
					<div class='col-sm-12'>
						
					</div></div><br>
				
				<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br><hr>";
		}
		
	}
						}
						
							



						
						
					echo"</div>
				</div>";
				
		?>


		
</div>
</body>
</html>