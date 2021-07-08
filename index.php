<?php 
  include('server.php');
  if (!isset($_SESSION['username'])) {

  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive tour and travel agency website design tutorial</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
<!-- header section starts  -->

<header>

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="#" class="logo"><span>T</span>ravel</a>

    <nav class="navbar">
        <a href="#">Home</a>
        <a href="train.php">Book</a>
        <a href="help.html">Help</a>
        <a href="#contact">Contact</a>
    </nav>

    <div class="icons">
	<i class="fas fa-search" id="search-btn"></i>
        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>
            <i class="fas fa-user" id="user"> <?php echo $_SESSION['username']; ?></i>
            <i><a href="index.php?logout='1'" style="color: red;">Logout</a></i>
		<?php else: ?>
			<i class="fas fa-user" id="login-btn"> Login</i>
		<?php endif; ?>
    </div>

    <form action="" class="search-bar-container">
        <input type="search" id="search-bar" placeholder="search here...">
        <label for="search-bar" class="fas fa-search"></label>
    </form>

</header>

<!-- header section ends -->

<!-- login form container  -->

<div class="form-container">

    <i class="fas fa-times" id="form-close"></i>

    <form action="index.php" method="post">
        <h3>login</h3>
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

</div>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Online Train Ticket Booking</h3>
        <p>Indian Railways</p>
        <a href="https://en.wikipedia.org/wiki/Indian_Railways" class="btn">discover more</a>
    </div>

    <div class="controls">
        <span class="vid-btn active" data-src="video3.mp4"></span>
        <span class="vid-btn" data-src="video5.mp4"></span>
        <span class="vid-btn" data-src="video2.webm"></span>
        <span class="vid-btn" data-src="video4.mp4"></span>
        <span class="vid-btn" data-src="video1.webm"></span>
    </div>

    <div class="video-container">
        <video src="video3.mp4" id="video-slider" onended="nextVideo()" autoplay muted></video>
    </div><br><br><br><br><br><br><br><br>
    <div class="book" id="book">

        <h1 class="heading">
            <span>b</span>
            <span>o</span>
            <span>o</span>
            <span>k</span>
            <span class="space"></span>
            <span>n</span>
            <span>o</span>
            <span>w</span>
        </h1>
    
     </div>   
</section>

<!-- home section ends -->

<!-- book section starts  -->



<!-- gallery section ends -->

<!-- review section starts  -->


<!-- review section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">
    
    <h1 class="heading">
        <span>c</span>
        <span>o</span>
        <span>n</span>
        <span>t</span>
        <span>a</span>
        <span>c</span>
        <span>t</span>
    </h1>

    <div class="row">

        <div class="image">
            <img src="images/contact-img.svg" alt="">
        </div>

        <form action="">
            <div class="inputBox">
                <input type="text" placeholder="name">
                <input type="email" placeholder="email">
            </div>
            <div class="inputBox">
                <input type="number" placeholder="number">
                <input type="text" placeholder="subject">
            </div>
            <textarea placeholder="message" name="" id="" cols="30" rows="10"></textarea>
            <input type="submit" class="btn" value="send message">
        </form>

    </div>
    
</section>

<!-- contact section ends -->

<!-- brand section  -->

<!-- footer section  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>about us</h3>
            <p>We are Computer Engineering Students.We Studying at Dharmsinh Desai University,Nadiad.We make this website for learning purpose.
            </p>
        </div>
       
        <div class="box">
            <h3>quick links</h3>
            <a href="#">Home</a>
            <a href="train.php">Book</a>
            <a href="help.html">Help</a>
            <a href="#contact">Contact</a>
        </div>
        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">instagram</a>
            <a href="#">twitter</a>
            <a href="#">linkedin</a>
        </div>

    </div>

    <h1 class="credit"> created by <span>Jevin,Kashyap&Jenis</span> </span> | &copy;2021 all rights reserved! </h1>

</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>