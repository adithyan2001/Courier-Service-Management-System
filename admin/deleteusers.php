<!-- when admin click delete user link, it displays all users with delete option -->
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
    table, table *{
        text-decoration:none;
        border-collapse: collapse;
        padding-inline: 2em;
        padding-block: 1em;
        
    }
    
    </style>

<div class="admintitle">
    <div>
    <h5 ><a href="dashboard.php" style="float: left; margin-left:20px; color:aliceblue;">BackToDashboard</a></h5>
    <h5 ><a href="logout.php" style="float: right; margin-right:20px; color:aliceblue;">LogOut</a></h5>
    </div>
    <h1 align='center'>Showing All Users</h1>
</div>
<div style="overflow-x:auto;">
<table width='80%' border="1px solid" style="margin-left: auto; margin-right:auto; margin-top:30px; font-weight:bold;border-collapse: collapse;">
    <tr style="background-color: indigo;">
        <th>No.</th>
        <th>Users Name</th>
        <th>Email Id</th>
        <th>Action</th>
    </tr>
    <?php

        include('../dbconnection.php');

        $qry= "SELECT * FROM `users`"; //AND `name` LIKE '%name%'
        $run= mysqli_query($dbcon,$qry);

        if(mysqli_num_rows($run)<1){
            echo "<tr><td colspan='6'>There is no Data in Database</td></tr>";
        }
        else{
            $count=0;
            while($data=mysqli_fetch_assoc($run))
            {
                $count++;
            ?>
            <tr align="center">
                <td><?php echo $count; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><a href="usersdeleted.php?emm=<?php echo $data['email']; ?>">DeleteUser</a></td>
            </tr>
            <?php
            }
        }


    
    ?>

</table>
</div>