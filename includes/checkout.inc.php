<div class="products flex">
    <h1 class="page-title">Checkout</h1>
    <div class="flex checkout-container">
        <div class="checkout-info">
            <h3 class="ls6__title ch-title">Your Information</h3>
            <form class="flex checkout-form" action="index.php" method="post">
                <div class="ch-info flex ch-info1">
                    <?php
                    include_once('library/connectToDb.php');
                    $con = connectToDb();
                    include_once('library/getId.php');
                    if (isset($_SESSION['user'])) {
                        $user = get_id($_SESSION['user']);
                        $query = "SELECT * FROM customers WHERE customer_id = '$user'";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $fName = $row['first_name'];
                            $lName = $row['last_name'];
                            $address = $row['address'];
                            $city = $row['city'];
                            $state = $row['state'];
                            $zipcode = $row['zip_code'];

                            echo "<label class=\"checkout_label\" for=\"fName\">First Name:</label>
                                <input class=\"chout-item\" name=\"fName\" type=\"text\" value=\"$fName\">
                                <label class=\"checkout_label\" for=\"fName\">Last Name:</label>
                                <input class=\"chout-item\" name=\"lName\" type=\"text\" value=\"$lName\">
                                <label class=\"checkout_label\" for=\"fName\">Address:</label>
                                <input class=\"chout-item\" name=\"address\" type=\"text\" value=\"$address\">
                                <label class=\"checkout_label\" for=\"fName\">City:</label>
                                <input class=\"chout-item\" name=\"city\" type=\"text\" value=\"$city\">
                                <label class=\"checkout_label\" for=\"fName\">State:</label>
                                <input class=\"chout-item\" name=\"state\" type=\"text\" value=\"$state\">
                                <input  name=\"userid\" type=\"hidden\" value=\"$user\">
                                <label class=\"checkout_label\" for=\"fName\">Zipcode:</label>
                                <input class=\"chout-item\" name=\"zipcode\" type=\"text\" value=\"$zipcode\">";
                        }
                    } else {
                        $user = null;
                        echo "<label class=\"checkout_label\" for=\"fName\">First Name:</label>
                        <input class=\"chout-item\" name=\"fName\" type=\"text\">
                        <label class=\"checkout_label\" for=\"fName\">Last Name:</label>
                        <input class=\"chout-item\" name=\"lName\" type=\"text\">
                        <label class=\"checkout_label\" for=\"fName\">Address:</label>
                        <input class=\"chout-item\" name=\"address\" type=\"text\">
                        <label class=\"checkout_label\" for=\"fName\">City:</label>
                        <input class=\"chout-item\" name=\"city\" type=\"text\">
                        <label class=\"checkout_label\" for=\"fName\">State:</label>
                        <input class=\"chout-item\" name=\"state\" type=\"text\">
                        <label class=\"checkout_label\" for=\"fName\">Zipcode:</label>
                        <input class=\"chout-item\" name=\"zipcode\" type=\"text\">";
                    }
                    ?>
                </div>
                <div class="ch-info flex ch-info2">
                    <label class="checkout_label" for="fName">Credit Card Number:</label>
                    <input class="chout-item" name="cc_num" type="text">

                    <label class="checkout_label" for="fName">Name on Card:</label>
                    <input class="chout-item" name="cc_name" type="text">

                    <label class="checkout_label" for="fName">Exp Date:</label>
                    <input class="chout-item" name="cc_exp" type="text">

                    <label class="checkout_label" for="fName">CVV:</label>
                    <input class="chout-item" name="cc_cvv" type="text">

                </div>
        </div>



        <!-- second section of page - total for checkout -->
        <div class="cart-sec2 flex">
            <?php
            include_once('library/connectToDb.php');
            $con = connectToDb();
            $sub_total = 0;

            // $cart = $_SESSION['cart'];

            foreach ($_SESSION["cart"] as $id => $qty) {
                $query = "SELECT * FROM products WHERE product_id = '$id'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["product_id"];
                    $price = $row['price'];
                    $total = $price * $qty;
                    $sub_total += $total;
                }
            }
            $tax = $sub_total * 0.07;
            $ttal = $tax + $sub_total + 4.99;
            echo "<h1 class=\"total-title\">Order Summary</h1>
               <h4 class=\"total\">SubTotal: $$sub_total</h4>
               <h5 class=\"total2\">Tax: $$tax</h4>
               <h5 class=\"total2\">Shipping: $4.99</h4>
               <h2 class=\"total\">Total: $$ttal</h2>
               <input type=\"hidden\" name='page' value='checkoutDone' />
               <button class=\"btn-test btn btn-long btn-black\"><a class=\"cart-link\" href=\"index.php?page=checkout\">Checkout</a></button>
               </form>";
            ?>
        </div>
    </div>
</div>