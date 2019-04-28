<div class="products cart flex">
    <h1 class="page-title">Shopping Cart</h1>
    <div class="flex cart-container">
        <div class="flex cart-sec1">
            <div class="product-info">
                <h2 class="product-title pro1">Products</h2>
                <h2 class="product-title pro">Price:</h2>
                <h2 class="product-title pro">Qty:</h2>
                <h2 class="product-title pro">Total:</h2>
            </div>
            <?php
            include_once('library/connectToDb.php');
            $con = connectToDb();
            $sub_total = 0;

            $cart = $_SESSION['cart'];
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
                echo "<div class=\"flex msg-container fail-msg-container\">
                <h2 class =\"fail-msg msg\">Shopping cart is empty.</h2>
                </div>";
            } else {
                if (count($cart) == 0) {
                    echo "<div class=\"flex msg-container fail-msg-container\">
                    <h2 class =\"fail-msg msg\">Shopping cart is empty.</h2>
                    </div>";
                } else {
                    foreach ($_SESSION["cart"] as $id => $qty) {
                        $query = "SELECT * FROM products WHERE product_id = '$id'";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row["product_id"];
                            $pic = $row["picture"];
                            $name = $row["product_name"];
                            $price = $row['price'];
                            $stock = $row['quantity'];
                            $total = $price * $qty;
                            
                            $sub_total += $total;
                            
                            if ($stock == 0) {
                                echo "<div class=\"cart-product flex\">
                                <div class=\"img-cont flex\">
                                <img class=\"cart-img\" src=\"$pic\">
                                <h3 class=\"cart-name \">$name</h3>
                                </div>
                                <h4 class=\"cart-title pro\"> $$price</h4>
                                <div class=\"pro\">
                                <p class=\"pro-msg\">Out of Stock</p>
                                </div>
                                <h4 class=\"cart-title pro\"> $$total</h4>
                                </div>
                                <div class=\"link\">
                                <a class=\"remove-link\" href=\"index.php?page=unset&id=$id\">Remove from cart</a>
                                </div> 
                                ";
                            } else {
                                echo "<div class=\"cart-product flex\">
                                <div class=\"img-cont flex\">
                                <img class=\"cart-img\" src=\"$pic\">
                                <h3 class=\"cart-name \">$name</h3>
                                </div>
                                <h4 class=\"cart-title pro\"> $$price</h4>
                                <div class=\"pro\">
                                    <h4 class=\"cart-title pro\"> $qty</h4>
                                </div>
                                <h4 class=\"cart-title pro\"> $$total</h4>
                                </div>
                                <div class=\"link\">
                                <a class=\"remove-link\" href=\"index.php?page=unset&id=$id\">Remove from cart</a>
                                </div> 
                                ";
                            }
                        }
                    }
                }
            }
            
            $tax = $sub_total * 0.07;
            $ttal = $tax + $sub_total + 4.99;
            echo "</div>
            <div class=\"cart-sec2 flex\">
                <h1 class=\"total-title\">Order Summary</h1>
            
               <h4 class=\"total\">SubTotal: $$sub_total</h4>
               <h5 class=\"total2\">Tax: $$tax</h4>
               <h5 class=\"total2\">Shipping: $4.99</h4>
               <h2 class=\"total\">Total: $$ttal</h2>
               <button class=\"btn-test btn btn-long btn-black\"><a class=\"cart-link\" href=\"#\">Checkout</a></button>
               </form>
            </div>";
            ?>
        
    </div>
</div>