<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password_1)) {
    array_push($errors, "Password is required");
  }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { 
    // If this user exists But not verified yet
    if ($user['username'] === $username && $user['email'] === $email && $password_1 == $password_2 && $user['password'] == md5($password_1) && $user['verified'] == 'n') {
      if (setcookie('user', $username, time() + 5 * 60, '/', 'localhost', true, true))
        header('location: verify.php');
    }
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  // Finally, send_mail and verify user if there are no errors in the registration form
  if (count($errors) == 0) {
    // Before save password encoded
    $password = md5($password_1);
    // Save user's information in sql user table
    $query = "INSERT INTO users (username, email, password)
  			  VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    // If cookie set then redirect to verify.php
    if (setcookie('user', $username, time() + 5 * 60, '/', 'localhost', true, true))
      header('location: verify.php');
    else
      array_push($errors, "Something went wrong!");
  }
}

// LOGIN USER
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $query = "SELECT * FROM users WHERE username='$username'";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) == 1) {
    $user = mysqli_fetch_assoc($results);
    if ($user['verified'] == 'n') {
      unset($_SESSION['username']);
    }
  }
}
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $user = mysqli_fetch_assoc($results);
      if ($user['verified'] == 'y') {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
      } else {
        array_push($errors, "Please verified first!");
      }
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
