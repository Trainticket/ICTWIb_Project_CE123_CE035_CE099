<?php include('server.php');
	  include("inc/header.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
<style>
body{
	background:rgba(0,0,0,.5);
}
.form-container{
	padding-top: 100px;
	position: unset;
	min-height: 60vh;
}
.video-container{
	position: fixed;
	right: 0;
	bottom: 0;
	min-width: 100%;
	min-height: 100vh;
	z-index: -1;
}
#video-slider{
	width: 100%;
	bottom: 0;
}
</style>
</head>
<body>
	
<div class="form-container">

<i class="fas fa-times" id="form-close"></i>

<form action="index.php" method="post">
	<h3>login</h3>
	<?php include('succsess.php'); ?>
	<?php include('errors.php'); ?>
	<div class="form-input-box">
		<input type="text" name="username" class="box" placeholder=" ">
		<label class="form-label">Username</label>
	</div>
	<div class="form-input-box">
		<input type="password" name="password" class="box" placeholder=" ">
		<label class="form-label">Password</label>
	</div>
	<input type="submit" name="login_user" value="login now" class="btn">
	<input type="checkbox" id="remember">
	<label for="remember">remember me</label>
	<p>forget password? <a href="">click here</a></p>
	<p>don't have an account? <a href="register.php">register now</a></p>
</form>
	<div class="video-container">
        <video src="video3.mp4" id="video-slider" loop autoplay muted></video>
	</div>

</div>
</body>
</html>
<?php 
	include("inc/footer.php");
?>