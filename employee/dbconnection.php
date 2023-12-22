<?php

    $dbcon = mysqli_connect('localhost','root','','courierdbdemo');

    if($dbcon==false)
    {
        echo "Database is not Connected!";
    }
   
?>
