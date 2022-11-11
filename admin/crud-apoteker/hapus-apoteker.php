<?php
    require '../../db-connect.php';
    $id = $_GET['id'];
    $db->query("DELETE FROM user WHERE email = $id");
    header('Location: ../apoteker.php');
?>