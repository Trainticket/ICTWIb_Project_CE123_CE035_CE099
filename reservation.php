<?php
    if(!isset($_POST['train-details']) || empty('train-details')){
        die('Please book train first for booking the train <a href="train.php">Click</a>');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/rstyle.css">
</head>

<body>

    <div class="main">

        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="t2.jpg" alt="">
                    <div class="signup-img-content">
                        <h2>Register now </h2>
                        <p>
                            <font size="+1">while seats are available !</font>
                        </p>
                    </div>
                </div>
                <div id="fake"></div>
                <div class="signup-form">
                    <form class="register-form" id="register-form" action="check.php" method="POST">
                                <input type="hidden" name="train-details" id="train-details" display="none">
                        <div class="form-row">
                            <div class="form-group">

                                <div class="form-input">
                                    <label for="first_name" class="required">First name</label>
                                    <input type="text" name="fname" id="fname" />
                                </div>
                                <div class="form-input">
                                    <label for="last_name" class="required">Last name</label>
                                    <input type="text" name="lname" id="lname" />
                                </div>
                                <div class="form-input">
                                    <label for="email" class="required">Email</label>
                                    <input type="email" name="email" id="email" />
                                </div>
                                <div class="form-input">
                                    <label for="email" class="required">Age</label>
                                    <input type="number" min="16" max="92" name="age" />

                                </div>
                                <div class="form-input">
                                    <label for="company" class="required">Address</label>
                                    <input type="text" name="address" id="address"
                                        placeholder="Due to COVID-19 Guidelines" />
                                </div>
                                <div class="form-input">
                                    <label for="company" class="required">city</label>
                                    <input type="text" name="city" id="city" />
                                </div>
                                <div class="form-input">
                                    <label for="company" class="required">State</label>
                                    <select class="option" name="state">
                                        <option disabled="disabled" selected="selected">--Choose State</option>
                                        <option>Andhra Pradesh</option>
                                        <option>Arunachal Pradesh</option>
                                        <option>Assam</option>
                                        <option>Bihar</option>
                                        <option>Chhattisgarh</option>
                                        <option>Goa </option>
                                        <option>Gujarat</option>
                                        <option>Haryana</option>
                                        <option>Himachal Pradesh</option>
                                        <option>Jharkhand</option>
                                        <option>Karnataka</option>
                                        <option>Kerala</option>
                                        <option>Madhya Pradesh</option>
                                        <option>Maharashtra</option>
                                        <option>Manipur</option>
                                        <option>Meghalaya</option>
                                        <option>Mizoram</option>
                                        <option>Nagaland</option>
                                        <option>Odisha</option>
                                        <option>Punjab</option>
                                        <option>Rajasthan</option>
                                        <option>Sikkim</option>
                                        <option>Tamil Nadu</option>
                                        <option>Telangana</option>
                                        <option>Tripura</option>
                                        <option>Uttar Pradesh</option>
                                        <option>Uttrakhand</option>
                                        <option>West Bengal</option>

                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-input">
                                    <label for="age" class="required"> Number of Child</label>
                                    <input type="number" id="child" name="child" placeholder="Child (Under 5 yr)" />
                                    <br />
                                    <div class="form-input" id="child-group"></div>
                                </div>

                                <div class="form-input">                                    
                                    <label for="age" class="required"> Number of other Adult</label>
                                    <input type="number" id="adult" name="adult" placeholder="Adult (More than 5 yr)" />
                                    <br />
                                    <div class="form-input" id="adult-group"></div>
                                </div>


                                <div class="form-radio">
                                    <div class="label-flex">
                                        <label for="payment" class="required"><u>Select Your Quata:</u></label>
                                    </div>
                                    <div class="form-radio-group">
                                        <div class="form-radio-item">
                                            <input type="radio" name="payment" id="cash" value="general" checked>
                                            <label for="cash">General 100Rs/Person</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="payment" id="cheque" value="tatkal">
                                            <label for="cheque">Tatkal 250Rs/Person</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="payment" id="demand" value="premium">
                                            <label for="demand">Premium Tatkal 500Rs/Person</label>
                                            <span class="check"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-input">
                                    <label for="payable" class="required">Nationality</label>
                                    <input type="text" name="nationality" id="nationality" placeholder="Indian-IN" />
                                </div>
                                <div class="form-input">
                                    <label for="company" class="required">Pincode</label>
                                    <input type="number" name="pincode" id="pincode" pattern="[0-9]{6}" />
                                </div>
                                <div class="form-input">
                                    <label for="phone_number" class="required">Phone number</label>
                                    <input type="text" name="phonenumber" id="phonenumber" pattern="[1-9]{1}[0-9]{9}" />
                                </div>

                            </div>
                        </div>

                        <div class="form-submit">
                            <input type="submit" value="Submit" class="submit" id="submit" name="submit" />
                            <input type="reset" value="Reset" class="submit" id="reset" name="reset" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    var child_count=document.getElementById('child');
    var child_array=document.getElementById('child-group');
    
    var adult_count=document.getElementById('adult');
    var adult_array=document.getElementById('adult-group');

    var train_details = '<?php echo $_POST['train-details']; ?>';

    window.onload = function(){
        return;
    }

    child_count.onchange =function(){
        var current = child_array.childElementCount;
        var n = child_count.value;
        if(n>current){
            for(let i=current+1; i<=n; i++){
                child_array.innerHTML += "<div id='child-"+i+"'><label for='child-"+i+"' class='required'>Child "+i+" information</label><input type='text' name='child-"+i+"-name' id='child-"+i+"-name' placeholder='Child-"+i+" name' required /><input type='number' min='0' max='5' name='child-"+i+"-age' placeholder='Child-"+i+" age' required /><br /></div>";
            }
        }
        else{
            while(n<current){
                current--;
                child_array.removeChild(child_array.childNodes[current]);
                current = child_array.childElementCount;
            }
        }
    }
    adult_count.onchange =function(){
        var current = adult_array.childElementCount;
        var n = adult_count.value;
        if(n>current){
            for(let i=current+1; i<=n; i++){
                adult_array.innerHTML += "<div id='adult-"+i+"'><label for='adult-"+i+"' class='required'>Adult "+i+" information</label><input type='text' name='adult-"+i+"-name' id='adult-"+i+"-name' placeholder='Adult-"+i+" name' autocomplete='on' required /><input type='number' min='6' max='92' name='adult-"+i+"-age' placeholder='Adult-"+i+" age' required /><br /></div>";
            }
        }
        else{
            while(n<current){
                current--;
                adult_array.removeChild(adult_array.childNodes[current]);
                current = adult_array.childElementCount;
            }
        }
    }
    document.getElementById('submit').onclick=function(){
        var find = 'id="availabel_seat">';
        var index = train_details.indexOf(find);
        if(index!=-1){
            var total_seat ='';
            index += find.toString().length;
            while(train_details[index]<='9'&&train_details[index]>='0'){
                total_seat += train_details[index];
                index++;
            }
            let user_seat = parseInt(child_count.value)+parseInt(adult_count.value)+parseInt(1);
            if(parseInt(total_seat)<parseInt(user_seat)){
                alert('Sorry only '+total_seat+' seat are availabel!\n'+ user_seat +' seats are not availabel.');
                document.getElementById('register-form').action = 'train.php';
                document.location.replace('train.php');
                
            }else{
                document.getElementById('fake').innerHTML = train_details;
                document.getElementById('details-5').parentElement.removeChild(document.getElementById('details-5'));
                document.getElementById('train-details').value = document.getElementById('fake').innerHTML;
                document.getElementById('fake').parentElement.removeChild(document.getElementById('fake'));
            }
        }else{
            alert('Something went wrong');
            document.location.replace('train.php');
        }
    }
</script>
</body>

</html>