<div class="register-page flex">
    <form class="register__form flex" action="index.php" method="post">
        <h3 class="ls6__title">Register</h3>
        <input class="email-list__userin email-list__userin1" name="name" type="text" placeholder="Enter Your Name">
        <?php 
        $email = $_REQUEST['email'];
        echo "<input class=\"email-list__userin email-list__userin1\" name=\"email\" type=\"text\" value=\"$email\">"
        ?>
        <input class="email-list__userin email-list__userin2" name="password" type="password" placeholder="Enter Password">
        <input type="hidden" name="page" value="login">
        <input class="btn btn-short login-btn btn-black" type="submit" value="Sign in">
    </form>
</div>
<?php include('components/divider.php') ?> 