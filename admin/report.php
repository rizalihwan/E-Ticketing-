<?php
    session_start();
    include '../koneksi.php';
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
    <title>Document</title>
    <!-- Custom fonts for this template -->
    <link href="../boots/table/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../boots/table/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../boots/table/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body>
    <form method="post">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="background-color: salmon; color: #ffffff;">
            <tr>
                <th>No</th>
                <th>ID Boking</th>
                <th>Nama Pelanggan</th>
                <th>Kota Asal</th>
                <th>Kota Tujuan</th>
                <th>Masukan Transaksi</th>
            </tr>
            </thead>
            <?php 
                $sql = mysqli_query($con, "SELECT * FROM tb_boking");
               while($r = mysqli_fetch_array($sql)){
                $no++;
        ?>
        <tbody>
          <tr>
            <td><?php echo $no . '.' ?></td>
            <td><?php echo $r['id_boking'] ?></td>
            <td><?php echo $r['nama_pelanggan'] ?></td>
            <td><?php echo $r['kota_asal'] ?></td>
            <td><?php echo $r['kota_tujuan'] ?></td>
            <td><?php echo $r['harga_tiket'] ?></td>
            </tr>
            </tbody>
            <?php } ?>
            <!-- Syntax Jumlah Total Harga Dari Laporan -->
            <?php
              $ssq = mysqli_query($con, "SELECT SUM(harga_tiket) AS total FROM tb_boking");
              $jml = mysqli_fetch_array($ssq);
            ?>
            <tr>
                <td colspan="6"><label style="margin-left: 910px;">Subtotal : <?php echo " ". $jml['total']; ?></label></td>
            </tr>
               </tbody>
               </table>
    </div>
    </div>
</div>
     <!-- Bootstrap core JavaScript-->
    <script src="../boots/table/vendor/jquery/jquery.min.js"></script>
    <script src="../boots/table/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../boots/table/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../boots/table/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../boots/table/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../boots/table/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../boots/table/js/demo/datatables-demo.js"></script>
 
    </form>
</body>
</html>