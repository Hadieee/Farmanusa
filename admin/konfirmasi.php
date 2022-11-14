<?php
    require '../db-connect.php';
    session_start();
    $id = $_GET['id'];
    mysqli_query($db, "UPDATE orderan SET status = 'Sudah Dibayar' WHERE id_order = '$id'");
    mysqli_query($db, "DELETE FROM obat_diorder WHERE id_order = '$id'");
    header('Location: order.php');
?>