<?php 
        session_unset();
        session_destroy();
        // echo "you are logged out";
        header('Location: index.php?page=main');
        // exit();

?>