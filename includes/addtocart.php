<?php
$id = $_REQUEST['id'];
$qty = $_REQUEST['quantity'];
$size = $_REQUEST['size'];
// connect to db 
include_once('../library/connectToDb.php');
$con = connectToDb();
//////////////////////
$query = "SELECT quantity, product_name from products where product_id = '$id' ";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$stock = $row['quantity'];
$name = $row['product_name'];

echo $qty; 
echo $id; 
echo $size; 
        
// if ($qty > $stock || $stock == 0) {
//     echo "there are only $stock in stock";
// } else if ($qty == 0) {
//     echo "please choose a quantity";
// } else {
//     if (isset($_SESSION['cart'][$id])) {
//             $_SESSION['cart'][$id] += $qty;
//         } else {
//             $_SESSION['cart'][$id] = $qty;
//         }
//         echo "product added";
//         echo var_dump($_SESSION["cart"]);
// }

?>
