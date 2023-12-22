<!-- admin dashbord page with options for admin -->

<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
}else{
    header('location: adminlogin.php');
}

?>

<?php
include('head.php');
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Agbalumo&family=Fredoka:wght@500&family=Montserrat:wght@300;400;500;600&family=Young+Serif&display=swap');

    body {
        background: #4CB9E7;
        background-size: cover;
        min-height: 100vh;
        font-family: Montserrat, sans-serif;
        }


    .admintitle{
        background: #3559E0;
    }

    form *{
        color: #FFECD6;
        font-weight: 500;
        text-decoration:none;
    }
    
</style>

<div class="admintitle">
    <div>
    <h5 ><a href="../index.php" style="float: left; margin-left:20px; color:aliceblue;">LoginAsUser</a></h5>
    <h5 ><a href="logout.php" style="float: right; margin-right:20px; color:aliceblue;">Logout</a></h5>
    </div>
    <h1 align='center' style="">Admin Dashbord</h1>
</div>
<div align="center" style="margin-top:240px;">
<form style="position: center; background: inherit; font-size: 2em; color: #FFECD6;">
    
    <!-- <a href="insertdata.php">Insert Data</a><br><br> -->

    <!-- <a href="updatedata.php">Update Data</a><br><br> -->

    <a href="deletedata.php">Delete Data</a><br><br>
    <a href="empstatus.php">Employee status</a><br><br>
    <a href="deleteusers.php">Delete Users</a><br><br>
</form>

</div>
</body>
</html>