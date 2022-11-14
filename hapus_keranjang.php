<?php
    require 'db-connect.php';
    $id_obat = $_GET['id_obat'];
    $id_order = $_GET['id_order'];

    mysqli_query($db, "DELETE FROM obat_diorder WHERE id_obat = '$id_obat' AND id_order = '$id_order'");

    header('Location: keranjang.php');
?>