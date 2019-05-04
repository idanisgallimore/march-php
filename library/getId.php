<?php 
    include_once('library/connectToDb.php');
    function get_id($user){
        $con = connectToDb();
        $query = "SELECT * FROM customers WHERE email = '$user'";
        $result = mysqli_query($con, $query);
        if($result){
            while ($row = mysqli_fetch_assoc($result)){
                $id = $row["customer_id"];
    
            }
            return $id; 
        }else{
            echo mysqli_error($con);
        }
    };
?>