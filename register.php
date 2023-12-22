<?php
require_once "dbconnection.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $fullname = $_POST['name'];
    $phn = $_POST['ph'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if($password==$confirm_password){

    $qry = "INSERT INTO `users` (`email`, `name`, `pnumber`) VALUES ('$email', '$fullname', '$phn')";
    $run = mysqli_query($dbcon,$qry);
    
    if($run==true){

        $psqry = "INSERT INTO `login` (`email`, `password`, `u_id`) VALUES ('$email', '$password',LAST_INSERT_ID() )";
        $psrun = mysqli_query($dbcon,$psqry);
        ?>  <script>
            alert('Registration Successfully :)'); 
            window.open('index.php','_self');
            </script>
        <?php
    }
    }else{
        ?>  <script>
            alert('Password mismatched!!'); 
            </script>
        <?php
    }

}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Agbalumo&family=Fredoka:wght@500&family=Montserrat:wght@300;400;500;600&family=Young+Serif&display=swap');

        body {
            background-color: #282c34;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Montserrat, sans-serif;
        }

        .container {
            min-width: fit-content;
            padding-inline: 5em;
            background-color: #424a5d;
            border-radius: 12px;
            box-shadow: 4 4px 12px #464646;
            display: flex;
            flex-direction: column;
            align-items: start;
        }

        h2 {
            color: #61dafb;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
        }

        label {
            font-size: 16px;
            color: #61dafb;
        }

        input {
            padding: 10px;
            border: 1px solid #61dafb;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            outline: none;
            width: 100%;
        }

        input[type="submit"] {
            background-color: #61dafb;
            color: #fff;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            padding: 12px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #4fa3d1;
        }

        p {
            margin-top: 15px;
            font-size: 14px;
            text-align: center;
            color: #888;
        }

        a {
            color: #ff6b6b;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="" method="post">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Phone Num.</label>
                <input type="text" id="phone" name="phone" placeholder="Phone" pattern="[0-9]{10}" title="Please enter a 10-digit phone number">
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="text" id="email" name="email" placeholder="Email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Register">
            </div>
            <p>Already have an account? <a href="index.php">Login here</a>.</p>
        </form>
    </div>
</body>
</html>
