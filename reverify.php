<!-- Forgott Password section -->
<?php
    session_start();
    // initializing variables
    $username = "";
    $email    = "";
    $errors = array();

    if(isset($_POST['reg_user'])){
    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'registration');

    // REGISTER USER
    if (isset($_POST['reg_user'])) {
      // receive all input values from the form
      $username = mysqli_real_escape_string($db, $_POST['username']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
    }
    if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' AND email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if($user['username'] === $username && $user['email'] === $email && $user['verified']=='y'){
      if(setcookie('user', $username, time()+5*60, '/', 'localhost',true, true));
        header('location: verify.php');
      }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
<style>
body {
  background-color: Skyblue;
}
</style>

</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Verify</button>
  	</div>
  </form>
</body>
</html>