<?php
error_log(0);
error_reporting(0);
include 'koneksi.php';
    if(isset($_POST['daftar'])){
        $sql = mysqli_query($con, "INSERT INTO tb_users VALUES('', '$_POST[nama]', '$_POST[alamat]', '$_POST[no_telp]' , '$_POST[user]', '$_POST[pass]')");
        if($sql){
            echo "<script>alert('Selamat Akun Anda Telah Terdaftar');
            document.location.href='usersLogin.php'</script>";
        }else{
            echo "<script>alert('Akun Tidak Daftar Didaftarkan!');
            document.location.href='register.php'</script>";
        }
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Akun</title>
    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="boots/regis/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/regis/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/regis/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/regis/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/regis/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/regis/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="boots/regis/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/regis/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/regis/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="boots/regis/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="boots/regis/css/util.css">
	<link rel="stylesheet" type="text/css" href="boots/regis/css/main.css">
	<link rel="stylesheet" type="text/css" href="boots/index.css">
<!--===============================================================================================-->
</head>
<form method="post">
<body>
<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>

			

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
			<div class="container-login100-form-btn">
							<a href="usersLogin.php" class="boton1">  
								<img src="boots/img/home.png" alt="rumahku">
							</a>
						</div>
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-59">
						Sign Up
					</span>
					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Nama Anda :</span>
						<input class="input100" type="text" name="nama" placeholder="Enter name ..." required>
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Alamat</span>
						<input class="input100" type="text" name="alamat" placeholder="Enter location ..." required>
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">No Telepon</span>
						<input class="input100" type="number" name="no_telp" placeholder="Enter number ..." required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="user" placeholder="Enter username ..." required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password ..." required>
						<span class="focus-input100"></span>
					</div>
        <tr>
            </td><br><br><br>
            <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="daftar">
								Sign Up
							</button>
						</div>
        		</div>
  			</div>
    </table>
</body>
</form>
</html>