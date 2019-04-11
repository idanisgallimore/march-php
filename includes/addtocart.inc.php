<?php 
$id = $_REQUEST['id'];
$qty = $_REQUEST['quantity'];
$size = $_REQUEST['size'];
// connect to db 
include_once('library/connectToDb.php');
$con = connectToDb();
//////////////////////
$query = "SELECT quantity, product_name from products where product_id = '$id' ";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$stock = $row['quantity'];
$name = $row['product_name'];
 

?>