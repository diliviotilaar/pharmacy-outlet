<?php 

$user = $_POST['user'];
$pswd = $_POST['pswd'];
echo $user;
echo $pswd;
 
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
	$query = "select * from login where username='$user' and password='$pswd'";
	mysqli_query($conn, $query);
	
   $num = mysqli_affected_rows($conn);
	
	if ($num > 0 and $user == "admin") {
	   header("location: admin.php?", true, 301);
	   exit();
   }
   else if ($num > 0 ){
      $redirectURL = "customer.php?user=" . urlencode($user) . "&kategori=" . urlencode('Semua');
	   header("location: " . $redirectURL, true, 301);
      exit();   
    }
   else {
      header("location: index.php?pesan=input", true, 301);
      exit();
   }

?>