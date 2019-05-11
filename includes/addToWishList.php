<?php 
include_once('../library/connectToDb.php');
$con = connectToDb();
$product_id = $_POST["id"];
$customer = $_POST["cust"];


if($customer !== null){
    $query = "SELECT * FROM wishlist WHERE customer_id = '$customer' AND product_id = '$product_id'";
    $result = mysqli_query($con, $query);
    $rowcount=mysqli_num_rows($result);
    
    if($rowcount > 0){
        echo " Item is already in your wishlist!";
    }else{
        $query = "INSERT INTO wishlist(customer_id, product_id) VALUES('$customer', '$product_id')";
        $result = mysqli_query($con, $query);
        if(!$result){
            echo " Could not add Item";
        }else{
            echo " Item added to wishlist";
        }
    }
}else{
      echo "Sign in first!";
}


?>