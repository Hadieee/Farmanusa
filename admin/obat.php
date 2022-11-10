<?php
    require('../db-connect.php');
    if(!isset($_POST['Cari'])){
        $result = mysqli_query($db, "SELECT * FROM obat WHERE stok_obat > 0");
    }
    else{
        $cari = $_POST['Search'];
        $result = mysqli_query($db, "SELECT * FROM obat WHERE nama_obat LIKE'%$cari%' AND stok_obat > 0");
    }
    while($row = mysqli_fetch_assoc($result)){
        $obat[] = $row;
    }
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
    <title>Medicina</title>
    <link rel="browser tab icon" href="../image/heart-health-48.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>

    <?php
    include 'admin-navbar.php';
    ?>

    <!-- obat section starts  -->

    <section class="obat" id="obat">

        <h1 class="heading">Data Obat</h1>
        <?php 
            if(isset($obat) or isset($_POST['Cari'])){
        ?>
            <div style="display: flex; flex-direction:row; justify-content:space-around; align-items:center; flex-wrap: wrap;  ">
                <button class="btn" style="padding:11.2px; margin-top: 0; display:flex; align-items:center;" onclick="document.querySelector('.popup').style.display = 'block'">+ Tambah Obat</button>
                <form id="searchObat" action="" method="POST">
                    <input type="text" value="" name="Search" placeholder="Cari Nama Obat">
                    <button class="btn" type="submit" name="Cari"> O </button>
                </form>
            </div>
        <?php
            }
        ?>
        <div class="box-container">
        <?php   
            if(isset($obat)){
                foreach($obat as $obt):
        ?>
            <div class="box">
                <span class="stok"><?php echo $obt['stok_obat']; ?></span>
                <div class="image">
                    <img src="../image/obat-1.jpg" alt="">
                    <div class="icons">
                        <a href=<?php echo "crud-obat/update-obat.php?id=".$obt["id_obat"]?> class="fas fa-pencil"></a>
                        <a href=<?php echo "crud-obat/hapus-obat.php?id=".$obt["id_obat"]?> class="fas fa-trash"></a>
                    </div>
                </div>
                <div class="content">
                    <h3><?php echo $obt['nama_obat']; ?></h3>
                    <div class="price">Rp.<?php echo $obt['harga_obat']; ?></div>
                </div>
            </div>
        <?php
                endforeach;
            } else {
            if(!isset($_POST['Cari'])){
        ?>
        <div class="kosong">
            <p>
                Belum Ada Obat yang 
                tersedia di Farmanusa
            </p> 
            <button class="btn" onclick="document.querySelector('.popup').style.display = 'block'">+ Tambah Obat</button>
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

    <div class="popup" id="popup">
        <form class="login" action="crud-obat/tambah-obat.php" method="post">
            <table align="center">
                <tr>
                    <td align="right">Nama Obat</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <td align="right">Jenis Obat</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="text" name="jenis" required></td>
                </tr>
                <tr>
                    <td align="right">Harga Obat</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="number" name="harga" required></td>
                </tr>
                <tr>
                    <td align="right">Stok Obat</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="number" name="stok" required></td>
                </tr>
                <tr>
                    <td align="right">Deskripsi</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="text" name="deskripsi"></td>
                </tr>
                <tr>
                    <td align="center" colspan="3" style="padding-top: 10px;">
                            <button type="submit" class="btn"> Tambah </button>
                            <button class="btn" onclick="document.querySelector('.popup').style.display = 'none'"> Batalkan </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script type="text/javascript" src="../js/script.js"></script>
</body>

</html>