<?php
// Session is started
session_start();
// Connect with server
$db = mysqli_connect('localhost', 'root', '', 'registration');
$success = array();
$errors = array();
// If user is coming from registration file and data is saved successfully
if (isset($_COOKIE['user'])) {
  $input_otp = '';
  $username = $_COOKIE['user'];
  // Checking if user is in table of users if yes check and save id and email
  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) {
    $id = $user['id'];
    $email = $user['email'];
    // If Resend is clicked or page is loaded then send otp
    if ((isset($_POST['resend'])) || $_SERVER['REQUEST_METHOD'] != 'POST') {
      $key = '0123456789abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $length = 6;
      $otp = '';
      for ($i = 0; $i < $length; $i++) {
        $otp .= substr($key, (rand() % strlen($key)), 1);
      }
      $subject = "OTP From train booking website";
      $to = $email;
      // Email part
      $body = '<div style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px"
      align="center" class="m_-8860157661478028148mdv2rw">
      <div style="font-family:"Google Sans",Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
          <div style="font-size:24px">Verify your email</div></div>
      <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
          <br> Hii, ' . $username . ' Use this verification code to finish registration Process:<br>
          <div style="text-align:center;font-size:36px;margin-top:20px;line-height:44px">
              ' . $otp . '</div><br>This code will expire in 2 minutes.<br>
              <br>If you don’t recognize <a style="font-weight:bold">onlinetrainticketbook@gmail.<wbr>com</a>,
          you can safely ignore this email.</div></div>';

      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: onlinetrainticketbook@gmail.com\r\n";
      //If Mail is sented then check if otp on user's id is not already exist and if not seted then make new row in sql tabel
      if (mail($to, $subject, $body, $headers)) {
        $query = "SELECT * FROM `authenticate` WHERE id='$id'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {
          $query = "UPDATE authenticate SET otp='$otp', expired='n', created='" . date("H:i:s") . "' WHERE id=$id";
          $result = mysqli_query($db, $query);
          // If queary is not executed
          if (!($result)) {
            array_push($errors, "Something went wrong!!");
          }
        } else {
          $query = "INSERT INTO authenticate (id, otp,	expired, created) VALUES ('" . $id . "', '" . $otp . "', 'n', '" . date("H:i:s") . "') ";
          $result = mysqli_query($db, $query);
          // If queary is not executed
          if (!($result)) {
            array_push($errors, "Something went wrong!!");
          }
        }
      } else {
        // If mail is not sent then go back
        die($email . ' is invalid email address or network error! <br><a href="register.php">Please Register again!</a><br />Please check Your email address.');
      }
    }
    // If user verifing the email
    else if (isset($_POST['verify_user']) && isset($_POST['get_otp'])) {
      $input_otp = $_POST['get_otp'];
      // Check If otp is correct and within time duration
      $sqlQuery = "SELECT * FROM authenticate WHERE id=$id AND otp='$input_otp' AND expired!='y' AND DATE('H:i:s') <= DATE_ADD(created, INTERVAL 2 MINUTE)";
      $result = mysqli_query($db, $sqlQuery);
      $result = mysqli_fetch_assoc($result);
      if ($result) {
        // Deleting row because now it is not useful
        $sqlUpdate = "DELETE FROM authenticate WHERE id='$id'";
        $result1 = mysqli_query($db, $sqlUpdate);
        // Updating user's row
        $sqlUpdate = "UPDATE users SET verified = 'y' WHERE id='$id'";
        $result2 = mysqli_query($db, $sqlUpdate);
        // If both done then user redirected to home page
        if ($result1 && $result2) {
          array_push($success, "You are verified successfuly.");
          header("Location:index.php");
        }
      }
      // If otp is incorrect or otp's time is over
      else {
        array_push($errors, "Invalid OTP Or Time out!");
      }
    }
    // If otp is empty
    else if (empty($_POST['get_otp'])) {
      array_push($errors, "Please enter OTP first!");
    }
  }
  // If user is not exist in sql tabel
  else {
    header('loacation: register.php');
  }
}
// IF cookie is not set then redirect to register page
else {
  array_push($errors, "Time is out!");
  header('location:register.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify</title>
  <link rel="stylesheet" href="style.css">
</head>
<style>
  body {
    background: rgba(0, 0, 0, .5);
  }

  .form-container {
    padding-top: 100px;
    position: unset;
  }

  .video-container {
    position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%;
    min-height: 100vh;
    z-index: -1;
    background: rgba(0, 0, 0, .5);
  }

  #video-slider {
    background: rgba(0, 0, 0, .5);
    width: 100%;
    height: 100vh;
    bottom: 0;
  }

  #timer {
    color: #aaa;
    margin-block-start: 7px;
  }

  #timer {
    text-align: center;
    font-size: large;
  }
</style>

<body>
  <!-- Form start -->
  <div class="form-container">

    <form method="post">
      <h3>OTP Verification</h3>
      <?php include('errors.php'); ?>
      <!-- Input div -->
      <div class="form-input-box">
        <input type="text" name="get_otp" id="get_otp" class="box" placeholder=" ">
        <label class="form-label">OTP</label>
      </div>
      <!-- Information -->
      <div>Please refresh your email</div>
      <!-- Submit and resend buttons -->
      <input type="submit" value="Verify" name="verify_user" class="btn">
      <input type="submit" name='resend' id="resend" value="Resend OTP" class="btn">
      <!-- timer -->
      <div id="timer"></div>
    </form>

    <!-- Background Video -->
    <div class="video-container">
      <video src="video3.mp4" id="video-slider" loop autoplay muted></video>
    </div>

  </div>
  <!-- Form ended -->
  
  <!-- Script for resend timer -->
  <script>
    var timeout = 90; //in seconds
    function timer(remaining) {
      var m = Math.floor(remaining / 60);
      var s = remaining % 60;
      m = m < 10 ? '0' + m : m;
      s = s < 10 ? '0' + s : s;
      document.getElementById('timer').innerHTML = "Resend OTP " + m + ':' + s;
      remaining -= 1;
      if (remaining >= 0) {
        setTimeout(function() {
          timer(remaining);
        }, 1000);
        return;
      } else {
        document.getElementById('resend').style.display = 'unset';
        document.getElementById('timer').innerHTML = "";
      }
    }
    window.onload = function() {
      document.getElementById('resend').style.display = 'none';
      timer(timeout);
    }
  </script>
</body>

</html>