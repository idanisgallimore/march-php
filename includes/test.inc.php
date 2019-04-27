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
    // echo "<div class=\"flex msg-container fail-msg-container\">
    //     <h2 class =\"fail-msg msg\">Product added to cart.</h2>
    //     <a href=\"javascript:history.go(-1)\" class=\"page-link\">Go back</a>
    // </div>";
}else{
    $_SESSION['cart'][$id] = $qty; 
    header("location: index.php?page=cart");
    die();
    // echo "<div class=\"flex msg-container fail-msg-container\">
    //     <h2 class =\"fail-msg msg\">Product updated in cart.</h2>
    //     <a href=\"javascript:history.go(-1)\" class=\"page-link\">Go back</a>
    // </div>";
   }

?>