<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "credit";

    $con = mysqli_connect($server,$username,$password,$db);
    
    if($con){
        //echo "connection successfull";

    }else{
        echo "no connection";
        // use another method to show error----------o
        // die("no connection".mysqli_connect_error());
    }

?>