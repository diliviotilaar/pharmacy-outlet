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
	<div class="container">
		<div class="header">
        <div class="logo">
            <img src="images/logo_apotek.png" alt="logo" width=150px height= 150px>
        </div>
        <div class="pharmacy">
            <h1>CVJ</h1>
            <h3>PHARMACY</h3>
        </div>
    </div>

	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "kosong"){
			echo "<h4 style='color:red'>Maaf, User atau password masih kosong!</h4>";
		}else if($_GET['pesan'] == "input") {
			echo "<h4 style='color:red'>Maaf, User atau password salah!</h4>";
		}else if($_GET['pesan'] == "salah") {
			echo "<h4 style='color:red'>Maaf, Captcha tidak sesuai!</h4>";	
		} 
	}
	?>

	<div class="login_table">
		<form action="login.php" method="post">		
			<table id='t01'>
				<tr>
					<td>Username</td>
					<td><input type="text" name="user"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="pswd"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="login" value="Log In"></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="other-button">
		<form action="customer.php" method="get">
			<input type="hidden" name="user" value="guest">
			<input type="hidden" name="kategori" value="Semua">
			<input type="submit" name="login" value="Log In as Guest">
		</form>
		<form action="register.php" method="get">
			<input type="submit" name="register" value="Sign up">
		</form>
	</div>
	</div>		
</body>
</html>