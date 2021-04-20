<?php  
$con=mysqli_connect("localhost","root","","social_network");
function searchusers()
{
	global $con;

	if (isset($_GET['ubsearch']))
	{
		$searchq=htmlentities($_GET['usearch']);
		if(strlen($searchq)>=3){

			$get_user="select * from users where fname like '%$searchq%' OR lname like '%$searchq%' OR username like '%$searchq%'";
			$run=mysqli_query($con,$get_user);
			


			while($row=mysqli_fetch_array($run))
			{
				$user_id=$row['user_id'];
				$f_name=$row['fname'];
				$l_name=$row['lname'];
				$user_name=$row['username'];
				$img=$row['userimage'];

				
					echo"
					<br>
					<div  class='row'>
						<div class='col-sm-3'>
						</div>
						<div class='col-sm-6'>
							<div class='row' id='findu' style='border:solid 1px white;'>
								<div class='col-sm-4'>
									<a href='user_profile.php?u_id=$user_id'>
										<img src='users/$img' width='150px'height='140px' title='username' style='float:left; margin:1px; border-radius:50%;'  />
									</a>
								</div>
								<div class='col-sm-6'>
									<a href='user_profile.php?u_id=$user_id' style='cursor:pointer; color: white; text-decoration:none'>
										<strong><h3> $f_name $l_name </h3></strong>
									</a>
								</div>
							</div>
						</div>
					</div>
					<br><br>

					";
				
			}
		}
		else{
			echo"<script type='text/javascript'>alert('Enter atleast 3 letters')</script>";
		}
	}

}

function results()
{
	global $con;
	if(isset($_GET['search']))
	{

		$search=$_GET['res'];
		if(strlen($search)>=3)
		{
			
		$select="select * from posts where post_content like '%$search%' OR post_tag like '%$search%'";
		$run=mysqli_query($con,$select);

		while($row=mysqli_fetch_array($run))
		{
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
							<img src='users/$user_image' class='img-circle' width=50px height=50px>
						</div>
						<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
							<h4><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h4>
							<h5><small style='color:white;'>Updated a post on <strong>$post_date</strong></small></h5>
						</div>
					
				<div class='col-sm-2'></div>
				<div class='col-sm-2'>
				<center><h5 style='border:1px solid blue;color:blue;border-radius:40%'>$post_tag</h5></center>
				</div>			</div>
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
					
				<div class='col-sm-2'></div>
				<div class='col-sm-2'>
				<center><h5 style='border:1px solid blue;color:blue;border-radius:40%'>$post_tag</h5></center>
				</div>			</div>
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
		else
	{
		echo"<script> alert('Warning: Enter atleast 3 letters');</script>";
	}

	}
	
}


?>