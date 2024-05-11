<?php
if (isset($_GET["btnSubmit"])) {
	$user = $_GET["username"];
	$pswd = $_GET["password"];

include 'connect.php';

$conn = mysqli_connect($host, $username,$password, $dbname);
if (mysqli_connect_errno()) {
    echo "Koneksi ke server gagal dilakukan.";
    exit();
}

$query = "INSERT INTO login values('$user','$pswd')";

mysqli_query($conn, $query);
$num = mysqli_affected_rows($conn);

if ($num > 0) {
   echo "Data yang kamu buat sudah disimpan."; 
?>
   <meta content="0; url=admin.php" http-equiv="refresh">
<?php
} else {
   echo "Data gagal disimpan ke dalam database.";
}
}
?>   