<?php 
include_once('library/connectToDb.php');
    $email1 = htmlspecialchars($_REQUEST['em1']);
    $email2 = htmlspecialchars($_REQUEST['em2']);
    $con = connectToDb();

    if(empty($email1)){
        echo "<div class=\"msg-container fail-msg-container\">
        <h2 class =\"fail-msg msg\">Email is blank. Please enter email.</i></h2>
        <a href=\"index.php?page=main\" class=\"page-link\">Go back</a>
        </div>";
    }
    if(empty($email2)){
        echo "<div class=\"msg-container fail-msg-container\">
        <h2 class =\"fail-msg msg\">Please confirm email.</i></h2>
        <a href=\"index.php?page=main\" class=\"page-link\">Go back</a>
        </div>";
    }
    if($email1 === $email2){
        $query = "INSERT INTO email_list(email_id, email) VALUES(null, '$email1')";
        $result = mysqli_query($con, $query);
        if($result){
            echo "<div class=\"msg-container fail-msg-container\">
            <h2 class =\"fail-msg msg\">You are now subscribed to our emails! :)</i></h2>
            <a href=\"index.php?page=main\" class=\"page-link\">Go back</a>
            </div>";
        }
    }else{
        echo "<div class=\"msg-container fail-msg-container\">
        <h2 class =\"fail-msg msg\">Something failed. Try Again.</i></h2>
        <a href=\"index.php?page=main\" class=\"page-link\">Go back</a>
        </div>";
    }
?>