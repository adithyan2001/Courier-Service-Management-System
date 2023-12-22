<?php
#include ('')
require_once "session.php";
?>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "courierdbdemo";

// Create a database connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$courierQuery = "SELECT * FROM courier";
$courierResult = mysqli_query($conn, $courierQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            
            background: url("../images/imgbg1.jpg")
        }
        h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            /* width: 100%; */
            margin-top: 20px;
            background: white;
            width: 80vw;
            font-size: 0.9em;
            margin-inline:auto;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
       
    </style>
</head>
<body>
<h5 ><a href="logout.php" style="float: right; margin-right:20px; color:black;">Logout</a></h5>
    <h2>Courier Details</h2>
    <div class="table-wrapper">
    
    <table>
        <tr>
            <th>Courier ID</th>
            <th>Sender Email</th>
            <th>Receiver Email</th>
            <th>Sender Name</th>
            <th>Receiver Name</th>
            <th>Sender Phone</th>
            <th>Receiver Phone</th>
            <th>Sender Address</th>
            <th>Receiver Address</th>
            <th>Weight</th>
            <th>Bill Number</th>
            <th>Image</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($courierResult)) {
            echo "<tr>";
            echo "<td>" . $row['c_id'] . "</td>";
            echo "<td>" . $row['semail'] . "</td>";
            echo "<td>" . $row['remail'] . "</td>";
            echo "<td>" . $row['sname'] . "</td>";
            echo "<td>" . $row['rname'] . "</td>";
            echo "<td>" . $row['sphone'] . "</td>";
            echo "<td>" . $row['rphone'] . "</td>";
            echo "<td>" . $row['saddress'] . "</td>";
            echo "<td>" . $row['raddress'] . "</td>";
            echo "<td>" . $row['weight'] . "</td>";
            echo "<td>" . $row['billno'] . "</td>";
            echo "<td>" . $row['image'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . "<a href='ctrack.php?id=" . $row['c_id'] . "'><button type='submit' class='btn btn-primary'>received</button></a>" . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
