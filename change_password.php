<?php 
    session_start();
    /*      
    //Forgot Password user
    $sqlQuery = "SELECT * FROM users WHERE id=$id AND verified='y'";
    $result = mysqli_query($db, $sqlQuery);
    $result = mysqli_fetch_assoc($result);
    if ($result) {
      header('Location:change_password.php');
    }
    */

    // initializing variables
    $errors = array();
    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'registration');
    
    // REGISTER USER
    if (isset($_POST['reg_user'])&&($_SESSION['username'])&&!emty($_SESSION['username'])) {
        $username = $_SESSION['username'];
        // receive all input values from the form
      $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
      $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    
      // form validation: ensure that the form is correctly filled ...
      // by adding (array_push()) corresponding error unto $errors array
      if (empty($password_1)) { array_push($errors, "Password is required"); }
      if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
      }
    
      // first check the database to make sure 
      // a user does not already exist with the same username and/or email
      $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);
    
      if ($user) { // if user exists
        $password = md5($password_1);
        $query = "UPDATE INTO users (password) VALUES('$password')";
        if(mysqli_query($db, $query)){
            die("Your Password is changed successfully...<br><a href='index.html'>Home</a>");
        }
      }
      // Finally, send_mail and verify user if there are no errors in the registration form
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
  	<h2>Change Password</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Change Password</button>
  	</div>
  </form>
</body>
</html>