<?php
 // Connect to your database
 $db = new mysqli('localhost', 'root', '', 'courierdbdemo');

 // Check connection
 if ($db->connect_error) {
     die("Connection failed: " . $db->connect_error);
 }

 // Get the employee ID from the URL
 $id = $_GET['id'];

 // Reject the employee registration
 $sql = "UPDATE employee SET status = 'rejected' WHERE id = $id";
 $db->query($sql);

 $db->close();
 header('location: ../admin/empstatus.php');

?>
