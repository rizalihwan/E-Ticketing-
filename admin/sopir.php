<?php 
    session_start();
    include '../koneksi.php';
    error_log(0);
    error_reporting(0);
    if($_SESSION['status'] != 'login'){
        echo "<script>alert('Anda harus Login Terlebih Dahulu!!!');
        document.location.href='../adminLogin.php'</script>";
    }
        if(isset($_POST['simpan'])){
        $sql = mysqli_query($con, "INSERT INTO tb_sopir VALUES('$_POST[id_sopir]', '$_POST[nama_sopir]', '$_POST[umur]')");
        if($sql){
            echo "<script>alert('Data Berhasil Disimpan');
            document.location.href='?menu=sopir'</script>";
        }else{
            echo "<script>alert('Data Gagal Disimpan!');
            document.location.href='?menu=sopir'</script>";
        }
    }
        if(isset($_GET['hapus'])){
            $sql = mysqli_query($con, "DELETE FROM tb_sopir WHERE id_sopir = '$_GET[id_sopir]'");
            if($sql){
                echo "<script>alert('Data Dihapus');
                document.location.href='?menu=sopir'</script>";
            }else{
                echo "<script>alert('Data Gagal Dihapus!');
                document.location.href='?menu=sopir'</script>";
            }
        }
        if(isset($_GET['edit'])){
            $sql = mysqli_query($con, "SELECT * FROM tb_sopir WHERE id_sopir = '$_GET[id_sopir]'");
            $isi = mysqli_fetch_array($sql);
        }
        if(isset($_POST['update'])){
            $sql = mysqli_query($con, "UPDATE tb_sopir SET id_sopir = '$_GET[id_sopir]', nama_sopir = '$_POST[nama_sopir]', umur ='$_POST[umur]' WHERE id_sopir = '$_GET[id_sopir]'");
            if($sql){
                echo "<script>alert('Data Berhasil Diubah');
                document.location.href='?menu=sopir'</script>";
            }else{
                echo "<script>alert('Data Gagal Diubah!');
                document.location.href='?menu=sopir'</script>";
            }
        }

        //autokode Syntax
        $select_row = "SELECT COUNT(id_sopir) as jumlah FROM tb_sopir";
        $querys = mysqli_query($con, $select_row);
        $number = mysqli_fetch_assoc($querys);
        if ($number['jumlah'] > 0) {
            $sql    = "SELECT MAX(id_sopir) as kode FROM tb_sopir";
            $query  = mysqli_query($con, $sql);
            $number = mysqli_fetch_assoc($query);
            $strnum = substr($number['kode'], 2, 3);
            $strnum = $strnum + 1;
            if (strlen($strnum) == 3) {
                $kode = 'S' . $strnum;
            } else if (strlen($strnum) == 2) {
                $kode = 'S' . "0" . $strnum;
            } else if (strlen($strnum) == 1) {
                $kode = 'S' . "00" . $strnum;
            }
        } else {
            $kode = 'S' . "001";
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DataSopir</title>
    <style>
        .warning_attention{
            color: red;
            font-family: bold;
            font-size: 1.3em;
        }
    </style>
    <!-- Custom fonts for this template -->
    <link href="../boots/table/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../boots/table/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../boots/table/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<form method="post">
<body>
    <table style="color: black;">
    <?php if(isset($_GET['edit'])){ ?>
        <tr>
            <td>ID Sopir :</td>
            <td><input type="text" name="id_sopir" value="<?php echo $isi['id_sopir']; ?>" required readonly></td>
        </tr>
    <?php } else { ?>
        <tr>
            <td>ID Sopir :</td>
            <td><input type="text" name="id_sopir" value="<?php echo $kode; ?>" required readonly></td>
        </tr>
    <?php } ?>
        <tr>
            <td>Nama Sopir :</td>
            <td><input type="text" name="nama_sopir" value="<?php echo $isi['nama_sopir'] ?>" required></td>
        </tr>
        <tr>
            <td>Umur :</td>
            <td><input type="number" name="umur" value="<?php echo $isi['umur'] ?>" required></td>
        </tr>
    </table>
            <?php if(isset($_GET['edit'])){ ?>
                <button type="submit" class="btn btn-success btn-icon-split" name="update"><span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Update Data</span></button>
            <?php }else{ ?>
                <button type="submit" class="btn btn-success btn-icon-split" name="simpan"><span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Simpan Data</span></button>
            <?php } ?>
            <br><br>
       <!-- DataTales Example -->
       <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Sopir</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="background-color: salmon; color: #ffffff;">
            <tr>
                <th>No.</th>
                <th>ID Sopir</th>
                <th>Nama Sopir</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <?php 
                $sql = mysqli_query($con, "SELECT * FROM tb_sopir");
                $rows = mysqli_fetch_array($sql);
                if($rows == 0){
                    echo "<td class='warning_attention' colspan='5' align='center'>Data Kosong!</td>";
                } else {
                    foreach ($sql as $r) {
                    @$no++;
             ?>
        <tbody>
            <tr>
            <td><?php echo $no . '.'  ?></td>
            <td><?php echo $r['id_sopir'] ?></td>
            <td><?php echo $r['nama_sopir'] ?></td>
            <td><?php echo $r['umur'] . ' Tahun' ?></td>
            <td><a class="btn btn-danger btn-circle" href="?menu=sopir&hapus&id_sopir=<?php echo $r['id_sopir'] ?>" onclick="return confirm('Apakah Anda Yakin?')"><i class="fas fa-trash"></i></a>
            <a style="margin-left: 10px;" href="?menu=sopir&edit&id_sopir=<?php echo $r['id_sopir'] ?>" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">Edit Data</span>
                  </a></td>
                  </tr>
        </tbody>
            <?php } } ?>
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
 
</body>
</form>
</html>