<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <h5 ><a href="dashboard.php" style="float: right; margin-right:20px; color:black;">Go back</a></h5>
    <style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa; /* Lighter gray background */
    }

    table {
        width: 90vw;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #ffffff; /* White background */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Slightly lifted shadow */
        margin: 20px auto; /* Center the table horizontally */
    }

    th, td {
        border: 1px solid #dee2e6; /* Light gray border */
        padding: 15px;
        text-align: left;
    }

    th {
        background-color: #007bff; /* Primary blue color for header */
        color: #ffffff; /* White text color */
    }

    td {
        background-color: #ffffff; /* White background for table cells */
    }

    a {
        text-decoration: none;
        color: #007bff;
        transition: color 0.3s ease-in-out;
    }

    a:hover {
        text-decoration: underline;
        color: #0056b3;
    }
</style>

</head>
<body>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        ?>
        </body>

        <?php
        // Connect to your database
        $db = new mysqli('localhost', 'root', '', 'courierdbdemo');

        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        // Query the database for pending employee registrations
        $result = $db->query("SELECT * FROM employee WHERE status = 'pending'");

        // Output each pending employee registration
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td><a href='approve.php?id=" . $row["id"] . "'>Approve</a> | <a href='reject.php?id=" . $row["id"] . "'>Reject</a></td>";
            echo "</tr>";
        }

        $db->close();
        ?>
    </table>
</html>

<?php
// Connect to your database
$db = new mysqli('localhost', 'root', '', 'courierdb');

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get the employee ID from the URL
// $id = $_GET['id'];

// Connect to your database
$db = new mysqli('localhost', 'root', '', 'courierdb');

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get the employee ID from the URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id !== null) {
    // Your existing logic for approving or rejecting
    if ($_SERVER['PHP_SELF'] == '/project/employee/approve.php') {
        $sql = "UPDATE employee SET status = 'approved' WHERE id = $id";
        // The rest of your code...
    } elseif ($_SERVER['PHP_SELF'] == '/project/employee/reject.php') {
        $sql = "UPDATE employee SET status = 'rejected' WHERE id = $id";
        // The rest of your code...
    }
} //else {
    //echo "Employee ID is missing in the URL.";
//}

$db->close();
?>
