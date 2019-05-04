<?php 
include_once('../library/connectToDb.php');
$con = connectToDb();
$product_id = $_POST["id"];

function get_id($user){
    $con = connectToDb();
    $query = "SELECT * FROM customers WHERE email = '$user'";
    $result = mysqli_query($con, $query);
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $id = $row["customer_id"];

        }
        return $id; 
    }else{
        echo mysqli_error($con);
    }
};

if(isset($_SESSION['user'])){
    $customer_id = get_id($_SESSION["user"]);
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

}else{
    echo "Sign in first!";
}


?>