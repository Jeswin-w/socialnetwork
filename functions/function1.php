<?php
$con=mysqli_connect("localhost","root","","social_network");


function insertPost(){
	if (isset($_POST['pst']))
{
	global $con;
	global $user_id;
	
	$content=htmlentities($_POST['content']);
	$pimage=$_FILES['postimage']['name'];
	$img_tmp=$_FILES['postimage']['tmp_name'];
	$random=rand(1,100);

	
		if (strlen($content)>=1 &&  strlen($pimage)>=1 )
		{
			move_uploaded_file($img_tmp, "imagepost/$pimage.$random");
			$insert="insert into posts (user_id, post_content,post_image,post_date,post_tag) values('$user_id','$content','$pimage.$random',NOW(),'')";
			$run=mysqli_query($con,$insert);

			if($run){
				echo  "<script>alert('Posted successfully')</script>";
				echo "<script>window.open('home.php','_self')</script>";
			}
			exit();
		}else{
		if($pimage=='' && $content == ''){
					echo "<script>alert('Error Occured while uploading! ')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}else{
					if($content==''){
						move_uploaded_file($img_tmp, "imagepost/$pimage.$random");
						$insert="insert into posts (user_id, post_content,post_image,post_date,post_tag) values('$user_id','','$pimage.$random',NOW(),'')";
						$run=mysqli_query($con,$insert);

						if($run){
							echo  "<script>alert('Posted successfully')</script>";
							echo "<script>window.open('home.php','_self')</script>";
						}
						exit();

					}
					else{
						$insert="insert into posts (user_id, post_content,post_date,post_tag) values('$user_id','$content',NOW(),'')";
						$run=mysqli_query($con,$insert);

						if($run){
							echo  "<script>alert('Posted successfully')</script>";
							echo "<script>window.open('home.php','_self')</script>";
						}
						exit();
					}
				}
			}
	
}
}

function getposts()
{
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
	$start_from=($page-1)* $per_page;
	$getposts="select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";
	$run=mysqli_query($con,$getposts);

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
				
				<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br><hr>";
		}
		
	}
	include("page.php");
}

function single_post()
{
	if(isset($_POST['post_id']))
	{
		global $con;

		$get_id=$_GET['post_id'];
		$get_post="select * from posts where post_id ='$get_id'";
		$run=mysqli_query($con,$get_post);

		$row=mysqli_fetch_array($run);

		$post_id=$row['post_id'];
		$user_id=$row['user_id'];
		$content = $row['post_content'];
		$post_image = $row['post_image'];
		$post_date = $row['post_date'];
		$post_tag = $row['post_tag'];	

		$user = "select * from users where user_id='$user_id'";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['username'];
		$user_image = $row_user['userimage'];



	}
}
?>