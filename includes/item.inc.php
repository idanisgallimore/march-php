<div class="item-container flex">
    <?php 
    $id = $_REQUEST['id'];

    include_once('library/connectToDb.php');
    $con = connectToDb();
    $query = "SELECT * FROM products WHERE product_id = '$id'";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $product_name = $row['product_name'];
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
            <p class = \"item-amount\">Stock: $quantity left!</p>
            <form class=\"item-form\" action = \"index.php\" method = \"GET\">
                <label for=\"size\">Size: </label>
                <select class = \"dropdown\" name = \"size\">
                    <option class = \"options\" value = \"small\">Small</option>
                    <option class = \"options\" value = \"medium\">Medium</option>
                    <option class = \"options\" value = \"large\">Large</option>
                </select>
                <label for=\"quantity\">Qty: </label>
                <select class = \"dropdown\" name = \"size\">";
        for ($i = 0; $i < 26; $i++) {
            echo "<option class = \"options\" value = \"$i\">$i</option>";
        };
        echo "</select>
                <input type = \"hidden\" name=\"page\" value=\"cart\">
                <button class=\"btn btn-long btn-black\">Add to cart</button>
            </form>
        </div>";
    }

    ?>
</div> 