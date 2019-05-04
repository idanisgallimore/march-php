<?php
include_once('library/connectToDb.php');
$con = connectToDb();
$email = htmlspecialchars($_REQUEST['email']);
$password = htmlspecialchars($_REQUEST['password']);

if (empty($email) || empty($password)) {
    echo "<div class=\"flex msg-container fail-msg-container\">
            <h2 class =\"fail-msg msg\">Please, fill out all fields.</h2>
            <a href=\"javascript:history.go(-1)\" class=\"page-link\">Try Again</a>
            </div>";
} else {
    $query = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $query);
    $row = mysqli_num_rows($result);
    if ($row !== 0) {
        // while ($row = mysqli_fetch_assoc($result)){}
        $_SESSION['user'] = $email;
        echo "<div class=\"flex msg-container fail-msg-container\">
            <h2 class =\"fail-msg msg\">$name, You are signed in!</h2>
        </div>";
    } else {
        echo "<div class=\"flex msg-container fail-msg-container\">
        <h2 class =\"fail-msg msg\">Login Failed </h2>
        <a href=\"javascript:history.go(-1)\" class=\"page-link\">Try again</a>
        </div>";
    }
}

?>
