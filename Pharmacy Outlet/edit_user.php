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
<div class="header">
        <div class="logo">
            <img src="images/logo_apotek.png" alt="logo" width=150px height= 150px>
        </div>
        <div class="pharmacy">
            <h1>CVJ</h1>
            <h3>PHARMACY</h3>
        </div>
        <div class="cart">
            <a href="index.php">
                <img src="images/log_out.png" alt="" width=110px height= 110px id= "logo" style="margin: 20px;">
            </a>
        <form action="admin.php" method="get">
            <input type="image" src="images/return_logo.png " alt="Submit" width=110px height= 110px id="cartl" style="margin: 20px;">
        </form>
        </div>
    </div>
    <?php
        $user = $_GET["user"];

        include 'connect.php';
        $conn = mysqli_connect($host, $username,$password, $dbname);
        if (mysqli_connect_errno()) {
            echo "Koneksi ke server gagal dilakukan.";
            exit();
        }

        $query = "SELECT * FROM login where username = '$user'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_object($result)
    ?>
    <form action="update_user.php" method = "get">
		<strong> USERNAME </strong><br/> 
			<input name="user" type="text" value="<?php echo $user -> username;?>"> <br/><br/>
		<strong> PASSWORD </strong><br/>
			<input name="pswd" type="text" size="30" value="<?php echo $user -> password;?>"> <br/><br/>
            <input type="hidden" name="prev_user" value="<?php echo $user -> username; ?>">
		<input type="submit" name="btnSubmit" value ="Save">
	</form>
</body>
</html>