<?php 
    $result = $_REQUEST['q'];
    $arr = ["miami", 'loves', 'idanis'];
    // echo $result;
    
    if($result !== ""){
        $result = strtolower($result);
        foreach($arr as $item){
            if($result == $item){
                return $item;
            }
        }
    }
?>