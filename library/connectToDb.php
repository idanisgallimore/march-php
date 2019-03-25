<?php 
    function connectToDb(){
        $con = mysqli_connect("localhost", "idanis", "test", "parmlees_store") or die("did not connect");
        return $con;
    }
?>