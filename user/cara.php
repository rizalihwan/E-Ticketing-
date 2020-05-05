<?php
    session_start();
    include '../koneksi.php';
    if($_SESSION['status'] != 'login'){
        echo "<script>alert('Anda harus Login Terlebih Dahulu!!!');
        document.location.href='../usersLogin.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .position{
           margin-left: 120px;
        }
    </style>
</head>
<body>
    <div class="position">
    Anda bisa meng KLIK menu diatas yang bernamakan Booking lalu anda isi sesuai dengan keperluan anda:) Karena Kami menyiapkan paket booking bus yang <br> berkualitas dan terjamin 100%.<br> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus voluptatum inventore quaerat voluptatibus tenetur aliquid ipsum corrupti ipsa sunt <br> necessitatibus, sed commodi nihil eligendi harum quae consequuntur, nostrum labore unde? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod et, <br> ab quam ad reiciendis, ex nemo error autem repellat eligendi sunt vitae iure magni recusandae molestiae, voluptatum odio dolores cumque! Lorem, ipsum dolor <br> sit amet consectetur adipisicing elit. Veritatis ducimus quasi dolorem fugiat provident ad iure ea, temporibus ut, assumenda nobis quam sint eos officia eveniet. <br> Odit aspernatur repudiandae quos? Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel odio eum velit assumenda eligendi nemo, commodi culpa <br> excepturi optio minus molestiae id alias voluptas et sit a, eveniet facilis praesentium...
    <h5 align='center'>~TerimaKasih~</h5>
    </div>
</body>
</html>