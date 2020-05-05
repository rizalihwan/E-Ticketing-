<?php
//seting database
    $host = 'localhost';
    $user = 'root';
    $pass = "";
    $db_name = 'db_ticket';

//konek database
    $con = mysqli_connect($host, $user, $pass, $db_name) or die('Database Not Found!');
?>