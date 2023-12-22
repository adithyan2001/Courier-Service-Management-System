<?php
    session_start();
    require_once "dbconnection.php";
    $cid = $_GET['id'];
    echo $_SESSION['emploc'];
    $sql = "UPDATE `courier` SET `location`='{$_SESSION['emploc']}' WHERE c_id = '$cid'";
    mysqli_query($dbcon,$sql);
    header("Location: empdash.php");
?>