<?php

if (empty($_POST['table_1']) || empty($_POST['table_2']) || empty($_POST['table_3'])) {
  header('location: train.php');
}
$style = $_POST['table_style'];
$body = $_POST['table_1'] . "<br>" . $_POST['table_2'] . "<br>" . $_POST['table_3'];

$year = $_POST["expyear"];

if (isset($_POST["cardname"]) && isset($_POST["cardnumber"]) && isset($_POST["expmonth"]) && isset($_POST["expyear"]) && isset($_POST["cvv"])) {
  //  If user enter non-numeric number then removing
  $str = '';
  for ($i = 0; $i < strlen($_POST['cardnumber']); $i++) {
    if ($_POST['cardnumber'][$i] >= '0' && $_POST['cardnumber'][$i] <= '9') {
      $str .= $_POST['cardnumber'][$i];
    }
  }
  // $_POST['cardnumber'] = $str;
  if (!empty($_POST["cardname"]) && !empty($_POST["cardnumber"]) && !empty($_POST["expmonth"]) && !empty($_POST["expyear"]) && !empty($_POST["cvv"])) {
    if (strlen($_POST["cardnumber"]) != 12) {
      echo "Invalid Cardnumber";
      exit();
      echo "<br>";
    }

    if (strlen($_POST["cvv"]) != 3) {
      echo "Invalid cvv";
      echo "<br>";
    }

    if (isset($_POST["expyear"]) == 4 && $year > 2020) {
      if (isset($_POST["confirm"])) {
        ?>
        <!DOCTYPE html>

<head>
  <title>pay</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
</head>
<script type="text/javascript">
  var style_area = '<?php echo json_encode($style) ;?>';
  var print_area = '<?php echo json_encode($body) ;?>';
  style_area = style_area.substr(2); 
  print_area = print_area.substr(1, print_area.length-2); 
  function PrintSlip() {
    var printContents = print_area;
    var contentStyle = style_area;
    var a = window.open('', '');
    a.document.write('<html><head><style>');
    a.document.write(contentStyle);
    a.document.write('</head></style><body><center><h1>Train Deatails</h1><p>From train booking website</p></center><br>');
    a.document.write(printContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
    a.document.close();
  }

</script>

<body>
  <h1 class='pay'><u>Your Payment Done Successfully!!</u></h1>
  <p class='rupee'><b>Your ticket <i class='fas fa-ticket-alt'></i> will send you via mail. </b></p>
  <center><button class='btn' onclick='PrintSlip()'>Print the slip</button></center><br><br>
  <center><a href='index.php' class='btn'>Go To Home</a></center>
</body>
</html>

        <?php
        include('last.html');
      } else {
        echo "Please Tick On Confirm To Proceed Further.";
      }
    } else {
      echo "Invalid Expiry Year.";
      echo "<br>";
    }
  } else {
    echo "Some Fields Are Empty";
  }
}
?>
