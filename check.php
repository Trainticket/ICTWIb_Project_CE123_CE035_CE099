<?php
    if(!isset($_POST['train-details'])){
        header('loaction: book.php');
    }
?>
<style id='table-style'>
    table
    {
        border-collapse: collapse;
        width: 100%;
        margin-inline: 0;
        padding-inline: 20%;
    }
    table tr:first-child{
        background-color: #04AA6D;
        color: white;
        text-align: center;
    }
    table#passenger-details tr:first-child{
        background-color: #ffc000;
    }
    table tr:first-child h3{
        margin: 0;
        padding-block: 3px;
    }
    table tr:nth-child(even){
        background-color: #f2f2f2;
    }
    table tr:not(:first-child):nth-child(odd){
        background-color: #fefefe;
    }
    table tr:not(:first-child):hover{
        background-color: #ddd;
    }

    table td, table th{
        border: 1px solid #ddd;
        padding: 6px;
    }
    table#users-details tr:nth-child(even){
        background-color: #f2f2f2;
    }
    table#users-details tr:nth-child(odd){
        background-color: #fefefe;
    }
    table#users-details tr:hover{
        background-color: #ddd;
    }
    table#users-details th{
        padding-block: 10px;
        text-align: left;
        background-color: #4bb0e4;
        color: white;
    }
    table#users-details tr#foot th{
        background-color: #5095e0;
    }
</style>
<style>
    table{
        width: 60%;
        margin-inline: 20%;
    }
</style>
<?php 
$quata=$_POST["payment"];
$child=$_POST["child"];
$adult=$_POST["adult"];
$pay=0;

$quata_price = 0;

$passenger = '';

$tabel = '<table id="users-details"><th>Name</th><th>Age</th><th>Ticket Fees</th>';

     if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["age"]) && isset($_POST["address"]) && isset($_POST["state"]) && isset($_POST["city"]) && isset($_POST["child"]) && isset($_POST["adult"]) && isset($_POST["nationality"] )&& isset($_POST["pincode"])&& isset($_POST["phonenumber"]))
     {
         if(!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["email"]) && !empty($_POST["age"]) && !empty($_POST["address"]) && !empty($_POST["state"]) && !empty($_POST["city"]) && (!empty($_POST["child"]) || $_POST["child"]==0) && (!empty($_POST["adult"]) || $_POST["adult"]==0) && !empty($_POST["nationality"] )&& !empty($_POST["pincode"])&& !empty($_POST["phonenumber"]) )
         {
            if(strlen($_POST["pincode"])==6)
            {
                if($quata=="general"){
                    $quata_price = 100;
                }
                elseif($quata=="tatkal"){
                    $quata_price = 250;
                }
                elseif($quata=="premium"){
                    $quata_price = 500;
                }
                $pay= $quata_price + (($child * $quata_price)/2)+($adult * $quata_price);
                include('pay.html');

                // Setting in side bar email and adderess and city ext...
                $passenger='<table id="passenger-details"><tr><td colspan="2"><h3>Passenger Information</h3></td></tr><tr><td>Passenger Email</td><td>'.$_POST['email'].'</td></tr><tr><td>Passenger Mobile Number</td><td>'. $_POST["phonenumber"] .'</td></tr><tr><td>Passenger Address</td><td>'. $_POST["address"] .'</td></tr><tr><td>Passenger City</td><td>'. $_POST["city"] . ' , ' . $_POST["state"] .'</td></tr><tr><td>Pincode Number</td><td>'. $_POST["pincode"] .'</td></tr><tr><td>Passenger Nationality</td><td>'. $_POST['nationality'] .'</td></tr></table>';

                // Setting Tabel of user registration
                $tabel .= "<tr><td>". $_POST['lname'] .' ' . $_POST['fname'] ."</td><td>". $_POST['age'] ."</td><td>". $quata_price ."</td></tr>";
                if($adult>0){
                    echo "<br>";
                   for($i=0; $i<$adult; $i++){
                       if(isset($_POST['adult-'.($i+1).'-name'])&&!empty($_POST['adult-'.($i+1).'-name'])&&isset($_POST['adult-'.($i+1).'-age'])&&!empty(($_POST['adult-'.($i+1).'-age']))){
                            $tabel .= '<tr><td>'. $_POST['adult-'.($i+1).'-name'] .'</td><td>'. $_POST['adult-'.($i+1).'-age'] .'</td><td>'. $quata_price .'</td></tr>';
                            continue;
                       }
                       exit( "Sorry!! Some Fields Are Empty");
                       break;
                   }
                }
                if($child>0){
                    for($i=0; $i<$child; $i++){
                        if(isset($_POST['child-'.($i+1).'-name'])&&!empty($_POST['child-'.($i+1).'-name'])&&isset($_POST['child-'.($i+1).'-age'])&&!empty(($_POST['child-'.($i+1).'-age']))){
                            $tabel .= '<tr><td>'. $_POST['child-'.($i+1).'-name'] .'</td><td>'. $_POST['child-'.($i+1).'-age'] .'</td><td>'. $quata_price/2 .'</td></tr>';
                            continue;
                        }
                        exit( "Sorry!! Some Fields Are Empty");
                        break;
                    }
                 }
                 $tabel .= '<tr id="foot"><th colspan="2">Total fee</th><th>'. $pay .'</th></tr></table>';
                 echo $_POST['train-details'].'<br>' . $passenger . '<br>';
                 echo $tabel;
            }
            else
            {
                echo "Invalid Pincode"; 
            }
         }
         else
         {
            exit( "Sorry!! Some Fields Are Empty");
         }
     }
?>
    <form action='payment.php' method="post">
        <input type="hidden" value='<?php echo $_POST['table_style']; ?>' style="display:none" id="table_style" name="table_style">
        <input type="hidden" value='<?php echo $_POST['train-details']; ?>' style="display:none" id="table_1" name="table_1">
        <input type="hidden" value='<?php echo $passenger; ?>' style="display:none" id="table_2" name="table_2">
        <input type="hidden" value='<?php echo $tabel; ?>' style="display:none" id="table_3" name="table_3">
        <br><br><br>
        <center><a><input type="submit" value="Go For Payment" class="btn"></a></center>
        <br><br><br>
    </form>

    <script>
        document.getElementById('table_style').value = document.getElementById('table-style').innerHTML;
    </script>