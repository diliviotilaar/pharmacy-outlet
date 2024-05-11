<?php 
$user = $_POST['user'];
$pswd = $_POST['pswd'];
echo $user;
echo $pswd;

   include 'connect.php';
   
   if($user == ""){
      header("location: register.php?pesan=kosong", true, 301);
      exit();
  }

  else if($pswd == ""){
     header("location: register.php?pesan=kosong");
  }

   $conn = mysqli_connect($host, $username,$password, $dbname);
   if (mysqli_connect_errno()) {
      echo "Koneksi ke server gagal dilakukan.";
      exit();
   }
      $query = "SELECT username FROM login WHERE username = '$user'";
      mysqli_query($conn, $query);

      $num = mysqli_affected_rows($conn);

   if($num == 0) {
      if (mysqli_connect_errno()) {
         echo "Koneksi ke server gagal dilakukan.";
         exit();
         }

         $query1 = "INSERT INTO login (username, password) VALUES ('$user','$pswd');";
         mysqli_query($conn, $query1);
         
         $num1 = mysqli_affected_rows($conn);
         
         if ($num1 > 0) {
            header("location: index.php?", true, 301);
            exit();
         }
         else {
            header("location: index.php?pesan=input", true, 301);
            exit();
         }
   } 
   else if($num > 0) {
      header("location: register.php?pesan=isi", true, 301);
       exit();
   }
?>