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
                    $total2 = 0;
                    foreach ($_SESSION["cart"] as $id => $qty) {
                        $query = "SELECT * FROM products WHERE product_id = '$id'";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row["product_id"];
                            $pic = $row["picture"];
                            $name = $row["product_name"];
                            $price = $row['price'];
                            $stock = $row['quantity'];
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
                                $total = $price * $qty;
                                $total2  += $total;
                                echo "<div class=\"cart-product flex\">
                                            <div class=\"img-cont flex\">
                                                <img class=\"cart-img\" src=\"$pic\">
                                                <h3 class=\"cart-name \">$name</h3>
                                            </div>
                                            <h4 class=\"cart-title pro\"> $$price</h4>
                                            <div class=\"pro\">
                                                <select class=\"cart-select\" name =\"qty\" value=\"$qty\">";
                                for ($i = 0; $i < 100; $i++) {
                                    if ($i == $qty) {
                                        echo "<option value=\"$i\" selected>$i</option>";
                                    } else {
                                        echo "<option value = \"$i\" >$i</option>";
                                    }
                                }

                                echo "</select>
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
            ?>
        </div>
    </div>
</div>