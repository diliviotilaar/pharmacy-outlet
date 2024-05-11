<?php 
    $user = $_GET['user'];
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
            <img src="images/logo_apotek.png" alt="logo_apotek" width=150px height= 150px>
        </div>
        <div class="pharmacy">
            <h1>CVJ</h1>
            <h3>PHARMACY</h3>
        </div>
        <div class="cart">
        <?php if ($user !== "guest") { ?>
            <form action="history.php" method="get">
                <input type="hidden" name="user" value="<?php echo $user; ?>">
                <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                <input type="image" src="images/history_.png" alt="Submit" width=110px height= 100px id="cartl" style="margin: 20px;">
            </form>
            <form action="cart.php" method="get">
                <input type="hidden" name="user" value="<?php echo $user; ?>">
                <input type="image" src="images/cart_.png" alt="Submit" width=110px height= 110px id="cartl" style="margin: 20px;">
            </form>
            <a href="index.php">
                <img src="images/log_out.png" alt="" width=110px height= 110px id= "logo" style="margin: 20px;">
            </a>
        <?php } 
              else { ?>
                <form action="index.php" method="post">
                    <input type="image" src="images/history_.png" alt="Submit" width=110px height=100px onclick="guestAlert()" style="margin: 20px;">
                </form>
                <form action="index.php" method="post">
                    <input type="image" src="images/cart_.png" alt="Submit" width=110px height=110px onclick="guestAlert()" style="margin: 20px;">
                </form>
                <form action="index.php" method="post">
                    <input type="image" src="images/log_out.png" alt="Submit" width=110px height=110px onclick="guestAlert()" style="margin: 20px;">
                </form>
        <?php } ?>
                
        </div>
    </div>
    <div class="navbar">
        <form action="customer.php" method="get">
            <ul>
                <li>
                    <input type="submit" name="kategori" value="Semua" class="custom-button">
                    <input type="hidden" name="user" value="<?php echo $user; ?>">
                </li>
                <li>
                    <input type="submit" name="kategori" value="Antibiotik" class="custom-button">
                    <input type="hidden" name="user" value="<?php echo $user; ?>">
                </li>
                <li>
                    <input type="submit" name="kategori" value="Vitamin" class="custom-button">
                    <input type="hidden" name="user" value="<?php echo $user; ?>">
                </li>
                <li>
                    <input type="submit" name="kategori" value="Antidepressan" class="custom-button">
                    <input type="hidden" name="user" value="<?php echo $user; ?>">
                </li>
                <li>
                    <input type="submit" name="kategori" value="Antipiretik" class="custom-button">
                    <input type="hidden" name="user" value="<?php echo $user; ?>">
                </li>
                <li>
                    <input type="submit" name="kategori" value="Antiinflamasi" class="custom-button">
                    <input type="hidden" name="user" value="<?php echo $user; ?>">
                </li>
            </ul>
        </form>
        </div>
    <div class="product">
        <?php 
            include 'connect.php';
            $conn = mysqli_connect($host, $username,$password, $dbname);
            if (mysqli_connect_errno()) {
                echo "Koneksi ke server gagal dilakukan.";
                exit();
            }
            
            if ($kategori == 'Semua') {
                $query = "SELECT product_name, product_price FROM product";
                $result = mysqli_query($conn, $query);

            while ($row = $result->fetch_assoc()) {
                $productName = $row['product_name'];
                $productPrice = $row['product_price'];
                ?>
                <div class="product1">
                    <img src="images/<?php echo $productName; ?>.png" alt="" width=200px height=200px>
                    <div>
                        <h3><?php echo $productName; ?></h3>
                    <p>Harga: Rp <?php echo $productPrice; ?></p>
                    
                    <?php if ($user !== "guest") { ?>
                        <form action="add_to_database.php" method="post">
                        <input type="hidden" name="user" value="<?php echo $user; ?>">
                        <input type="hidden" name="productName" value="<?php echo $productName; ?>">
                        <input type="hidden" name="productPrice" value="<?php echo $productPrice; ?>">
                        <input type="image" src="images/add_to_carts.png" alt="Submit" width=50px height=50px class='add_cart'>
                    </form>
                    <?php } 
                            else {  ?>
                                <form action="index.php" method="post">
                                    <input type="image" src="images/add_to_carts.png" alt="Submit" width=50px height=50px onclick="guestAlert()"> 
                                </form>
                                <?php  }?>
                    </div> 
                </div>
                <?php
                    }  
                    }
            else {
                $query = "SELECT product_name, product_price FROM product WHERE kategori = '$kategori'";
                $result = mysqli_query($conn, $query);

                while ($row = $result->fetch_assoc()) {
                    $productName = $row['product_name'];
                    $productPrice = $row['product_price'];
                    ?>
                    <div class="product1">
                        <img src="images/<?php echo $productName; ?>.png" alt="" width=200px height=200px>
                        <div>
                            <h3><?php echo $productName; ?></h3>
                        <p>Harga: Rp <?php echo $productPrice; ?></p>
                        
                        <?php if ($user !== "guest") { ?>
                            <form action="add_to_database.php" method="post">
                            <input type="hidden" name="user" value="<?php echo $user; ?>">
                            <input type="hidden" name="productName" value="<?php echo $productName; ?>">
                            <input type="hidden" name="productPrice" value="<?php echo $productPrice; ?>">
                            <input type="image" src="images/add_to_carts.png" alt="Submit" width=50px height=50px>
                        </form>
                        <?php } 
                                else {  ?>
                                    <form action="index.php" method="post">
                                    <input type="image" src="images/add_to_carts.png" alt="Submit" width=50px height=50px onclick="guestAlert()">     
                                    <?php  }?>  
                        </div>
                    </div>
                    <?php
                        }               
            }
                ?> 
            
    </div>
</body>
</html>
<script>
    function guestAlert() {
        alert("Youre logged in as a guest please create an account first");
    }
</script>