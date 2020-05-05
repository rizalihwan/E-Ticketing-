<?php
  session_start();
    include '../koneksi.php';
    if($_SESSION['status'] != 'login'){
      echo "<script>alert('Anda harus Login Terlebih Dahulu!!!');
      document.location.href='../adminLogin.php'</script>";
  }
    $sql = mysqli_query($con, "SELECT count(nama_pelanggan) as nama_pelanggan FROM tb_boking");
    $data = mysqli_fetch_array($sql);
    $rom = $data['nama_pelanggan'];

    $sql2 = mysqli_query($con, "SELECT count(nama_sopir) as nama_sopir FROM tb_sopir");
    $data2 = mysqli_fetch_array($sql2);
    $rom2 = $data2['nama_sopir'];

    $sql3 = mysqli_query($con, "SELECT count(nama_kendaraan) as nama_kendaraan FROM tb_kendaraan");
    $data3 = mysqli_fetch_array($sql3);
    $rom3 = $data3['nama_kendaraan'];

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../boots/index.css">
    <link href="../boots/table/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../boots/table/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
      .satu{
        color: blue;
      }
      .dua{
        color: green;
      }
      .tiga{
        color: red;
      }
    </style>
    <title>DashBoard</title>
</head>
<body>
<div class="row" style="margin-left: 220px;">
    
     <!-- Data 1 -->
     <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rom ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Sopir</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rom2 ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Kendaraan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rom3 ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <h1><div class="satu">Hallo Admin, Anda Tau Mabar? mabar adalah mabar ff dan mabar nya molegeben.</div> <div class="dua"> Dan ketika anda mabar anda akan merasakan sensasi kemabaran yang sangat memabarkan dan kamu jangan pernah kapok mabar bersama dengan 4 bocah team dan mabar merupakan mabar dengan penuh kemabaran.</div> <div class="tiga">apalagi anda mencoba game epic yang begitu trend di 2020 ini yakni freyfayer yang telah dirancang untuk orang - orang yang suka mabar.</div></h1>
    </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>