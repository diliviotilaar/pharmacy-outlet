<?php
if (isset($_GET["btnSubmit"])) {
    $id = $_GET["id"];
	$product_name = $_GET["product_name"];
	$product_price = $_GET["product_price"];

include 'connect.php';

$conn = mysqli_connect($host, $username,$password, $dbname);
if (mysqli_connect_errno()) {
    echo "Koneksi ke server gagal dilakukan.";
    exit();
}

$query = "update product set product_name='$product_name', product_price='$product_price' where id ='$id'";

mysqli_query($conn, $query);
$num = mysqli_affected_rows($conn);

if ($num > 0) {
   echo "Data yang kamu ubah sudah disimpan."; 
?>
   <meta content="0; url=admin.php" http-equiv="refresh">
<?php
} else {
   echo "Data gagal disimpan ke dalam database.";
}
}
?>   