<?php
    session_start();
    if(isset($_SESSION['tipe_akun'])){
        if($_SESSION['tipe_akun'] != 'admin' && $_SESSION['tipe_akun'] != 'apoteker'){
            echo "<script>
                alert('Kamu Bukan Admin/Apoteker Woi');
                document.location.href = '../';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Farmanusa</title>
    <link rel="browser tab icon" href="./image/heart-health-48.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <?php
        include './admin-navbar.php';
    ?>
    <script type="text/javascript" src="../js/script.js"></script>
</body>
</html>