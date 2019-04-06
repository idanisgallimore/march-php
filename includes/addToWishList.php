<?php 
include_once('../library/connectToDb.php');
$con = connectToDb();
$product_id = $_POST["id"];
// CHANGE THIS WHEN LOGIN IS DONE
$customer_id = 1;
// CHANGE ABOVE !!!
// Add conditional statements to check for login status 


// Check to make sure that it is not already in the wishlist 
$query = "SELECT * FROM wishlist WHERE customer_id = '$customer_id' AND product_id = '$product_id'";
$result = mysqli_query($con, $query);
$rowcount=mysqli_num_rows($result);

if($rowcount > 0){
    echo " Item is already in your wishlist!";
}else{
    $query = "INSERT INTO wishlist(customer_id, product_id) VALUES('$customer_id', '$product_id')";
    $result = mysqli_query($con, $query);
    if(!$result){
        echo " Could not add Item";
    }else{
        echo " Item added to wishlist";
    }
}


?>