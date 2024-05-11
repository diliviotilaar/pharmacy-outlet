<?php
$user = $_GET["user"];
$status = 'diproses';
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
    <div class="header">
        <div class="logo">
            <img src="images/logo_apotek.png" alt="logo" width=150px height= 150px>
        </div>
        <div class="pharmacy">
            <h1>CVJ</h1>
            <h3>PHARMACY</h3>
        </div>
    </div>
    
    <?php

    include 'connect.php';

    $conn = mysqli_connect($host, $username,$password, $dbname);
    if (mysqli_connect_errno()) {
    echo "Koneksi ke server gagal dilakukan.";
    exit();
    }

    $query = "INSERT INTO history (username, product_name, product_price, id, status, date)
            SELECT username, product_name, product_price, id, '$status' AS status, '$currentDateTime' AS date
            FROM cart
            WHERE username = '$user'";

    mysqli_query($conn, $query);
        
    $num = mysqli_affected_rows($conn);

    if ($num > 0) {
    mysqli_close($conn); ?>
    <div class="login_table">
        <h3>Pembayaran berhasil dilakukan</h3>
    </div>
    <div class="other-button">
        <form action="clear_cart.php" method="post">
        <input type="hidden" name="user" value="<?php echo $user; ?>">
        <input type="submit" name="clear_cart" value="Ok" width=200px>
    </form>
    </div>
    

    <?php
    } else { ?>
    <div class="login_table">
        <h3>Pembayaran berhasil dilakukan</h3>
    </div>
    <div class="other-button">
        <form action="customer.php" method="get">
        <input type="hidden" name="user" value="<?php echo $user; ?>">
        <input type="submit" name="clear_cart" value="Ok">
        <input type="hidden" name="kategori" value="Semua">
    </form>
    </div>
    <?php }
    ?>    
    </body>
</html>