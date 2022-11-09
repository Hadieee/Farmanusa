<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $nama_db = 'farmanusa';
    
    $db = mysqli_connect($server, $user, $password, $nama_db);

    if (!$db) {
        die("Gagal Terhubung ke : " .mysqli_connect_error());
    }
?>