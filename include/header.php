<?php
include("connection.php");
include("functions/function1.php");
?>
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
<nav class="navbar navbar-default" style="background-color:	#D8BFD8; color: black;">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home.php" style="font-family: lobster;">Tce Network</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	
	      	<?php 
			$user = $_SESSION['email'];
			$get_user = "select * from users where email='$user'"; 
			$run_user = mysqli_query($con,$get_user);
			$row=mysqli_fetch_array($run_user);
					
			$user_id = $row['user_id']; 
			$user_name = $row['username'];
			$first_name = $row['fname'];
			$last_name = $row['lname'];
			$describe_user = $row['description'];
			$user_pass = $row['password'];
			$user_email = $row['email'];
			$user_image = $row['userimage'];
			$role=$row['role'];
			$department=$row['dept'];
			$register_date = $row['regdate'];
					
					
			$user_posts = "select * from posts where user_id='$user_id'"; 
			$run_posts = mysqli_query($con,$user_posts); 
			$posts = mysqli_num_rows($run_posts);
			?>

	        <li><a href='profile.php?<?php echo "u_id=$user_id" ?>' ><?php echo "Profile"; ?></a></li>
	       	
			<li><a href="members.php">Find People</a></li>
			<li><a href="messages.php?u_id=new">Messages</a></li>


					<?php
						echo"

						<li class='dropdown'>
							<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
							<ul class='dropdown-menu'>
								<li>
									<a href='my_post.php?u_id=$user_id'>My Posts <span class='badge badge-secondary'>$posts</span></a>
								</li>
								<li>
									<a href='edit_profile.php?u_id=$user_id'>Edit Account</a>
								</li>
								<li role='separator' class='divider'></li>
								<li>
									<a href='logout.php'>Logout</a>
								</li>
							</ul>
						</li>
						";
					?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<form class="navbar-form navbar-left" method="get" action="results.php">
						<div class="form-group">
							<input type="text" class="form-control" name="user_query" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-info" name="search">Search</button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav>