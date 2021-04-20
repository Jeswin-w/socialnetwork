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
	<title>Send message</title>
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
	<div class="col-sm-12" style="color:white; font-family:  'zen dots';">
		<h2><center>Send a  message</center></h2>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">
		
		<div class='content' style='border-radius: 10px;'>
  			<br>
			<form action='' method='post' id='f' enctype='multipart/form-data'>
				<label style="color:white; font-family:  'zen dots';">Enter Title:</label>
				<center>
				<input type='text' name='stitle' style='width:100%'><br><br></center>
				<label style="color:white; font-family:  'zen dots';">Enter Message:</label>
				<center>
				<textarea class='form-control' id='msg' rows='3' name='msg' placeholder='Type the post here '></textarea><br>
				<label class='btn btn-warning' id='postimage2' style='padding: 7px;	display: table;	color: #fff;'>Select a image
				<input type='file' name='simage' size='60' style='display: none;'></label><br><br>				
				<button id='btn-post' class='btn btn-success' name='m' >Send</button></center>
			</form>
		</div>
		<?php 
			if(isset($_POST['m']))
			{
				global $con;
				$s_id=$user_id;
				$title=htmlentities($_POST['stitle']);
				$msg=htmlentities($_POST['msg']);
				$simage=$_FILES['simage']['name'];
				$img_tmp=$_FILES['simage']['tmp_name'];
				$random=rand(1,100);
				

				if(isset($_GET['u_id']))
				{
					$r_id=$_GET['u_id'];
					
				}

				if($title=="")
				{
					echo "<script>alert('Please Enter Title')</script>";
				}
				else{
				if (strlen($msg)>=1 &&  strlen($simage)>=1 )
					{
						move_uploaded_file($img_tmp, "imagemsg/$simage.$random");
						$insert="insert into messages (send_id,rec_id, title,msg,msg_img,time) values('$s_id','$r_id','$title','$msg','$simage.$random',NOW())";
						$run=mysqli_query($con,$insert);
						if($run){
						echo  "<script>alert('message sent')</script>";
						
						}
						exit();

					}
					else
					{
						if($simage=='' && $msg == ''){
							echo "<script>alert('Error Occured while sending message! ')</script>";
							echo "<script>window.open('home.php', '_self')</script>";
						}
						else
						{
							if($msg==''){
								move_uploaded_file($img_tmp, "imagemsg/$simage.$random");
								$insert="insert into messages (send_id,rec_id, title,msg,msg_img,time) values('$s_id','$r_id','$title','','$simage.$random',NOW())";
								$run=mysqli_query($con,$insert);
								if($run){
								echo  "<script>alert('message sent')</script>";
								
								}
								exit();
								

							}
							else{
									move_uploaded_file($img_tmp, "imagemsg/$simage.$random");
									$insert="insert into messages (send_id,rec_id, title,msg,msg_img,time) values('$s_id','$r_id','$title','$msg','',NOW())";
									$run=mysqli_query($con,$insert);
									if($run){
									echo  "<script>alert('message sent')</script>";
									
									}
									exit();
								}
						}
					}
			}
		}
		?>

	</div>
</body>
</html>