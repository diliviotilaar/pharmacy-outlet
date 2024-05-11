<?php 
    $user = $_GET['user'];
    $currentDateTime = date('Y-m-d H:i:s');
    $kategori = $_GET['kategori'];
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
        <div class="cart">
            <form action="customer.php" method="get">
                <input type="hidden" name="user" value="<?php echo $user; ?>">
                <input type="hidden" name="kategori" value="Semua">
                <input type="image" src="images/return_logo.png " alt="Submit" width=110px height= 110px id="cartl" style="margin: 25px;">
            </form>
        </div>
    </div>
    <div class="history">
    <?php 
            include 'connect.php';
            $conn = mysqli_connect($host, $username,$password, $dbname);
            if (mysqli_connect_errno()) {
                echo "Koneksi ke server gagal dilakukan.";
                exit();
            }

            $query = "SELECT product_name, COUNT(*) AS product_count, SUM(product_price) AS total_price, status, date
            FROM history
            WHERE username = '$user'
            GROUP BY product_name, date;";

            $result = mysqli_query($conn, $query);

            while ($row = $result->fetch_assoc()) {
                $productName = $row['product_name'];
                $productCount = $row['product_count'];
                $totalPrice = $row['total_price'];
                $status = $row['status'];
                $date = $row['date'];
                ?>
                <div class="history1">
                    <img src="images/<?php echo $productName; ?>.png" alt="" width=250px height=250px>
                    <div class="price_text">
                        <h3><?php echo $productName; ?></h3>
                        <h4>Tanggal pemesanan: <?php echo $date; ?></h4>
                        <h4>Jumlah produk: <?php echo $productCount; ?></h4>
                        <p>Total harga: Rp <?php echo $totalPrice; ?></p>
                        <img src="images/<?php echo $status; ?>.jpg" alt="status" width=350px height=85px>
                    </div>

                </div>
                <?php } ?>
    </div>
</body>
</html>