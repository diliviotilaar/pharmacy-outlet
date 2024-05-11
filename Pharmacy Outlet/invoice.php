<?php 
    $user = $_GET['user'];
    $price = $_GET['price'];
    $currentDateTime = date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKOPEDEI</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="background_image"></div>
<form action="customer.php" method="get">
    <div class="header">
        <div class="logo">
            <img src="images/logo_apotek.png" alt="logo" width=150px height= 150px>
        </div>
        <div class="pharmacy">
            <h1>CVJ</h1>
            <h3>PHARMACY</h3>
        </div>
        <div class="cart">
            <form action="customer.php" method="get">
                <input type="hidden" name="user" value="<?php echo $user; ?>">
                <input type="image" src="images/return_logo.png " alt="Submit" width=110px height= 110px id="cartl" style="margin: 20px;">
            </form>
        </div>
    </div>
    <div class="login_table">
        <table id="t01">
        <tr>
            <th><strong>DATE</strong></th>
            <th><strong>USERNAME</strong></th>
            <th><strong>TOTAL PRICE</strong></th>
        </tr>
        <tr>
            <td><?php echo $currentDateTime; ?></td>
            <td><?php echo $user; ?></td>
            <td><?php echo $price; ?></td>
        </tr>
    </table>
    </div>
    <div class="other-button">
        <form action="insert_history.php" method="get">
        <input type="hidden" name="user" value="<?php echo $user; ?>">
        <input type="submit" name="insert_history" value="Konfirmasi pembayaran">
    </form>
    </div>
</body>
</html>