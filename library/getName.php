<?php 
    include_once('library/connectToDb.php');
    function get_Name($user){
        $con = connectToDb();
        $query = "SELECT * FROM customers WHERE email = '$user'";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $fName = $row["first_name"];
            $lName = $row["last_name"];

            $fullName = $fName . " " . $lName;
        }
        return $fullName; 
    };
?>