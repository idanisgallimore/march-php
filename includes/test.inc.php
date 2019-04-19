<?php 
 // connect to db 
 include_once('library/connectToDb.php');
 $con = connectToDb();
 //////////////////////

// using a different approach to the cart addition
   $id = $_REQUEST['id'];
   $qty = $_REQUEST['qty'];
   $size = $_REQUEST['size'];
   if(!isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id] = $qty;
   }else{
    $_SESSION['cart'][$id] += $qty; 
   }
   
//    $query = "SELECT quantity, product_name from products where product_id = '$id' ";
//    $result = mysqli_query($con, $query);
//    $row = mysqli_fetch_assoc($result);
   
//    $stock = $row['quantity'];
//    $name = $row['product_name'];
   
//    if (isset($_SESSION['cart'][$id])) {
//        $_SESSION['cart'][$id] += $qty;
//        echo "added";
//    } else {
//        $_SESSION['cart'][$id] = $qty;
//        echo "added";
//    }
//    if ($stock > $qty && $stock !== 0) {
//            if (isset($_SESSION['cart'][$id])) {
//                $_SESSION['cart'][$id] += $qty;
//            } else {
//                $_SESSION['cart'][$id] = $qty;
//            }
//            echo "Product added to cart";
           
//        }else if($qty > $stock){
//            echo "There are only $stock available";
//        }
//        else{
//            echo "Could not add product to cart";
//        }

?>