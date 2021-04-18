<?php
$con=mysqli_connect("localhost","root","","social_network");


function insertPost(){
	if (isset($_POST['pst']))
{
	global $con;
	global $user_id;
	$title=htmlentities($_POST['ptitle']);
	$content=htmlentities($_POST['content']);
	$pimage=$_FILES['postimage']['name'];
	$img_tmp=$_FILES['postimage']['tmp_name'];
	$random=rand(1,100);

	if(strlen($title)<1)
	{
		echo"<script> alert('Please enter title')</script>";
	}
	else
	{
		if (strlen($content)>=1 &&  strlen($pimage)>=1 )
		{
			move_uploaded_file($img_tmp, "imagepost/$pimage.$random");
			$insert="insert into posts (user_id,post_title, post_content,post_image,post_date,post_tag) values('$user_id','$title','$content','$pimage.$random',NOW(),'')";
			$run=mysqli_query($con,$insert);

			if($run){
				echo  "<script>alert('Posted successfully')</script>";
				echo "<script>window.open('home.php','_self')</script>";
			}
			exit();
		}else{
		if($upload_image=='' && $content == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}else{
					if($content==''){
						move_uploaded_file($img_tmp, "imagepost/$pimage.$random");
						$insert="insert into posts (user_id,post_title, post_content,post_image,post_date,post_tag) values('$user_id','$title','','$pimage.$random',NOW(),'')";
						$run=mysqli_query($con,$insert);

						if($run){
							echo  "<script>alert('Posted successfully')</script>";
							echo "<script>window.open('home.php','_self')</script>";
						}
						exit();

					}
					else{
						$insert="insert into posts (user_id,post_title, post_content,post_date,post_tag) values('$user_id','$title','$content',NOW(),'')";
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
}
?>