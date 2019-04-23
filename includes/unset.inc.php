<?php 
$id = $_REQUEST['id'];


if(isset($_SESSION['cart'][$id])){
    unset($_SESSION['cart'][$id]); 
    echo "<div class=\"flex msg-container fail-msg-container\">
        <h2 class =\"fail-msg msg\">Product removed from shopping cart.</h2>
        <a href=\"javascript:history.go(-1)\" class=\"page-link\">Back to shopping cart.</a>
        </div>";
}

?>