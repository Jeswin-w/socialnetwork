<?php
$get_id=$_GET['post_id'];
$get_com="select * from comments where post_id='$get_id' ORDER by 1 DESC";
$run=mysqli_query($con,$get_com);
$check=mysqli_num_rows($run);


while( $row = mysqli_fetch_array($run))
{
	$com=$row['comment'];
	$com_name=$row['comment_author'];
	$com_id=$row['ca_id'];
	$date=$row['date'];

	$get_id="select * from users where user_id='$com_id'";
	$run1=mysqli_query($con,$get_id);
	$rowa=mysqli_fetch_array($run1);

	$img=$rowa['userimage'];

	$name=$rowa['username'];
	


	echo"<div class='row' style='background-color:black;'>
		<div class='col-md-6 col-md-offset-3'>
			<div>
				<div>
					<div class='row'>
						<div class='col-md-2'>
					    <img src='users/$img' class='img-circle' width=30px height=30px></div>
					    <div class='col-md-10'>
						<h4  style='margin-left:-60px; margin-top:-7px;'><strong><b>$name</strong></b><br><i> commented on </i>$date</h4></div></div>
						<p class='text-primary' style='margin-left:5px; font-size:20px;'>$com</p><br>
					
				</div>
			</div>
		</div>
	
	</div>";
			
}
?>