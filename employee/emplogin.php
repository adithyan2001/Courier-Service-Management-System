<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "courierdbdemo";
require_once 'session.php';

// Create a database connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process the login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query to check if the provided email and password match a record in the database
    $sql = "SELECT * FROM `employee` WHERE `email`='$email' AND `password`='$password' and `status`=''";
    $result = mysqli_query($conn, $sql);
    // Check if a matching record was found
    if (mysqli_num_rows($result) == 1) {
      $data=mysqli_fetch_assoc($result);
        echo "Login successful!";
        $_SESSION['empid'] = $data['id'];
        $_SESSION['emploc'] = $data['location'];
        header("Location: empdash.php");
        exit();
    } else {
      echo '<p style="text-shadow: 0.1em 0.1em 0.15em #f9829b; color: white;">Login failed. Admin need to approve your Request.</p>';
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <h2 align='center' style=" color: #ffffff;">Employee Login</h2>
    <h5 ><a href="../index.php" style="float: right; margin-right:20px; color:white;">Go back</a></h5>
    <style>
      body {
    background-image:url('dd1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
}
form {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  margin: 0;
}
input {
  margin-bottom: 10px;
  padding: 10px;
  width: 300px;
  border: 1px solid #ccc;
  border-radius: 5px;
}
button {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  cursor: pointer;
}
    </style>
</head>
<body>
    <form action=" " method="post">
        <label for="email" style="color: white;">Email:</label>
        <input type="text" name="email" required>
        <label for="password" style="color: white" >Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
        <p style="color: #0ac6f5;">If not registered <a href="empreg.php">Register here</a>.</p>
    </form>
</body>
</html>
