<!-- admin logIn page and login logic -->
<?php

session_start();
if (isset($_SESSION['uid'])) {

    header('location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<style>
   
  @import url('https://fonts.googleapis.com/css2?family=Agbalumo&family=Fredoka:wght@500&family=Montserrat:wght@300;400;500;600&family=Young+Serif&display=swap');

    .loginForm{
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
        gap:1em;
    }
    #loginButton{
        padding-inline: 1.5em;
        padding-block: 0.2em;
    }
    body{
        background: #b7e8e8;
        font-family: 'Montserrat','Sans-serif';

    }
    input{
        padding: 0.5em;
        
    }
    label{
        font-weight: 600;
    }


    .loginForm{
        font-family: 'Montserrat','Sans-serif'; 
        background: #ffffff;
        max-width: fit-content;
        padding-inline: 3em;
        margin: 5em auto;
        padding-block: 2em;
        border-radius: 4%;
        box-shadow: 5px 5px 12px gray;
        position:relative;
        top: 7em;
    }
</style>

<body >
    <h5><a href="../index.php" style="float: right; margin-right:50px; color:#FFFFFF">BackToHome</a></h5><br>
    
    <form action="adminlogin.php" method="POST" style="margin: auto;">
        <div class="loginForm" align="center" >
        <h1 align='center' style="color: #1d1e1f ;font-size:60px">Admin Login</h1>
   
               <div class="wrapper">     

               <label for="uname">Email id:</label> 
                <input type="email"  id="uname" name="uname" require>
            
            
                </div>    
                <div class="wrapper">
                <label for="pass">Password:</label>
                <input type="password" id="pass" name="pass" require>
                </div>
               
                <input  id="loginButton" type="submit" name="login" value="Login" style="cursor: pointer;">
           
         </div>
    </form>
</body>

</html>

<?php

include('../dbconnection.php');
if (isset($_POST['login'])) {
    $ademail = $_POST['uname'];
    $password = $_POST['pass'];
    $qry = "SELECT * FROM `adlogin` WHERE `email`='$ademail' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
        ?>
        <script>
            alert("Only admin can login..");
            window.open('adminlogin.php', '_self');
        </script><?php
    }
    else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['a_id'];
        $_SESSION['uid'] = $id;
        header('location:dashboard.php');
    }
}
?>
