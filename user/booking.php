<?php
    session_start();
    include '../koneksi.php';
    error_log(0);
    error_reporting(0);
    if($_SESSION['status'] != 'login'){
        echo "<script>alert('Anda harus Login Terlebih Dahulu!!!');
        document.location.href='../usersLogin.php'</script>";
    }
    if(isset($_POST['simpan'])){
        $kembali = $_POST['kembali'];
        $sql = mysqli_query($con, "INSERT INTO tb_boking VALUES('', '$_POST[nama_pelanggan]', '$_POST[kota_asal]', '$_POST[kota_tujuan]', '$_POST[penumpang]','$_POST[harga_tiket]')");
        if($sql){
            echo "<script>alert('Data Anda Telah Dikirim Mohon Tunggu Balasan Admin Via WA/SMS');
            document.location.href='menu.php'</script>";
        }else{
            echo "<script>alert('Data Anda Gagal Dikirim!');
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
    <title>Data Booking</title>
    <style>
        .position{
           margin-left: 120px;
        }
    </style>
</head>
<form method="post">
<body>
    <div class="position">
<table>
        <tr>
            <td>Nama Pelanggan :</td>
            <td>
                <input type="text" name="nama_pelanggan" value = "<?php echo $_SESSION['namanya']; ?>" readonly>
            </td>
        </tr>
        <tr>
            <td>Kota Asal :</td>
            <td>
                <select name="kota_asal" id="asal" onclick="Pemberangkatan()" required>
                   <option disabled selected>Pilih Kota</option>
                   <option>Jakarta</option>
                   <option>Bogor</option>
                   <option>Depok</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Kota Tujuan :</td>
            <td>
                <select name="kota_tujuan" id="tujuan" onclick="Pemberangkatan()" required>
                   <option disabled selected value="">Pilih Tujuan</option>
                   <option>Jakarta</option>
                   <option>Bogor</option>
                   <option>Depok</option>
                </select>
            </td>   
        </tr>
        <script>
            function recalculateSum(){
                let harga = parseInt(document.getElementById('harga').value);
                let penumpang = parseInt(document.getElementById('penumpang').value);
                let total = document.getElementById('tot').value =   harga * penumpang;
                let mayar = parseInt(document.getElementById('bayar').value);
                let status = document.getElementById('status').value = mayar - total;
            }
        </script>
        <script>
            function Pemberangkatan(){
                let asal = document.getElementById('asal').value;
                let simpan = document.getElementById('simpan');
                let tujuan = document.getElementById('tujuan').value;
                let hargaPertama;
                let Jurusan = ['Jakarta', 'Bogor', 'Depok'];
                let Jurusan2 = ['Jakarta', 'Bogor', 'Depok'];
                let status = document.getElementById('status');
                if(asal == tujuan){
                    hargaPertama = 0;

                    //jakarta jurusan
                }else if(asal == Jurusan[0] && tujuan == Jurusan2[1] || asal == Jurusan[1] && tujuan == Jurusan2[0]){
                    hargaPertama = 20000;
                }else if(asal == Jurusan[0] && tujuan == Jurusan2[2] || asal == Jurusan[2] && tujuan == Jurusan2[0]){
                    hargaPertama = 35000;

                    //bogor jurusan
                }else if(asal == Jurusan[1] && tujuan == Jurusan2[0] || asal == Jurusan[0] && tujuan == Jurusan2[1]){
                    hargaPertama = 100;
                }else if(asal == Jurusan[1] && tujuan == Jurusan2[2] || asal == Jurusan[2] && tujuan == Jurusan2[1]){
                    hargaPertama = 200;
                }else{
                    hargaPertama = "Pilih Dahulu";
                }
                document.getElementById('harga').value = hargaPertama;
            }
        </script>
         <tr>
            <td>Harga :</td>
            <td><input type="number" id="harga" readonly></td>
        </tr>
        <tr>
            <td>Jumlah Penumpang :</td>
            <td><input type="number" name="penumpang" id="penumpang"  onkeyup="recalculateSum();" required></td>
        </tr>
        <tr>
            <td>Total Tagihan :</td>
            <td><input type="number" name="harga_tiket" id="tot" onkeyup="" readonly></td>
        </tr>
        <tr>
            <td>Bayar :</td>
            <td><input type="number" id="bayar" onkeyup="recalculateSum();"></td>
        </tr>
        <tr>
            <td>Kembali :</td>
            <td><input type="text" id="status" name="kembalian" readonly></td>
        </tr>
        <tr>
            <td><input type="submit" value="SIMPAN" id="simpan" name="simpan"></td>
        </tr>   
    </table>
    </div>
</body>
</form>
</html>