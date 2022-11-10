<?php
    require('../../db-connect.php');
    $email = $_GET['email'];
    $username = $_GET['username'];
    $db->query("DELETE FROM user WHERE email = $id OR username = $username");
    header('Location: ../apoteker.php');
?>