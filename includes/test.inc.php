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
    // redirect 
    header("location: index.php?page=cart");
    die();
}else{
    $_SESSION['cart'][$id] = $qty; 
    header("location: index.php?page=cart");
    die();
   }

?>