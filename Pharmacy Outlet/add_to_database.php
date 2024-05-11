<?php 
$user = $_POST['user'];
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
 
   if($user == ""){
       header("location: index.php?pesan=kosong", true, 301);
       exit();
   }
   
   include 'connect.php';


$conn = mysqli_connect($host, $username,$password, $dbname);
if (mysqli_connect_errno()) {
   echo "Koneksi ke server gagal dilakukan.";
   exit();
}
	$query = $conn->prepare("INSERT INTO cart (username, product_name, product_price) VALUES (?, ?, ?)");
    $query->bind_param("sss", $user, $productName, $productPrice);
	$query->execute();
	
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
    <h1>Product has been added to cart</h1>
    <form action="customer.php" method="get">
        <input type="hidden" name="user" value="<?php echo $user; ?>">
        <input type="hidden" name="kategori" value="Semua">
        <input type="submit" name="back" value="Take me back">
    </form>
</body>
</html>