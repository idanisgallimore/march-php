<div class="products flex">
    <h1 class="page-title">BEAUTY</h1>
    <p class = "page-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
    <div class="product-page flex">
        <?php 
        include_once('library/connectToDb.php');
        $con = connectToDb();
        $query = "SELECT * FROM products WHERE product_id = '8'";
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["product_id"];
            $pic = $row["picture"];
            $name = $row["product_name"];
            $price = $row['price'];
            $fullPic = $pic . $id . ".jpg";

            echo "<a href = \"index.php?page=item&id=$id\" class = \"product_container flex\">
               <img class = \"product_image\" src = \"$fullPic\">
                <div class = \"product-text flex\">
                    <p class = \"product-title product\">$name</p>
                    <p class = \"product-price product\">$$price</p>
                </div>
            </a>";
        };
        ?>
    </div>
</div> 
