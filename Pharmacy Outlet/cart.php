<?php 
    $user = $_GET['user'];
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
        <?php 
            include 'connect.php';
            $conn = mysqli_connect($host, $username,$password, $dbname);
            if (mysqli_connect_errno()) {
                echo "Koneksi ke server gagal dilakukan.";
                exit();
            }

            $query = "SELECT c.id, c.username, c.product_name, c.product_price, t.subtotal_price, t.row_count
                    FROM cart c
                    JOIN (
                        SELECT product_name, SUM(product_price) AS subtotal_price, COUNT(*) AS row_count
                        FROM cart
                        WHERE username = '$user' 
                        GROUP BY product_name
                    ) t ON c.product_name = t.product_name
                    WHERE c.username = '$user'
                    GROUP BY c.product_name";
            $result = mysqli_query($conn, $query);
            
            $query2 = "SELECT SUM(product_price) AS total_price FROM cart";
            $result2 = mysqli_query($conn, $query2);
        ?>
        <div class="login_table">
            <table id="t01">
            <tr>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
            <?php while($product = mysqli_fetch_object($result)) { ?> 
            <tr>
                <td> <?php echo $product->product_name; ?> </td>
                <td> Rp. <?php echo $product->product_price; ?> </td>
                <td> <?php echo $product->row_count; ?> </td>
                <td> Rp. <?php echo $product->subtotal_price; ?> </td>
                <td> 
                    <form action="delete.php" method="get">
                    <input type="hidden" name="user" value="<?php echo $user; ?>">
                    <input type="hidden" name="id" value="<?php echo $product -> id; ?>">
                    <input type="submit" name="back" value="Delete">
                    </form>
                </td>
            </tr>
            <?php } ?>
            <?php $product2 = mysqli_fetch_object($result2); ?>
            <tr>
                <td></td>
                <td></td>
                <td> Total </td>
                <td> Rp. <?php echo $product2->total_price; ?> </td>
            </tr>
            </table>
            </div>
            <div class="other-button">
                <form action="clear_cart.php" method="post">
                <input type="hidden" name="user" value="<?php echo $user; ?>">
                <input type="submit" name="clear_cart" value="Clear Cart">
            </form>

            <form action="invoice.php" method="get">
                <input type="hidden" name="user" value="<?php echo $user; ?>">
                <input type="hidden" name="price" value="<?php echo $product2 -> total_price; ?>">
                <input type="submit" name="checkout" value="Checkout">
            </form>
            </div>    
</body>
</html>