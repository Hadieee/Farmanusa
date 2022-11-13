<?php
    require('../../db-connect.php');
    $id = $_GET['id'];
    $db->query("DELETE FROM obat WHERE id_obat = $id");
    header('Location: ../obat.php');
?>