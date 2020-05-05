<?php
    session_start();
    include '../koneksi.php';
    error_reporting(0);
    error_log(0);
    if($_SESSION['status'] != 'login'){
        echo "<script>alert('Anda harus Login Terlebih Dahulu!!!');
        document.location.href='../adminLogin.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../boots/side/css/style.css">
    <link rel="stylesheet" href="../boots/style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../boots/img/logo2.png">
    <title>Admin | Dashboard</title>
    
</head>
<form method="post"> 
<body style="background: linear-gradient('blue','green'); color: white;">

<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="?menu=dash" class="logo">Ticketing</a></h1>
                  <ul class="list-unstyled components mb-5">
        <li class="active"><a href="?menu=pela"><span class="fa fa-home mr-3"></span>Data Customer</a></li>
        <li class="active"><a href="?menu=sopir"><span class="fa fa-user mr-3"></span> Data Sopir</a></li>
        <li class="active"><a href="?menu=kenda"><span class="fa fa-briefcase mr-3"></span>Data Kendaraan</a></li>
        <li class="active"><a href="?menu=juru"><span class="fa fa-sticky-note mr-3"></span> Data Jadwal</a></li>
        <li class="active"><a href="?menu=repo"><span class="fa fa-user mr-3"></span> Laporan</a></li>
        <li class="active">
            <a href="../logout.php"  onclick="return confirm('Apakah Anda Yakin?')"><span class="fa fa-paper-plane mr-3"></span> Logout</a></li>
    </ul>
	        <div class="footer">
                <pre><div id="jam" style="color: white; font-size: 30px;"></div></pre>
            <script type="text/javascript">
            // 1 detik = 1000
            window.setTimeout("waktu()",1000);  
            function waktu() {   
            var tanggal = new Date();  
            setTimeout("waktu()",1000);  
            document.getElementById("jam").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
            }
            </script>
             <script language="JavaScript">
            var tanggallengkap = new String();
            var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
            namahari = namahari.split(" ");
            var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
            namabulan = namabulan.split(" ");
            var tgl = new Date();
            var hari = tgl.getDay();
            var tanggal = tgl.getDate();
            var bulan = tgl.getMonth();
            var tahun = tgl.getFullYear();
            tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;
             </script>
             <script language='JavaScript'>document.write(tanggallengkap);</script>
	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      <h1 style="font-family: 'Pacifico', cursive; color: #000000; margin-left: 500px;"></a></h1>
      <?php
		switch (@$_GET['menu']) {
            case 'dash':
                include 'dashboard.php';
                break;
			case 'juru':
				include 'jurusan.php';
				break;
			case 'kenda':
				include 'kendaraan.php';
				break;
			case 'pela':
				include 'pelanggan.php';
				break;
            case 'sopir':
                include 'sopir.php';
                break;
            case 'repo':
                include 'report.php';
                break;
            default:
                include 'pelanggan.php';
				break;
		} ?>
      </div>
		</div>
		  	
   
</div>
    
</body>
</form>
<script src="../boots/side/js/jquery.min.js"></script>
<script src="../boots/side/js/popper.js"></script>
<script src="../boots/side/js/bootstrap.min.js"></script>
<script src="../boots/side/js/main.js"></script>
</html>