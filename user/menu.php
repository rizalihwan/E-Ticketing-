<?php
	session_start();
	include '../koneksi.php';
	error_reporting(0);
    error_log(0);
    if($_SESSION['status'] != 'login'){
        echo "<script>alert('Anda harus Login Terlebih Dahulu!!!');
        document.location.href='../usersLogin.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link href="../boots/table/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
	  <link href="../boots/table/css/sb-admin-2.min.css" rel="stylesheet">
	  
	<title>|TicketingApplication|</title>
	<style>
		html, body{
			margin: 0;
			padding: 0;
		}
		ul > li{
			list-style-type: none;
		}
		ul > li > a{
			float: left;
			margin-right: 5px;
			text-decoration: none;
			padding: 15px;
		}
		ul > li > a:hover{
			color: #fff;
			text-decoration: none;
		}
		.container{
			margin-top: 10px;
			width: 100%;
			height: 50px;
			background: salmon;
		}
	</style>
</head>
<form method="post">
<body>
	<div class="container">
    <ul>
        <li><a href="?menu=cara">Cara Pemesanan</a></li>
		<li><a href="?menu=book">Booking</a></li>
		<li><button style="margin-top: 6px; margin-left: 700px; position: fixed;" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['namanya']; ?></button><div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton"><a style="color: red;" class="dropdown-item" href="../logout2.php" onclick="return confirm('Apakah Anda Yakin?')">Logout</a></div></li>
	</ul>
	</div>
    <br><br>
    <?php
		switch (@$_GET['menu']) {
			case 'cara':
				include 'cara.php';
				break;
			case 'book':
				include 'booking.php';
				break;
			default:
				include 'cara.php';
				break;
		} ?>

		<!-- Js Desain -->
		<!-- Bootstrap core JavaScript-->
		<script src="../boots/table/vendor/jquery/jquery.min.js"></script>
  		<script src="../boots/table/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 		 <!-- Core plugin JavaScript-->
  		<script src="../boots/table/vendor/jquery-easing/jquery.easing.min.js"></script>

  		<!-- Custom scripts for all pages-->
  		<script src="../boots/table/js/sb-admin-2.min.js"></script>
</body>
</form>
</html>