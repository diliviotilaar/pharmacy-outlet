<?php 
        $product_name = $_POST['product'];

        include 'connect.php';
        $conn = mysqli_connect($host, $username,$password, $dbname);
        if (mysqli_connect_errno()) {
            echo "Koneksi ke server gagal dilakukan.";
            exit();
        }

        $query = "SELECT status FROM history WHERE product_name = '$product_name' GROUP BY product_name, date";
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_object($result);
        $status = $product->status;

        if ($status == 'diproses') {
            $query1 = "UPDATE history SET status = 'dikirim' WHERE product_name = '$product_name'";
            mysqli_query($conn, $query1);
            header("location:admin.php", true, 301);
        }

        else if ($status == 'dikirim') {
            $query2 = "UPDATE history SET status = 'selesai' WHERE product_name = '$product_name'";
            mysqli_query($conn, $query2);
            header("location:admin.php", true, 301);
        }

        else {
            header("location:admin.php", true, 301);
        }
    ?>
    