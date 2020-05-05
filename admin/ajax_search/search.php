<?php
include 'controller_search.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM tb_users WHERE nama LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR no_telp LIKE '%$keyword%' OR username LIKE '%$keyword%' OR password LIKE '%$keyword%'";
$users = query($query);
?>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="background-color: salmon; color: #ffffff;">
                <tr>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
                foreach($users as $r):
            ?>
            <tbody>
                    <td><?php echo $r['nama'] ?></td>
                    <td><?php echo $r['alamat'] ?></td>
                    <td><?php echo $r['no_telp'] ?></td>
                    <td><?php echo $r['username'] ?></td>
                    <td><?php echo $r['password'] ?></td>
                    <td><a class="btn btn-danger btn-circle" href="pelanggan.php?&hapus&id_user=<?php echo $r['id_user'] ?>" onclick="return confirm('Apakah Anda Yakin?')"><i class="fas fa-trash"></i></a></td>
            </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</div>