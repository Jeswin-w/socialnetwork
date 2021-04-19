<?php  

$con=mysqli_connect("localhost","root","","social_network");

if(isset($_GET['post_id'])){
	$post_id=$_GET['post_id'];

	$del="delete from posts where post_id='$post_id'";
	$run= mysqli_query($con,$del);

	if($run)
	{
		echo "<script>alert('Successfully deleted')</script>";
		echo "<script>window.open('../home.php','_self')</script>";
	}
}?>