<?php
    session_start();
    if(!isset($_SESSION['user'])){
        echo"<script>alert('Login Dulu Ya Dek');document.location.href = 'index.php';</script>";
    }
    require('db-connect.php');
    $username = $_SESSION['user'];

    if(!isset($_POST['Cari'])){
        $result = mysqli_query($db, "SELECT * FROM orderan o JOIN obat_diorder d ON (d.id_order = o.id_order)
                                     JOIN obat b on (d.id_obat = b.id_obat) WHERE username = '$username' and status = 'Sedang Diorder'");
    }
    else{
        $cari = $_POST['Search'];
        $result = mysqli_query($db, "SELECT * FROM obat_diorder LEFT JOIN orderan USING id_order
                                     WHERE status = 'Sedang Diorder' and username = $username LIKE'%$cari%'");
    }
    while($row = mysqli_fetch_assoc($result)){
        $order[] = $row;
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

    <section class="keranjang" id="keranjang">

        <h1 class="heading"> keranjang </h1>
        <?php 
            if(isset($order) or isset($_POST['Cari'])){
        ?>
            <form id="searchObat" action="" method="POST">
                <input type="text" value="" name="Search" placeholder="Cari Nama Obat">
                <button class="btn" type="submit" name="Cari"><i class="fas fa-search"></i></button>
            </form>
        <?php
            }
        ?>
        
        <div class="box-container">
        <?php   
            if(isset($order)){
        ?>  
            <div class=totalHarga> Total Harga
                <div class=value> 0 </div>
            </div>
        <?php
                foreach($order as $ord):
        ?>
            <div class="box">
                <span class="stok" method="post"><input type="number"
                                    onkeydown="totalHarga(this, <?php echo $ord['harga_obat']; ?>, '-')"
                                    onkeyup="imposeMinMax(this), totalHarga(this, <?php echo $ord['harga_obat']; ?>, '+')"
                                    min="0" max="<?php echo $ord['stok_obat']; ?>"
                                    maxlength="3";
                                    value="0" name='<?php echo $ord['nama_obat']?>'>
                                </span>
               
                <div class="image">
                    <img src="image/obat-1.jpg" alt="">
                </div>
                <div class="content">
                    <h3><?php echo $ord['nama_obat']; ?></h3>
                    <div class="price">Rp.<?php echo $ord['harga_obat']; ?></div>
                </div>
            </div>
        <?php
                endforeach;
            } else {
            if(!isset($_POST['Cari'])){
        ?>
        <div class="kosong">
            <h3> Keranjang Anda Kosong </h3>
            <p>
                Silakan pilih obat
                di menu obat
            </p> 
        </div>
        <?php
            } else {
        ?>
        <div class="kosong">
            <h3> Obat belum ada</h3>
            <p>
                Obat yang Anda cari
                tidak ada di keranjang Anda
            </p> 
        </div>
        <?php
            }
            }
        ?>
        </div>
        <button class="btn"> Pesan Sekarang </button> 
    </section>


    <?php include 'footer.php' ?>

    <?php require 'login.php';?>

    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>