const city = ["Ahamdabad", "Surat", "Rajkot", "Bhavnagar", "Gandhinagar", "Jamnagar", "Vadodara", "Amreli", "New Delhi", 'Delhi', 'Mumbai',
    'Mumbai Central', "Bangalore", 'Chennai Central', 'Kolkata', 'Pune', 'Jaipur', 'Lucknow', 'Kanpur', 'Kanpur Central', 'Nagpur', 'Indore',
    'Thane', 'Bhopal', 'Visakhapatnam', 'Pimpri Chinchwad', 'Patna', 'Ghaziabad', 'Ludhiana', 'Agra', 'Nashik', 'Faridabad', 'Meerut', "Chandigarh",
    'Kalyan Dombivali', 'Vasai Virar', 'Varanasi', 'Shrinagar', 'Aurangabad', 'Dhanbad', 'Amritsar', 'Navi Mumbai', 'Allahabad', "West Bengal", "Darjeeling",
    'Ranchi', 'Haora', 'Coimbatore', 'Jabalpur', 'Gwalior', 'Vijayawada', 'Jodhapur', 'Madurai', 'Raipur', 'Kota', 'Karnataka', 'Mysore', "Kerala", "Tamil Nadu",
    'Solapur', 'Chandigarh', 'Jalandhar', 'Tiruchirappalli', 'Bhubaneshwar', 'Kolapur', 'Jammu', 'Udaipur', "Hyderabad", 'Goa', 'New Jalpaiguri'];

var City_Val = document.getElementById('city-list');

for (let i = 0; i < city.length; i++) {
    City_Val.innerHTML += '<option value="' + city[i] + '"></option>';
}

// [Train_name, start, destination, starting_time, destination_time, Toatal_seat, Available_Seat](After we can add date also)
const train = [
    ["Rajdhani Express", "Mumbai", "Delhi", "04:00", "24:00", "400", "40"],
    ["Mumbai Howrah Duronto Express", "Mumbai", "Kolkata", "06:00", "24:00", "600", "400"],
    ["Bhubaneshwar Rajdhani", "Bhubaneshwar", "New Delhi", "00:00", "24:00", "400", "400"],
    ["Bangalore Shatabdi", "Chennai Central", "Bangalore", "08:05", "14:20", "600", "400"],
    ["Chandigarh Shatabdi", "New Delhi", "Chandigarh", "07:20", "12:16", "400", "400"],
    ["Visakhapatnam Duronto", "Visakhapatnam", "Hyderabad", "06:09", "16:06", "600", "400"],
    ["Ahmedabad Shatabdi", "Mumbai Central", "Ahamdabad", "06:10", "10:30", "400", "4"],
    ["Mysore Shatabdi", "Chennai Central", "Mysore", "07:50", "18:35", "600", "400"],
    ["Pune Shatabdi", "Pune", "Hyderabad", "00:00", "24:00", "400", "400"],
    ["Bangalore Rajdhani", "Bangalore", "Delhi", "00:00", "24:00", "600", "400"],
    ["LTT – Allahabad Duronto", "Mumbai", "Allahabad", "00:00", "24:00", "400", "400"],
    ["Secunderabad Rajdhani", "Hyderabad", "Delhi", "00:00", "24:00", "600", "400"],
    ["Coimbatore Shatabdi", "Chennai Central", "Coimbatore", "00:00", "24:00", "400", "400"],
    ["Kanpur Shatabdi", "Kanpur Central", "New Delhi", "00:00", "24:00", "600", "400"],
    ["Jaipur Duronto", "Mumbai Central", "Jaipur", "00:00", "24:00", "400", "400"],
    ["Goa Express", "Goa", "Karnataka", "00:00", "24:00", "600", "400"],
    ["Dibrugarh Rajdhani Express", "West Bengal", "Assam", "00:00", "24:00", "400", "400"],
    ["Nizamuddin Duronto Express", "Pune", "New Delhi", "00:00", "24:00", "600", "400"],
    ["Mandovi Express", " Goa", "Mumbai", "00:00", "24:00", "400", "400"],
    ["Indian Maharaja Deccan Odyssey", "Mumbai", "Delhi", "00:00", "24:00", "600", "400"],
    ["Island Express", "Tamil Nadu", "Kerala", "00:00", "24:00", "400", "400"],
    ["Himalayan Queen", "Haryana", "Himacal Pradesh", "00:00", "24:00", "600", "400"],
    ["Golden Chariot", "Karnataka", "Goa", "00:00", "24:00", "400", "400"],
    ["The Toy Train", "New Jalpaiguri", "Darjeeling", "00:00", "24:00", "600", "400"]
];
document.getElementById('train-class').onchange = function () {
    var train_name = document.getElementById('train-class').value;
    var from = document.getElementById('from');
    var to = document.getElementById('to');
    for (var i = 0; i < train.length; i++) {
        var str = train[i][0] + " (" + train[i][1] + " to " + train[i][2] + ")";
        if (train_name.indexOf(str) == 0) {
            from.value = train[i][1];
            to.value = train[i][2];
            return;
        }
    }
}
document.getElementById('train-class').onfocus = function () {
    var from = document.getElementById('from').value;
    var to = document.getElementById('to').value;
    var result = document.getElementById('train-list');
    result.innerHTML = "";
    if (from == '' && to == '') {
        for (let i = 0; i < train.length; i++) {
            var str = '<option value="' + train[i][0] + " (" + train[i][1] + " to " + train[i][2] + ")" + '">';
            if (result.innerHTML.indexOf(str) == -1)
                result.innerHTML += '<option value="' + train[i][0] + " (" + train[i][1] + " to " + train[i][2] + ")" + '">';
        }
    } else if (from != '' && to == '') {
        for (let i = 0; i < train.length; i++) {
            if (train[i][1].toLowerCase().search(from.toLowerCase()) != -1) {
                var str = '<option value="' + train[i][0] + " (" + train[i][1] + " to " + train[i][2] + ")" + '">';
                if (result.innerHTML.indexOf(str) == -1)
                    result.innerHTML += '<option value="' + train[i][0] + " (" + train[i][1] + " to " + train[i][2] + ")" + '">';
            }
        }
    } else if (from == '' && to != '') {
        for (let i = 0; i < train.length; i++) {
            if (train[i][2].toLowerCase().search(to.toLowerCase()) != -1) {
                var str = '<option value="' + train[i][0] + " (" + train[i][1] + " to " + train[i][2] + ")" + '">';
                if (result.innerHTML.indexOf(str) == -1)
                    result.innerHTML += '<option value="' + train[i][0] + " (" + train[i][1] + " to " + train[i][2] + ")" + '">';
            }
        }
    } else {
        for (let i = 0; i < train.length; i++) {
            if (train[i][1].toLowerCase().search(from.toLowerCase()) != -1 && train[i][2].toLowerCase().search(to.toLowerCase()) != -1) {
                var str = '<option value="' + train[i][0] + " (" + train[i][1] + " to " + train[i][2] + ")" + '">';
                if (result.innerHTML.indexOf(str) == -1)
                    result.innerHTML += '<option value="' + train[i][0] + ' (' + train[i][1] + ' to ' + train[i][2] + ')' + '">';
            }
        }
    }
}

var train_book_list = document.getElementById("train_book_detail");

function FindTrain() {
    var from = document.getElementById('from').value;
    var to = document.getElementById('to').value;
    var train_name = document.getElementById('train-class').value;
    var result = document.getElementById('train_book_detail');
    var from_index = -1;
    var to_index = -1;
    var train_index = -1;
    if (from == '' && to == '') {
        alert('Starting city and Destination city cannot be null!');
        return;
    } else if (from == '') {
        alert('Starting city cannot be null!');
        return;
    } else if (to == '') {
        alert('Destination city cannot be null!');
        return;
    }
    for (let i = 0; i < city.length; i++) {
        if (from.toLowerCase().match(city[i].toLowerCase())) {
            from_index = i;
        }
        if (to.toLowerCase().match(city[i].toLowerCase())) {
            to_index = i;
        }
        if (-1 != from_index && -1 != to_index) {
            break;
        }
    }
    if (to_index == from_index) {
        alert('Starting city and Destination city is same!');
        return;
    } else if (from_index == -1 && to_index == -1) {
        alert('Sorry Cities ' + from + ' and ' + to + ' are not finded!');
    } else if (from_index == -1) {
        alert('Sorry City ' + from + ' is not finded!');
    } else if (to_index == -1) {
        alert('Sorry City ' + to + ' is not finded!');
    } else {
        for (let i = 0; i < train.length; i++) {
            if (train_name.toLowerCase() == (train[i][0].toLowerCase() + ' (' + train[i][1].toLowerCase() + ' to ' + train[i][2].toLowerCase() + ')')) {
                train_index = i;
                if (train[train_index][6] > 50) {
                    color = 'green';
                } else if (train[train_index][6] > 10) {
                    color = 'orange';
                } else if (train[train_index][6] > 0) {
                    color = 'red';
                } else {
                    alert("No seet availabel!");
                    return;
                }
                // Showing final train details
                result.innerHTML = "<div class='form-container'><form action='reservation.php' method='post'><br><div id='train-details-container'><table id='train-details-table'><tr id='details-0' ><td colspan=2><h3>" + train[train_index][0] + "</h3></td><br></tr><tr id='details-1'><td>From</td><td><strong>" + train[train_index][1] + "</strong></td></tr><tr id='details-2'><td>To</td><td><strong>" + train[train_index][2] + "</strong></td></tr><tr id='details-3'><td>Starting time</td><td><strong>" + train[train_index][3] + "</strong></td></tr><tr id='details-4'><td>Ending time</td><td><strong>" + train[train_index][4] + "</strong></td></tr><tr id='details-5'><td>Availabel seat</td><td><strong style='color: " + color + "' id='availabel_seat'>" + train[train_index][6] + "</strong></tr></table></div><div class='form-input-box'><input type='hidden' name='train-details' id='train-details' style='display: none'><button type='submit' onclick='saveDiv()' class='btn'>Confirm</button></div></form></div>";
                document.getElementById('train-details').value = document.getElementById('train-details-container').innerHTML;
                return;
            }
        }
        if (-1 == train_index) {
            alert('Sorry train ' + train_name + ' is not finded!');
        }
    }
}
