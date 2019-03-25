<?php 
include_once('library/connectToDb.php');
    $email1 = htmlspecialchars($_REQUEST['em1']);
    $email2 = htmlspecialchars($_REQUEST['em2']);
    $con = connectToDb();
    $badEmail = 0;

    if(empty($email1) || !filter_var($email1, FILTER_VALIDATE_EMAIL)){
        echo "<div class=\"flex msg-container fail-msg-container\">
        <h2 class =\"fail-msg msg\">Please, enter valid email address.</h2>
        <a href=\"index.php?page=main\" class=\"page-link\">HOME</a>
        </div>";
        include("components/footer.php");
        $badEmail = 1; 
        exit;
    }
    if(empty($email2) || !filter_var($email2, FILTER_VALIDATE_EMAIL) ){
        echo "<div class=\"flex msg-container fail-msg-container\">
        <h2 class =\"fail-msg msg\">Please, confirm email address.</h2>
        <a href=\"index.php?page=main\" class=\"page-link\">HOME</a>
        </div>";
        $badEmail = 1; 
        include("components/footer.php");
        exit;
    }
    
    if($email1 === $email2){
        $email1 = strtolower($email1);
        $query = "SELECT * FROM email_list WHERE email = '$email1'";
        $result = mysqli_query($con, $query);
        $rowcount = mysqli_num_rows($result);
        if($rowcount > 0){
            echo "<div class=\"flex msg-container fail-msg-container\">
            <h2 class =\"fail-msg msg\">Your email is already in our list!</h2>
            <a href=\"index.php?page=main\" class=\"page-link\">HOME</a>
            </div>";
            $badEmail = 1; 
        }
        // Change after check
        if($badEmail !== 1){
            $query = "INSERT INTO email_list(email_id, email) VALUES(null, '$email1')";
            $result = mysqli_query($con, $query);
            if($result){
                echo "<div class=\"flex msg-container fail-msg-container\">
                <h2 class =\"fail-msg msg\">Success, you are now subscribed to our emails.</h2>
                <a href=\"index.php?page=main\" class=\"page-link\">HOME</a>
                </div>";
                }
            }else{
                echo "<div class=\"flex msg-container fail-msg-container\">
                <h2 class =\"fail-msg msg\">Something went wrong. Try again later.</h2>
                <a href=\"index.php?page=main\" class=\"page-link\">HOME</a>
                </div>";
            }
        }
?>