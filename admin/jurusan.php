<?php
    session_start();
    include '../koneksi.php';
    if($_SESSION['status'] != 'login'){
        echo "<script>alert('Anda harus Login Terlebih Dahulu!!!');
        document.location.href='../adminLogin.php'</script>";
    }
    if(isset($_POST['simpan'])){
        $sql = mysqli_query($con, "INSERT INTO tb_jurusan VALUES('','$_POST[id_user]', '$_POST[tgl]', '$_POST[id_kendaraan]', '$_POST[id_sopir]')");
        if($sql){
            echo "<script>alert('Data Berhasil Disimpan');
            document.location.href='?menu=juru'</script>";
        }else{
            echo "<script>alert('Data Gagal Disimpan!');
            document.location.href='?menu=juru'</script>";
        }
    }
    if(isset($_GET['hapus'])){
        $sql = mysqli_query($con, "DELETE FROM tb_jurusan WHERE id = '$_GET[id]'");
        if($sql){
            echo "<script>alert('Data Dihapus');
            document.location.href='?menu=juru'</script>";
        }else{
            echo "<script>alert('Data Gagal Dihapus!');
            document.location.href='?menu=juru'</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DataJurusan</title>
    <!-- Custom fonts for this template -->
    <link href="../boots/table/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../boots/table/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../boots/table/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        td{
            color: black;
        }
    </style>
</head>
<form method="post">
<body>
    <table>
        <tr>
            <td>Pilih Pelanggan :</td>
            <td>
            <select name="id_user" required>
                <option value="" disabled selected>Nama Pelanggan</option>
				<?php 
					$sql = mysqli_query ($con, "SELECT * FROM tb_users");
					while ($a = mysqli_fetch_array($sql)) {
				?>	
					<option value="<?php echo $a['nama']; ?>"><?php echo $a['nama']?></option>
				<?php  } ?>		
                </select>
            </td>
        </tr>   
        <tr>
            <td>Tanggal Berangkat :</td>
            <td><input type="date" name="tgl"></td>
        </tr>  
        <tr>
            <td>Pilih Kendaraan :</td>
            <td>
            <select  name="id_kendaraan" required>
                <option value="" disabled selected>ID Kendaraan</option>
				<?php 
					$sql = mysqli_query ($con, "SELECT * FROM tb_kendaraan");
					while ($a = mysqli_fetch_array($sql)) {
				?>	
					<option value="<?php echo $a['nama_kendaraan']; ?>"><?php echo $a['id_kendaraan']?></option>
				<?php  } ?>		
                </select>
            </td>
        </tr>
        <tr>
            <td>Pilih Sopir :</td>
            <td>
            <select  name="id_sopir" required>
                <option value="" disabled selected>ID Sopir</option>
				<?php 
					$sql = mysqli_query ($con, "SELECT * FROM tb_sopir");
					while ($a = mysqli_fetch_array($sql)) {
				?>	
					<option value="<?php echo $a['nama_sopir']; ?>"><?php echo $a['id_sopir']?></option>
				<?php  } ?>		
                </select>
                </td>
        </tr>
    </table>
            <button type="submit" class="btn btn-success btn-icon-split" name="simpan"><span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Simpan Data</span></button>
                    <br><br>
       <!-- DataTales Example -->
       <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Jadwal Pemberangkatan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="background-color: salmon; color: #ffffff;">
            <tr>
                <th>No.</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Berangkat</th>
                <th>Nama Kendaraan</th>
                <th>Nama Sopir</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <?php 
            $sql = mysqli_query($con, "SELECT * FROM tb_jurusan");
            while($r = mysqli_fetch_array($sql)){
            $no++;
        ?>
        <tbody>
            <tr>
            <td><?php echo $no . '.' ?></td>
            <td><?php echo $r['id_pelanggan'] ?></td>
            <td><?php echo $r['tanggal_berangkat'] ?></td>
            <td><?php echo $r['id_kendaraan'] ?></td>
            <td><?php echo $r['id_sopir'] ?></td>
            <td><a class="btn btn-danger btn-circle" href="?menu=juru&hapus&id=<?php echo $r['id'] ?>" onclick="return confirm('Apakah Anda Yakin?')"><i class="fas fa-trash"></i></a></td></tr>
            </tr>
        </tbody>
            <?php } ?>
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