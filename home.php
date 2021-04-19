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
	.collapsible {
  background-color: #D8BFD8;
  color: black;
  cursor: pointer;
  padding: 18px;
  width: 75%%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color:#FBBAF1;
}

.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
</style>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
	label{
	padding: 7px;
	display: table;
	color: #fff;
}
input[type="file"]{
	display: none;
}
</style>
<body style="background-color: black;">
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">
		<h2 style="font-family:'Zen Dots', cursive; color: white;">Post</h2>
		
		<center>
			<button type="button" class="collapsible">Make a a post</button>
		<div class="content" style="border-radius: 10px;">
  			<br>
			<form action="home.php?id=<?php echo $user_id; ?>" method="post" id="f" enctype="multipart/form-data">
				
				<textarea class="form-control" id="content" rows="3" name="content" placeholder="Type the post here "></textarea><br>
				<label class="btn btn-warning" id="postimagel">Select a image
				<input type="file" name="postimage" size="60"></label>
				<button id="btn-post" class="btn btn-success" name="pst">POST</button>
			</form>
			<br>
		</div>
		<hr>
			<?php insertPost() ?>
		</center>
	</div>
</div>
	<div class="row">
		<div class="col-sm-2">
		</div>
		<div class="col-sm-8">
		<h3 style="font-family:'Zen Dots', cursive; color: white;"> Recent posts</h3>
		<?php echo getposts();?>
	</div>
</div>

	<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
</body>
</html>