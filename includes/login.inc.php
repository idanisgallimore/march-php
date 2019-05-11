<?php
include_once('library/connectToDb.php');
$con = connectToDb();
$email = htmlspecialchars($_REQUEST['email']);
$password = htmlspecialchars($_REQUEST['password']);


$query = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($con, $query);
$row = mysqli_num_rows($result);

if ($row == 0) {
    echo "<div class=\"flex msg-container fail-msg-container\">
        <h2 class =\"fail-msg msg\">Login Failed </h2>
        <a href=\"javascript:history.go(-1)\" class=\"page-link\">Try again</a>
        </div>";
} elseif ($result) {
    $_SESSION['user'] = $email;
    header("Location: index.php?page=main");
    // die();
}


?>
