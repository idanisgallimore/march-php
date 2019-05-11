<div class="item-container flex">
    <?php
    $id = $_REQUEST['id'];
    $cat = $_REQUEST['cat'];
    
    include_once('library/connectToDb.php');
    $con = connectToDb();
    $query = "SELECT * FROM products WHERE product_id = '$id'";
    $result = mysqli_query($con, $query);

    // Change this to reflect other categories

    for ($i = 3; $i <= 9; $i++) {
        if ($cat == $i) {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_name = $row['product_name'];
                $id = $row['product_id'];
                $description = $row['description'];
                $picture = $row['picture'];
                $price = $row['price'];
                $quantity = $row['quantity'];

                echo "<div class=\"item-picture flex\">
                    <img class=\"item-pic\" src = \"$picture\">
                </div>
                <div class = \"item-info flex\">
                    <h3 class = \"item-title\">$product_name <br> 
                    $$price</h3>
                    <i class=\"item_icon far fa-heart\">Add to wishlist</i>
                    <p class = \"item-amount\">Stock: $quantity left!</p>";
                if ($quantity == 0) {
                    echo  "<div class=\"wl-action flex\">
                            <p class=\"wl-msg\">Sold Out</p>
                            <button class=\"btn btn-long btn-white\">Notify Me</button>
                         </div>";
                } else {
                    echo "<form action=\"index.php\" method=\"post\">
                        <div class=\"item-form\">
                                    <label for=\"quantity\">Qty: </label>
                                    <input class=\"qty\" type=\"text\" name=\"qty\" value=\"1\">
                                    <input type = \"hidden\" name=\"id\" value=\"$id\">
                                    <input class = \"size\" type = \"hidden\" name=\"size\" value=\"null\">
                                    <input type = \"hidden\" name=\"page\" value=\"test\">
                                    <button class=\"btn-test btn btn-long btn-black\">Add to cart</button>
                                </form>
                            </div>";
                }
                echo "</div>";
            }
        }
    }
    // for $cat 1 AND 2
    if ($cat == 1 || $cat == 2) {
        while ($row = mysqli_fetch_assoc($result)) {
            $product_name = $row['product_name'];
            $id = $row['product_id'];
            $description = $row['description'];
            $picture = $row['picture'];
            $price = $row['price'];
            $quantity = $row['quantity'];

            echo "<div class=\"item-picture flex\">
                    <img class=\"item-pic\" src = \"$picture\">
                    </div>
                    <div class = \"item-info flex\">
                    <h3 class = \"item-title\">$product_name <br> 
                    $$price</h3> 
                    <i class=\"item_icon far fa-heart\">Add to wishlist</i>
                    <p class = \"item-amount\">Stock: $quantity left!</p>";
            if ($quantity == 0) {
                echo  "<div class=\"wl-action flex\">
                            <p class=\"wl-msg\">Sold Out</p>
                            <button class=\"btn btn-long btn-white\">Notify Me</button>
                         </div>";
            } else {
                echo "<div class=\"item-form\">
                                <form action=\"index.php\" method=\"post\">
                                <label for=\"size\">Size: </label>
                                <select class = \"size dropdown\" name = \"size\">
                                    <option class = \"options\" value = \"small\">Small</option>
                                    <option class = \"options\" value = \"medium\">Medium</option>
                                    <option class = \"options\" value = \"large\">Large</option>
                                </select>
                                <label for=\"quantity\">Qty: </label>
                                <input class=\"qty\" type=\"text\" name=\"qty\"  value=\"1\">
                                <input class=\"hidden\" type = \"hidden\" name=\"id\" value=\"$id\">
                                <input type = \"hidden\" name=\"page\" value=\"test\">
                                <button class=\"btn-sub btn btn-long btn-black\">Add to cart</button>
                                </form>
                    </div>";
            }
            echo "</div>";
        }
    }



    ?>
</div>