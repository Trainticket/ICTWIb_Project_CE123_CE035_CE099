<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		body {
			background: rgba(0, 0, 0, .5);
		}

		.form-container {
			padding-top: 100px;
			position: unset;
			min-height: 60vh;
		}

		.video-container {
			position: fixed;
			right: 0;
			bottom: 0;
			min-width: 100%;
			min-height: 100vh;
			z-index: -1;
		}

		#video-slider {
			width: 100%;
			bottom: 0;
		}
	</style>

</head>

<body>
	<div class="form-container">
		<form method="post" action="register.php">
			<h3>Register</h3>
			<?php include('errors.php'); ?>
			<div class="form-input-box">
				<input type="text" name="username" class="box" placeholder=" " value="<?php echo $username; ?>">
				<label class="form-label">Username</label>
			</div>
			<div class="form-input-box">
				<input type="email" name="email" class="box" placeholder=" " value="<?php echo $email; ?>">
				<label class="form-label">Email</label>
			</div>
			<div class="form-input-box">
				<input type="password" name="password_1" class="box" placeholder=" ">
				<label class="form-label">Password</label>
			</div>
			<div class="form-input-box">
				<input type="password" name="password_2" class="box" placeholder=" ">
				<label class="form-label">Confirm password</label>
			</div>
			<div class="form-input-box">
				<button type="submit" class="btn" name="reg_user">Verify</button>
			</div>
			<p>
				Already a member? <a href="index.php">Log in</a>
			</p>
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