<!DOCTYPE html>
<?php

session_start();
include("include/header.php");

if(!isset($_SESSION['email'])){
	header("location: index.php");
}
?>
<html>
<style>
.btn-group button {
  background-color: black; /* Green background */
  
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: left; /* Float the buttons side by side */
}

/* Clear floats (clearfix hack) */
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button {
  border-bottom: white; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: violet;
}
</style>
<head>
	<title>Messages</title>
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
		<div class="col-sm-12">
		<center>
			<form method="post">
		<div class="btn-group">
		  <button name="rec">Recieved</button>
		  <button name="sent">Sent</button>
	  
		</div>
	</form>
		</center>
		</div>
	
</div>
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">
		<?php
		$u=$user_id;
		if(isset($_POST['rec']))
		{
			$select="select * from messages where rec_id='$u' ORDER by 1 DESC LIMIT 10";
			$run =mysqli_query($con,$select);
			if(isset($run)){
			
			while ($row=mysqli_fetch_array($run))
			{
				$s_id=$row['send_id'];
				$tit=$row['title'];
				$content=$row['msg'];
				$img= $row['msg_img'];
				$t= $row['time'];

				$sel="select * from users where user_id='$s_id'";
				$r= mysqli_query($con,$sel);

				$ro=mysqli_fetch_array($r);
				$sname=$ro['username'];
				$simg=$ro['userimage'];

				if($content=='' && strlen($img)>=1)
					{
						echo "
						
						<div class='row'>
							<div class='col-sm-2'></div>
							<div class='col-sm-8' id='posts'>
								<div class='row'>
									<div class='col-sm-2'>
										<img src='users/$simg' class='img-circle' width=50px height=50px>
									</div>
									<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
										<h4><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$s_id'>$sname</a></h4>
										<h5><small style='color:white;'>messaged on <strong>$t</strong></small></h5>
									</div>
								
							<div class='col-sm-4'>
							</div>
						</div>
							<div class='row'>
								<div class='col-sm-12'>
									<h3 style='color: white;'>$tit</h3>
									<img id='posts-img' src='imagemsg/$img' style='height:350px;width:100%'>
								</div>
							</div><br>
							<a href='send.php?u_id=$s_id' style='float:right;'><button class='btn btn-info'>reply</button></a><br>
							</div>
							<div class='col-sm-3'>
							</div>
						</div><br><br><hr>";
					}
					else if(strlen($content)>=1 && strlen($img)>=1)
					{
						echo "
						<div class='row'>
							<div class='col-sm-2'></div>
							<div class='col-sm-8' id='posts'>
								<div class='row'>
									<div class='col-sm-2'>
										<img src='users/$simg' class='img-circle' width=50px height=50px>
									</div>
									<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
										<h4><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$s_id'>$sname</a></h4>
										<h5><small style='color:white;'>messaged on <strong>$t</strong></small></h5>
									</div>
								
							<div class='col-sm-4'>
							</div>
						</div>
							<div class='row'>
								<div class='col-sm-12'>
									<h3 style='color: white;'>$tit</h3>
									<h4 style='color:white;'>$content</h4>
									<img id='posts-img' src='imagemsg/$img' style='height:350px;width:100%'>
								</div>
							</div><br>
							<a href='send.php?u_id=$s_id' style='float:right;'><button class='btn btn-info'>reply</button></a><br>
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
										<img src='users/$simg' class='img-circle' width=50px height=50px>
									</div>
									<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
										<h4><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$s_id'>$sname</a></h4>
										<h5><small style='color:white;'>messaged on <strong>$t</strong></small></h5>
									</div>
								
							<div class='col-sm-4'>
							</div>
						</div>
							<div class='row'>
								<div class='col-sm-12'>
									<h3 style='color: white;'>$tit</h3>
									<h4 style='color:white;'>$content</h4>
									
								</div>
							</div><br>
							<a href='send.php?u_id=$s_id' style='float:right;'><button class='btn btn-info'>reply</button></a><br>
							</div>
							<div class='col-sm-3'>
							</div>
						</div><br><br><hr>";
					}

			}

			}
			
		}
		else if(isset($_POST['sent']))
		{
			$select="select * from messages where send_id='$u' ORDER by 1 DESC LIMIT 10";
			$run =mysqli_query($con,$select);
			if(isset($run)){
			
			while ($row=mysqli_fetch_array($run))
			{
				$s_id=$row['send_id'];
				$tit=$row['title'];
				$content=$row['msg'];
				$img= $row['msg_img'];
				$t= $row['time'];
				$r_id=$row['rec_id'];

				$sel="select * from users where user_id='$s_id'";
				$r= mysqli_query($con,$sel);

				$ro=mysqli_fetch_array($r);
				$sname=$ro['username'];
				$simg=$ro['userimage'];

				$sele="select * from users where user_id='$r_id'";
				$re= mysqli_query($con,$sele);

				$roe=mysqli_fetch_array($re);
				$rname=$roe['username'];
				$rimg=$roe['userimage'];

				if($content=='' && strlen($img)>=1)
					{
						echo "
						
						<div class='row'>
							<div class='col-sm-2'></div>
							<div class='col-sm-8' id='posts'>
								<div class='row'>
									<div class='col-sm-2'>
										<img src='users/$rimg' class='img-circle' width=50px height=50px>
									</div>
									<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
										<h4 style='color: white;'>To<a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$r_id'> $rname</a></h4>
										<h5><small style='color:white;'>messaged on <strong>$t</strong></small></h5>
									</div>
								
							<div class='col-sm-4'>
							</div>
						</div>
							<div class='row'>
								<div class='col-sm-12'>
									<h3 style='color: white;'>$tit</h3>
									<img id='posts-img' src='imagemsg/$img' style='height:350px;width:100%'>
								</div>
							</div><br>
							<br>
							</div>
							<div class='col-sm-3'>
							</div>
						</div><br><br><hr>";
					}
					else if(strlen($content)>=1 && strlen($img)>=1)
					{
						echo "
						<div class='row'>
							<div class='col-sm-2'></div>
							<div class='col-sm-8' id='posts'>
								<div class='row'>
									<div class='col-sm-2'>
										<img src='users/$rimg' class='img-circle' width=50px height=50px>
									</div>
									<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
										<h4 style='color: white;'>To<a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$r_id'> $rname</a></h4>
										<h5><small style='color:white;'>messaged on <strong>$t</strong></small></h5>
									</div>
								
							<div class='col-sm-4'>
							</div>
						</div>
							<div class='row'>
								<div class='col-sm-12'>
									<h3 style='color: white;'>$tit</h3>
									<h4 style='color:white;'>$content</h4>
									<img id='posts-img' src='imagemsg/$img' style='height:350px;width:100%'>
								</div>
							</div><br>
							<br>
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
										<img src='users/$rimg' class='img-circle' width=50px height=50px>
									</div>
									<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
										<h4 style='color: white;'>To<a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$r_id'> $rname</a></h4>
										<h5><small style='color:white;'>messaged on <strong>$t</strong></small></h5>
									</div>
								
							<div class='col-sm-4'>
							</div>
						</div>
							<div class='row'>
								<div class='col-sm-12'>
									<h3 style='color: white;'>$tit</h3>
									<h4 style='color:white;'>$content</h4>
									
								</div>
							</div><br>
							<br>
							</div>
							<div class='col-sm-3'>
							</div>
						</div><br><br><hr>";
					}

			}

			}
		}

		else{
		$select="select * from messages where rec_id='$u' ORDER by 1 DESC LIMIT 10";
			$run =mysqli_query($con,$select);
			if(isset($run)){
			
			while ($row=mysqli_fetch_array($run))
			{
				$s_id=$row['send_id'];
				$tit=$row['title'];
				$content=$row['msg'];
				$img= $row['msg_img'];
				$t= $row['time'];

				$sel="select * from users where user_id='$s_id'";
				$r= mysqli_query($con,$sel);

				$ro=mysqli_fetch_array($r);
				$sname=$ro['username'];
				$simg=$ro['userimage'];

				if($content=='' && strlen($img)>=1)
					{
						echo "

						
						<div class='row'>
							<div class='col-sm-2'></div>
							<div class='col-sm-8' id='posts'>
								<div class='row'>

									<div class='col-sm-2'>
										<img src='users/$simg' class='img-circle' width=50px height=50px>
									</div>
									<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
										<h4><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$s_id'>$sname</a></h4>
										<h5><small style='color:white;'>messaged on <strong>$t</strong></small></h5>
									</div>
								
							<div class='col-sm-4'>
							</div>
						</div>
							<div class='row'>
								<div class='col-sm-12'>
									<h3 style='color: white;'>$tit</h3>
									<img id='posts-img' src='imagemsg/$img' style='height:350px;width:100%'>
								</div>
							</div><br>
							<a href='send.php?u_id=$s_id' style='float:right;'><button class='btn btn-info'>reply</button></a><br>
							</div>
							<div class='col-sm-3'>
							</div>
						</div><br><br><hr>";
					}
					else if(strlen($content)>=1 && strlen($img)>=1)
					{
						echo "
						<div class='row'>
							<div class='col-sm-2'></div>
							<div class='col-sm-8' id='posts'>
								<div class='row'>
									<div class='col-sm-2'>
										<img src='users/$simg' class='img-circle' width=50px height=50px>
									</div>
									<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
										<h4><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$s_id'>$sname</a></h4>
										<h5><small style='color:white;'>messaged on <strong>$t</strong></small></h5>
									</div>
								
							<div class='col-sm-4'>
							</div>
						</div>
							<div class='row'>
								<div class='col-sm-12'>
									<h3 style='color: white;'>$tit</h3>
									<h4 style='color:white;'>$content</h4>
									<img id='posts-img' src='imagemsg/$img' style='height:350px;width:100%'>
								</div>
							</div><br>
							<a href='send.php?u_id=$s_id' style='float:right;'><button class='btn btn-info'>reply</button></a><br>
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
										<img src='users/$simg' class='img-circle' width=50px height=50px>
									</div>
									<div class='col-sm-6' style='margin-left: -60px; margin-top: -7px;'>
										<h4><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$s_id'>$sname</a></h4>
										<h5><small style='color:white;'>messaged on <strong>$t</strong></small></h5>
									</div>
								
							<div class='col-sm-4'>
							</div>
						</div>
							<div class='row'>
								<div class='col-sm-12'>
									<h3 style='color: white;'>$tit</h3>
									<h4 style='color:white;'>$content</h4>
									
								</div>
							</div><br>
							<a href='send.php?u_id=$s_id' style='float:right;'><button class='btn btn-info'>reply</button></a><br>
							</div>
							<div class='col-sm-3'>
							</div>
						</div><br><br><hr>";
					}

			}

			}
	}


		?>
	</div>
</div>
</body>
</html>