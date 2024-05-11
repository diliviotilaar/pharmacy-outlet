<?php
$user = $_GET["user"];
$id = $_GET["id"];

include 'connect.php';

$conn = mysqli_connect($host, $username,$password, $dbname);
if (mysqli_connect_errno()) {
   echo "Koneksi ke server gagal dilakukan.";
   exit();
}

$query = "delete from cart where id='$id'";
mysqli_query($conn, $query);
	
$num = mysqli_affected_rows($conn);

if ($num > 0) {
    mysqli_close($conn);
    header("location: cart.php?user=".urlencode($user), true, 301);
    exit();
} else {
   echo "Penghapusan data gagal dilakukan.";
}

?>   