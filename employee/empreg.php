<?php
require_once "dbconnection.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{
 $name = $_POST['name'];
 $password = $_POST['password'];
 $education = $_POST['education'];
 $address = $_POST['address'];
 $location = $_POST['location'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];

 // Check if any of the form fields are empty
 if(empty($name) || empty($password) || empty($education) || empty($address) || empty($location) || empty($phone) || empty($email)) {
   ?> <script>
       alert('Please fill in all fields.'); 
       </script>
   <?php
 } else {
   $sql = "INSERT INTO employee (name, email ,password, education, address, location, phone)
   VALUES ('{$name}','{$email}', '{$password}', '{$education}', '{$address}', '{$location}', '{$phone}')";
   $run = mysqli_query($dbcon,$sql);
   if($run==true){
     ?> <script>
         alert('Registration Successfully :)'); 
         window.open('emplogin.php','_self');
         </script>
     <?php
   }
   else{
     ?> <script>
         alert('Error!!'); 
         </script>
     <?php

   }
 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Employee Registration</title>
<style>
body {
    background-image:url('emp.png');
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
<h5 ><a href="../index.php" style="float: right; margin-right:20px; color:#ooooo;">Go to Home</a></h5>
<h2 align='center' style="#000000;">Employee Registration</h2>
<form action ="" method = "post">
 <input type="text" id="name" name="name" placeholder="Name">
 <input type="text" id="email" name="email" placeholder="Email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
 <input type="password" id="password" name="password" placeholder="Password">
 <input type="text" id="education" name="education" placeholder="Education">
 <input type="text" id="address" name="address" placeholder="Address">
									<label for="city"></label>
									<select id="city" name="location" style="margin-block: 1em; outline:unset;
                  padding-block:0.5em; padding-inline: 1em; text-align:center; border: 0; border-radius: 8px; box-shadow:2px 2px 15px gray;">
										<option value=" " selected disabled>location</option>
										<option value="kasargod">kasargod</option>
                    <option value="kannur">kannur</option>
										<option value="wayanad">wayanad</option>
										<option value="kozhikode">kozhikode</option>
										<option value="malappuram">malappuram</option>
										<option value="palakkad">palakkad</option>
										<option value="thrissur">thrissur</option>
                    <option value="Ernakulam">Ernakulam</option>
										<option value="idukki">idukki</option>
										<option value="kottayam">kottayam</option>
										<option value="alappuzha">alappuzha</option>
										<option value="pathanamthitta">pathanamthitta</option>
                    <option value="Kollam">kollam</option>
										<option value="Thiruvananthapuram">Thiruvananthapuram</option>
								</select>
 <input type="text" id="phone" name="phone" placeholder="Phone" pattern="[0-9]{10}" title="Please enter a 10-digit phone number">
 <input type="submit" name="submit" value="Submit">
 <p style="color: #0ac6f5;">Already have an account?➤ <a href="emplogin.php">Login here</a>.</p>

</form>

</body>
</html>
