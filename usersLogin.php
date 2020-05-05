<?php
	session_start();
	include 'koneksi.php';
	if (isset($_POST['login'])) { 
  		$pass = ($_POST['password']); 
		$sql = mysqli_query($con, "SELECT * FROM tb_users WHERE username = '$_POST[username]' && password = '$pass'"); 
		$cek = mysqli_num_rows($sql); 
		$f = mysqli_fetch_array($sql); 

        if($cek > 0){ 
			$_SESSION['namanya'] = $f['nama'];	
			$_SESSION['status']='login';
			echo "<script>alert('Selamat Datang ".$_SESSION['namanya']."'); document.location.href='user/menu.php';</script>"; 
        } else {
			echo "<script>alert('Gagal Login'); document.location.href='usersLogin.php';</script>"; 
		}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UserLogin</title>
    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="boots/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="boots/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="boots/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="boots/login/css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/index.css">
	<link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
</head>
<form method="post">
<body>
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
		<img src="boots/img/logo.png" style="margin-left: 90px; height: 100px; margin-top: -20px;">
			<form class="login100-form validate-form">
				<span class="login100-form-title p-b-37">
				<label style="font-family: 'Courgette', cursive; margin-bottom: -20px; font-size: 33px;">
					Selamat Datang
				</label>
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="username" placeholder="username or email" autocomplete="off" autofocus required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="password" placeholder="password" >
					<span class="focus-input100" required></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" name="login">
						Sign In
					</button>
                </div>
                <div class="text-center">
					<a href="register.php" class="txt2 hov1">
						Register Akun?
					</a>
				</div>
			</form>
</body>
</form>
</html>