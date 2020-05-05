<?php
session_start();
include '../koneksi.php';
error_reporting(0);
error_log(0);
if ($_SESSION['status'] != 'login') {
    echo "<script>alert('Anda harus Login Terlebih Dahulu!!!');
        document.location.href='../adminLogin.php'</script>";
}
if (isset($_GET['hapus'])) {
    $sql = mysqli_query($con, "DELETE FROM tb_users WHERE id_user = '$_GET[id_user]'");
    if ($sql) {
        echo "<script>alert('Data Berhasil Dihapus');
            document.location.href='menu.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus!')
            document.location.href='menu.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../boots/table/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../boots/table/css/sb-admin-2.min.css" rel="stylesheet">
    <title>DataPelanggan</title>
    <style>
        .searc{
            border: transparent;
            background: transparent;
            outline: none;
            border-bottom: 5px solid salmon;
            position: absolute;
            margin-top: -20px;
        }
    </style>
</head>
<form method="post">

    <body>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" style="padding-bottom: 25px;">Data Pelanggan</h6>
                <input type="text" class="searc" id="keyword" placeholder="search here..." autofocus autocomplete="off">
            </div>
            <div id="container">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="background-color: salmon; color: #ffffff;">
                            <tr>
                                <th>No.</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $sql = mysqli_query($con, "SELECT * FROM tb_users ORDER BY nama ASC");
                        while ($r = mysqli_fetch_array($sql)) {
                            $no++;
                        ?>
                            <tbody>
                                <td><?php echo $no . "." ?></td>
                                <td><?php echo $r['nama'] ?></td>
                                <td><?php echo $r['alamat'] ?></td>
                                <td><?php echo $r['no_telp'] ?></td>
                                <td><?php echo $r['username'] ?></td>
                                <td><?php echo $r['password'] ?></td>
                                <td><a class="btn btn-danger btn-circle" href="pelanggan.php?&hapus&id_user=<?php echo $r['id_user'] ?>" onclick="return confirm('Apakah Anda Yakin?')"><i class="fas fa-trash"></i></a></td>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        </div>
        <!-- Bootstrapp -->
        <script src="../boots/table/vendor/jquery/jquery.min.js"></script>
        <script src="../boots/table/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../boots/table/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../boots/table/js/sb-admin-2.min.js"></script>
        <script src="search.js"></script>
    </body>
</form>

</html>