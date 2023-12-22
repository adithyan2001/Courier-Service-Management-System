<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../index.php');
    }

?>
<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<style>
    .content{
        margin-inline: auto;
        margin-top: 5em;
        height: fit-content;
        width: fit-content; 
        display:flex;
        flex-direction:column;
        gap: 2em;
        justify-content:center;
        align-items:start;
    }
    button{
        padding-inline: 1em;
        padding-block: 0.2em;
        border-radius: 5px;

    }
</style>
<body>
    <div class="content">
    <h2>Payment</h2>

    <form method="post" action="payment.php" style="box-shadow: 3px 3px 12px gray; padding: 2em; border-radius: 12px;">
    <label for="card_number">Card Number:</label>
        <input type="text" name="card_number" placeholder="Enter 12-digit card number" 
               pattern="\d{12}" title="Please enter a 12-digit number" required>
        <br>
        <label for="expiry_date">Expiry Date:</label>
        <input type="text" name="expiry_date" placeholder="MM/YY" required>
        <br>
        <label for="cvv">CVV:</label>
        <input type="password" name="cvv" placeholder="CVV" required>
        <br>
        <label for="package_weight">Package Weight (kg):</label>
        <input type="text" name="package_weight" placeholder="Enter package weight" required>
        <br>
        <button type="submit" style="border: unset; background:#0275d8; color: white; font-weight:bold;">Pay Now</button>
    </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_number = $_POST["card_number"];
    $expiry_date = $_POST["expiry_date"];
    $cvv = $_POST["cvv"];
    $package_weight = floatval($_POST["package_weight"]);
    $rate_per_kg = 120; // Set your rate per kilogram
    $amount = $package_weight * $rate_per_kg;

    $transaction_id = uniqid(); // Generate a unique transaction ID

    $_SESSION['transaction_id'] = $transaction_id;
    $_SESSION['package_weight'] = $package_weight;
    $_SESSION['amount'] = $amount;
    header('location:courierMenu.php');
}
?>
