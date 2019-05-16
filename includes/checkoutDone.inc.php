<?php
// DB connection 
include_once('library/connectToDb.php');
$con = connectToDb();
// values from form
$fName = $_REQUEST['fName'];
$lName = $_REQUEST['lName'];
$address = $_REQUEST['address'];
$city = $_REQUEST['city'];
$state = $_REQUEST['state'];
$zipcode = $_REQUEST['zipcode'];
$user = $_REQUEST['userid'];

if (isset($_SESSION['user'])) {
    $query = "INSERT INTO customers(first_name, last_name, address, city, state, zip_code) VALUES('$fName', '$lName', '$address', '$city', '$state', '$zipcode') WHERE customer_id = '$user'";
    $result = mysqli_query($con, $query);
    if($result){
        echo "it worked";
    }
 }


?>