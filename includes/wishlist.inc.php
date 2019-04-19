<div class="wishlist flex">
    <h1 class="page-title">WISHLIST</h1>

    <div class="wish-items">
        <?php
        include_once('library/connectToDb.php');
        // Change this when login is done
        $customer_id = 1;
        // Change above please
        $con = connectToDb();
        $query = "SELECT * FROM wishlist WHERE customer_id = '$customer_id'";
        $result = mysqli_query($con, $query);
        $rowcount=mysqli_num_rows($result);
        if($rowcount == 0){
            echo "<div class=\"flex msg-container fail-msg-container\">
            <h2 class =\"fail-msg msg\">No items in your wishlist!!!</h2>
            </div>";
        }else{
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $query2 = "SELECT * FROM products WHERE product_id = '$product_id'";
                $result2 = mysqli_query($con, $query2);
                // Grab product details
                while ($row = mysqli_fetch_assoc($result2)) {
                    $id = $row["product_id"];
                    $pic = $row["picture"];
                    $name = $row["product_name"];
                    $price = $row['price'];
                    $quantity = $row['quantity'];

                    if ($quantity == 0) {
                        echo "<div class=\"wl-item flex\">
                        <div class=\"wl-image\">
                            <img class = \"wl_pic\" src = \"$pic\">
                        </div>
                        <div class=\"wl-details flex\">
                            <p class = \"wl-title\">$name <br> $$price</p>
                        </div>
                        <div class=\"wl-action flex\">
                            <p class=\"wl-msg\">Sold Out</p>
                            <button class=\"btn btn-long btn-white\">Notify Me</button>
                            <a href=\"index.php?page=removeFromWL&id=$id\" class=\"wl-link\">Remove</a>
                        </div>
                    </div>";
                    }else{
                        // Modify to reflect clothes sizing option
                        echo "<div class=\"wl-item flex\">
                        <div class=\"wl-image\">
                            <img class = \"wl_pic\" src = \"$pic\">
                        </div>
                        <div class=\"wl-details flex\">
                            <p class = \"wl-title product\">$name <br> $$price</p>
                        </div>
                        <div class=\"wl-action flex\">
                        <form action=\"index.php\" method=\"post\">
                        <label for=\"quantity\">Qty: </label>
                        <input class=\"qty\" value=\"1\" type=\"text\" name=\"qty\">
                        <input type = \"hidden\" name=\"id\" value=\"$id\">
                        <input class = \"size\" type = \"hidden\" name=\"size\" value=\"null\">
                        <button class=\" btn btn-long btn-black\">Add to cart</button>
                        <input type = \"hidden\" name=\"page\" value=\"test\">
                        </form>
                            <a href=\"index.php?page=removeFromWL&id=$id\" class=\"wl-link\">Remove</a>
                        </div>
                    </div>";
                    }
                }
            }
        }

        ?>

    </div>
</div>