<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../login.php');
    }

?>
<?php
include('header.php');
include('../dbconnection.php');
$idd = $_GET['sidd'];

$qryy= "SELECT * FROM `courier` WHERE `c_id`='$idd'";
$run= mysqli_query($dbcon,$qryy);
$data=mysqli_fetch_assoc($run);
?>

<?php
if (!empty($data['location'])) {
    // If location data is available
    echo "<h1 style='margin: 100px;background-color:red;text-align:center'>Status >> Item Reached " . $data['location'] . "</h1>";
} else {
    // If location data is not available
    echo "<h1 style='margin: 100px;background-color:yellow;text-align:center'>Status >> On the Way</h1>";
}
?>

<br/><hr/> 
<div align='center'>
    <button onclick="window.location.href='trackMenu.php'" style="background-color:green;height:60px;width:130px;border-radius:15px;cursor:pointer">Go Back</button>
</div>
