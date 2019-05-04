<?php 
include_once('library/connectToDb.php');
$con = connectToDb();
$sender = $_POST["sender"];
$email = $_POST["email"];
$message = $_POST["message"];

$query = "INSERT INTO messages(sender, email, message) VALUES('$sender','$email','$message') ";
$result = mysqli_query($con, $query);

if($result){
    echo "<div class=\"flex msg-container fail-msg-container\">
    <h2 class =\"fail-msg msg\">Message sent. Please wait for reply from our people.</h2>
    <a href=\"index.php?page=main\" class=\"page-link\">Home</a>
    </div>";
}else{
    echo "<div class=\"flex msg-container fail-msg-container\">
    <h2 class =\"fail-msg msg\">Message not sent.</h2>
    <a href=\"javascript:history.go(-1)\" class=\"page-link\">Try Again</a>
    </div>";
}


?>