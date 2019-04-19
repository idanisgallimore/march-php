<div class="products flex">
    <h1 class="page-title">Shopping Cart</h1>
    <div class="flex cart-container">
        <div class="flex cart-sec1">
            <?php 
            var_dump($_SESSION['cart']);
            $cart = $_SESSION['cart'];
            if(!isset($_SESSION['cart'])){
                echo "<div class=\"flex msg-container fail-msg-container\">
                <h2 class =\"fail-msg msg\">Shopping cart is empty.</h2>
                </div>";
            }else{

            }
            ?>
        <div>
        <div class="cart-sec2">
            
        </div>
    </div>
</div>