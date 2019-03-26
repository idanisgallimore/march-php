<div class="register-page flex">
    <form class="register__form flex" action="index.php" method="post">
        <h3 class="ls6__title">Register</h3>
        <input class="email-list__userin email-list__userin1" name="name" type="text" placeholder="Enter Your First Name">
        <input class="email-list__userin email-list__userin1" name="name2" type="text" placeholder="Enter Your Last Name">
        <?php 
            $email = $_REQUEST['email'];
            echo "<input class=\"email-list__userin email-list__userin1\" name=\"email\" type=\"text\" value=\"$email\">"
        ?>
        <input class="email-list__userin email-list__userin2" name="password" type="password" placeholder="Enter Password">
        <input class="email-list__userin email-list__userin2" name="password2" type="password" placeholder="Confirm Password">
        <input type="hidden" name="page" value="addUser">
        <input class="btn btn-long login-btn btn-black" type="submit" value="Create Account">
    </form>
</div>
<?php include('components/divider.php') ?> 