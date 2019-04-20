<div class="products flex">
    <h1 class="page-title">Shopping Cart</h1>
    <div class="flex cart-container">
        <div class="flex cart-sec1">
            <?php
            include_once('library/connectToDb.php');
            $con = connectToDb();

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
                            echo "<div class=\"cart-product flex\">
                                    <img class=\"cart-img\" src=\"$pic\">
                                    <h3 class=\"cart-title\">$name</h3>
                                    <h4 class=\"cart-title\">Price: $$price</h4>
                                    <h4 class=\"cart-title\">Qty: $qty</h4>
                                    <h4 class=\"cart-title\">Total: $$total</h4>
                                </div>";
                        }
                    }
                }
            }
            ?>
        </div>
        <div class="cart-sec2">
            <!-- Second half of page -->
        </div>
    </div>
</div>