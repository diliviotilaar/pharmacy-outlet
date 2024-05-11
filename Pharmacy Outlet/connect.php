<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'e_commerce';
//menghubungkan database ke mysql
$con = mysqli_connect($host, $username, $password, $dbname);
if (!$con) {
    die ("connection failed.". mysqli_connect_error()); 
}
 ?>