<?php
    require('db-connect.php');

    session_start();

    $username = $_SESSION['user'];
    $query = mysqli_query($db, "SELECT * FROM orderan WHERE username = '$username' and status = 'Sedang Diorder'");
    while($row = mysqli_fetch_assoc($query)){
        $checkID[] = $row;
    }

    $id = $checkID[0]['id_order'];
    $id_obat = $_GET['id'];
    $db->query("INSERT INTO obat_diorder VALUES($id_obat, $id, 1, 0)");
    header('Location: obat.php');
?>