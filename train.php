<?php
session_start();
// If user is not logged in
if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
include("inc/header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book Train</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style id="train-tabel-style">
		/* Tabel of train page */
		tr,
		td {
			border: 1px solid rgba(0, 0, 0, 0.8);
		}

		table {
			font-size: large;
			padding: 10px;
			width: 600px;
		}

		table td:nth-child(1) {
			width: 50%;
			padding: 0.8rem;
		}

		table td:nth-child(2) {
			width: 50%;
			padding: 0.8rem;
		}
	</style>
	<style>
		form table,
		tr,
		td {
			border: none;
		}

		form table {
			width: 100%;
		}

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
			z-index: -10;
		}

		#video-slider {
			width: 100%;
			bottom: 0;
		}
	</style>
</head>

<body>
	<div class="form-container">
		<form method="post" action="">
			<h3>Book Train</h3>
			<div class="form-input-box">
				<input type="search" name="from" id="from" class="box" value="<?php if (!empty($_POST['from']) && isset($_POST['from'])) echo $_POST['from']; ?>" list="city-list" placeholder=' ' required>
				<label class="form-label">From</label>
			</div>
			<div class="form-input-box">
				<input type="search" name="to" id="to" class="box" value="<?php if (!empty($_POST['to']) && isset($_POST['to'])) echo $_POST['to']; ?>" list="city-list" placeholder=' ' required>
				<label class="form-label">To</label>
			</div>
			<div class="form-input-box">
				<input type="date" name="date" id="date" class="box" required min="<?php echo date('Y-m-d', time()); ?>" max="<?php echo date('Y-m-d', strtotime(date('Y-m-d') . '+3 month')); ?>" value="<?php echo date('Y-m-d', time()); ?>">
				<label class="form-label">Date</label>
			</div>
			<div class="form-input-box">
				<input type="search" name="train-class" class="box" id="train-class" list="train-list" placeholder=" " required>
				<label class="form-label">Train Name</label>
			</div>
			<div class="form-input-box">
				<input type="button" value="Search" class="btn" name="search-train" id="search-train" onclick="javascript: FindTrain()">
			</div>
		</form>

		<div class="video-container">
			<video src="video3.mp4" id="video-slider" loop autoplay muted></video>
		</div>

	</div>
	<div id="train_book_detail"></div>
	<datalist id="city-list"></datalist>
	<datalist id="train-list"></datalist>
	<script src="train.js"></script>
</body>

</html>
<?php
include("inc/footer.php");
?>