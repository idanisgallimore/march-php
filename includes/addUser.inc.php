<?php 
include_once('library/connectToDb.php');
$con = connectToDb();
$name = htmlspecialchars($_REQUEST['name']);
$last_name = htmlspecialchars($_REQUEST['name2']);
$password = htmlspecialchars($_REQUEST['password']);
$password2 = htmlspecialchars($_REQUEST['password2']);
$email = htmlspecialchars($_REQUEST['email']);
$badUser = 0;

if (empty($password) || empty($password2)) {
    echo "<div class=\"flex msg-container fail-msg-container\">
        <h2 class =\"fail-msg msg\">Please, enter a password. Make sure to confirm password.</h2>
        <a href=\"index.php?page=createaccount&email=$email\" class=\"page-link\">Try Again</a>
        </div>";
    include("components/footer.php");
    $badUser = 1;
    exit;
}
if (strlen($password) < 8) {
    echo "<div class=\"flex msg-container fail-msg-container\">
        <h2 class =\"fail-msg msg\">Passwords need to be atleast 8 characters long.</h2>
        <a href=\"index.php?page=createaccount&email=$email\" class=\"page-link\">Try Again</a>
        </div>";
    include("components/footer.php");
    $badUser = 1;
    exit;
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<div class=\"flex msg-container fail-msg-container\">
        <h2 class =\"fail-msg msg\">Please, enter a valid email.</h2>
        <a href=\"index.php?page=createaccount&email=$email\" class=\"page-link\">Try Again</a>
        </div>";
    include("components/footer.php");
    $badUser = 1;
    exit;
}
if (empty($name) || empty($last_name)) {
    echo "<div class=\"flex msg-container fail-msg-container\">
        <h2 class =\"fail-msg msg\">Please, enter your name.</h2>
        <a href=\"index.php?page=createaccount&email=$email\" class=\"page-link\">Try Again</a>
        </div>";
    include("components/footer.php");
    $badUser = 1;
    exit;
}
if ($password !== $password2) {
    echo "<div class=\"flex msg-container fail-msg-container\">
            <h2 class =\"fail-msg msg\">Passwords don't match!</h2>
            <a href=\"index.php?page=createaccount&email=$email\" class=\"page-link\">Try Again</a>
            </div>";
    include("components/footer.php");
    $badUser = 1;
    exit;
}
if ($badUser === 0) {
    $email = strtolower($email);
    $query = "SELECT * FROM customers WHERE email = '$email'";
    $result = mysqli_query($con, $query);
    $rowcount = mysqli_num_rows($result);
    if ($rowcount > 0) {
        echo "<div class=\"flex msg-container fail-msg-container\">
            <h2 class =\"fail-msg msg\">An account with this email already exists.</h2>
            <a href=\"index.php?page=createaccount&email=$email\" class=\"page-link\">HOME</a>
            </div>";
    } else {
        // $password = password_hash($password, PASSWORD_DEFAULT);
        // $password = password_hash($password, PASSWORD_DEFAULT);
        $email = strtolower($email);
        $query = "INSERT INTO customers(first_name, last_name, email, password) VALUES('$name','$last_name', '$email', '$password')";
        $result = mysqli_query($con, $query);
        $error = mysqli_error($con);
        if ($result) {
            // Change this when you add user cookies/sessions
            echo "<div class=\"flex msg-container fail-msg-container\">
                <h2 class =\"fail-msg msg\">Success your account was created</h2>
                <a href=\"index.php?page=loginPage\" class=\"page-link\">Log in</a>
                </div>";
        } else {
            echo "<div class=\"flex msg-container fail-msg-container\">
                    <h2 class =\"fail-msg msg\">Something went wrong. Try again later. : $error</h2>
                    <a href=\"index.php?page=createaccount&email=$email\" class=\"page-link\">Try Again</a>
                    </div>";
        }
    }
}
 