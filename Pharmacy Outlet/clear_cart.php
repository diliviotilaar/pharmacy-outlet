<?php
$user = $_POST["user"];

include 'connect.php';

$conn = mysqli_connect($host, $username,$password, $dbname);
if (mysqli_connect_errno()) {
   echo "Koneksi ke server gagal dilakukan.";
   exit();
}

$query = "delete from cart where username ='$user'";
mysqli_query($conn, $query);

$num = mysqli_affected_rows($conn);

if ($num > 0) {
   mysqli_close($conn);
   $redirectURL = "customer.php?user=" . urlencode($user) . "&kategori=" . urlencode('Semua');
	header("location: " . $redirectURL, true, 301);
   exit();
} else {
   echo "Penghapusan data gagal dilakukan.";
}

?>   