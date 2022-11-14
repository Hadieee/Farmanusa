<?php
    session_start();
    require('db-connect.php');

    if(!isset($_SESSION['user'])){
        echo"<script>alert('Login Dulu Ya Dek');document.location.href = 'index.php';</script>";
    }else{
        $username = $_SESSION['user'];
        $check = mysqli_query($db, "SELECT * FROM orderan WHERE username = '$username' and status = 'Sudah Dibayar'");

        if(!isset($_POST['Cari'])){
            $cari = $_POST['Search'];
            $check = mysqli_query($db, "SELECT * FROM orderan WHERE username = '$username' and status = 'Sudah Dibayar' and id_order LIKE '%$cari%'");
        }

        if(mysqli_num_rows($check) > 0){
            while($row = mysqli_fetch_assoc($check)){
                $riwayat[] = $row;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obat</title>
    <link rel="browser tab icon" href="./image/heart-health-48.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <?php
        include 'navbar.php';
    ?>

    <!-- obat section starts  -->

    <section class="obat" id="obat">

        <h1 class="heading"> Riwayat Pesanan </h1>
        <?php 
            if(isset($obat) or isset($_POST['Cari'])){
        ?>
            <form id="searchObat" action="" method="POST">
                <input type="text" value="" name="Search" placeholder="Cari Data Riwayat"  autocomplete="on">
                <button class="btn" type="submit" name="Cari"><i class="fas fa-search"></i></button>
            </form>
        <?php
            }
        ?>
    <div class="box-container">
        <div id=tabel>
            <div class="products-area-wrapper tableView">
                <div class="products-header">
                    <div class="sel id">ID Order</div>
                    <div class="sel tanggal">Tanggal</div>
                    <div class="sel harga">Total Harga</div>
                    <div class="sel status">Status</div>
                </div>
                <?php if(isset($riwayat)){foreach ($riwayat as $data): ?>
                <div class="products-row">
                    <div class="sel id">
                        <span><?=$data['id_order']?></span>
                    </div>
                    <div class="sel tanggal"><span class="cell-label"></span><?=$data['tanggal']?></div>
                    <div class="sel harga"><span class="cell-label"></span><?=$data['total_keseluruhan_harga']?></div>
                    <div class="sel status"><span class="cell-label"></span><?=$data['status']?></div>
                    </div>
                <?php endforeach;  ?> 
            </div>
        </div> 
        <?php } else {
            if(!isset($_POST['Cari'])){
        ?>
        <div class="kosong">
            <h3>Mohon Maaf</h3>
            <p>
                Belum Ada Riwayat Pemesanan yang 
                tersedia di Farmanusa
            </p> 
        </div>
        <?php
            } else {
        ?>
        <div class="kosong">
            <h3>Mohon Maaf</h3>
            <p>
                Obat yang anda cari
                tidak ada di daftar obat
                kami atau stok kosong
            </p> 
        </div>
        <?php
            }
        }
        ?>
        </div>
    </section>

    <?php include 'footer.php' ?>

    <?php require 'login.php';?>

    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>