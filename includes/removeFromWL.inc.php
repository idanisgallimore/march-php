<?php 
        include_once('library/connectToDb.php');
        $id = $_REQUEST["id"];
        echo $id; 
        $con = connectToDb();
        $query = "DELETE FROM wishlist WHERE product_id = '$id'";
        $result = mysqli_query($con, $query);

        if($result){
            header('Location: index.php?page=wishlist');
        }else{
            echo "An error happened: " . mysqli_error($con);
        }
?>
