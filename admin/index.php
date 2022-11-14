<?php
    session_start();
    if(isset($_SESSION['tipe_akun']) or !isset($_SESSION['tipe_akun'])){
        if($_SESSION['tipe_akun'] != 'admin' && $_SESSION['tipe_akun'] != 'apoteker'){
            echo "<script>
                alert('Kamu Bukan Admin/Apoteker Woi');
                document.location.href = '../index.php';
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
        include 'admin-navbar.php';
    ?>
    <section class="obat" id="obat">
    <h1 class="heading"> Selamat Datang, <?php echo $_SESSION['user'] ?></h1>
    </section>
    <section class='badan' style="margin: 0; display:contents;">
        <div class="home" id="home" style="justify-content: space-evenly;">
            <div class="image" style="display: flex; flex:none; height:230px;">
                <div class="dark" style="display: none;">
                    <object type="image/svg+xml" data="../image/about-img.svg">
                        <img src="../image/about-img.svg" />
                    </object>
                </div>
                <div class="light">
                    <object type="image/svg+xml" data="../image/book-img.svg">
                        <img src="../image/book-img.svg" />
                    </object>
                </div>
            </div>
            <div class="content" style="padding:40px; flex:none; width:500px;">
                <h3>Kelola Data Obat</h3>
                <a href="obat.php" class="btn"> Click Here <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>
        <div class="home" id="home" style="justify-content: space-evenly;">
            <div class="image" style="display: flex; flex:none; height:230px;">
                <div class="dark1" style="display: none;">
                    <object type="image/svg+xml" data="../image/about-img.svg">
                        <img src="../image/about-img.svg" />
                    </object>
                </div>
                <div class="light1">
                    <object type="image/svg+xml" data="../image/book-img.svg">
                        <img src="../image/book-img.svg" />
                    </object>
                </div>
            </div>
            <div class="content" style="padding:40px; flex:none; width:500px;">
                <h3>Kelola Data Apoteker</h3>
                <a href="apoteker.php" class="btn"> Click Here <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="../js/script.js"></script>
</body>
</html>