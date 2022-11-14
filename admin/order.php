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
    require('../db-connect.php');
    $username = $_SESSION['user'];

    if(!isset($_POST['Cari'])){
        $result = mysqli_query($db, "SELECT * FROM orderan o JOIN obat_diorder d ON (d.id_order = o.id_order)
                                     JOIN obat b on (d.id_obat = b.id_obat) WHERE status = 'Belum Dibayar'");
    }
    else{
        $cari = $_POST['Search'];
        $result = mysqli_query($db, "SELECT * FROM orderan o JOIN obat_diorder d ON (d.id_order = o.id_order)
                                     JOIN obat b on (d.id_obat = b.id_obat) WHERE nama_obat LIKE'%$cari%'
                                     and status = 'Belum Dibayar'");
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
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>

    <?php
        include 'admin-navbar.php';
    ?>

    <!-- obat section starts  -->

    <section class="keranjang" id="keranjang">

        <h1 class="heading"> Daftar Orderan</h1>
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
        <form action="" method="POST">   
        <div class="box-container">
        <?php   
            if(isset($order)){
        ?>  
        <?php
                foreach($order as $ord):
        ?>
                <div class="box">
                    <div class="image">
                        <img src=<?php echo "../image/".$ord['gambar'] ?> alt="">
                        <div class="icons" style="width: 100%; cursor: pointer;">
                            <a href=<?php echo "konfirmasi.php?id=".$ord['id_order']?> style="width: 100%;" class="fa-solid fa-receipt"> Konfirmasi Pembayaran</a>
                        </div>
                    </div>
                    <div class="content">
                        <h3><?php echo $ord['nama_obat']; ?></h3>
                        <h4>Pembeli : <?php echo $ord['username']; ?></h4>
                        <div class="price">Rp.<?php echo $ord['total_keseluruhan_harga']; ?></div>
                    </div>
                </div>
            <?php
                    endforeach;
            ?>
            </div>
            <button type="submit" name="anti_enter" onclick="return warning()" style="display:hidden">
            <button style="margin-top: 5rem" type="submit" name="pesan" onclick="return beli()" class="btn"> Pesan Sekarang </button>
            <?php
                } else{
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
        </form>
    </section>


    <?php include '../footer.php' ?>

    <?php require '../login.php';?>

    <script type="text/javascript" src="../js/script.js"></script>
</body>

</html>