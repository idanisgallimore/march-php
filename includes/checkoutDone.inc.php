<?php
// DB connection 
include_once('library/connectToDb.php');
$con = connectToDb();


if (isset($_SESSION['user'])) {
    $fName = $_REQUEST['fName'];
    $lName = $_REQUEST['lName'];
    $address = $_REQUEST['address'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    $zipcode = $_REQUEST['zipcode'];
    $user = $_REQUEST['userid'];

    $query = "UPDATE customers SET first_name = '$fName', last_name = '$lName', address = '$address', city = '$city', state = '$state', zip_code = '$zipcode' WHERE customer_id = $user";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    if ($result) {
        unset($_SESSION['cart']); 
        echo "<div class=\"flex msg-container fail-msg-container\">
        <h2 class =\"fail-msg msg\">Order Confirmed</h2>
        </div>";
    } else {
        echo "<div class=\"flex msg-container fail-msg-container\">
        <h2 class =\"fail-msg msg\">Order not processed.</h2>
        </div>";
    }
} else {
    unset($_SESSION['cart']); 
    echo "<div class=\"flex msg-container fail-msg-container\">
    <h2 class =\"fail-msg msg\">Order Confirmed</h2>
    </div>";
}
?>