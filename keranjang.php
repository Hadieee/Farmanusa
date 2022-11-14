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
        $result = mysqli_query($db, "SELECT * FROM orderan o JOIN obat_diorder d ON (d.id_order = o.id_order)
                                     JOIN obat b on (d.id_obat = b.id_obat) WHERE username = $username and nama_obat LIKE'%$cari%'
                                     and status = 'Sedang Diorder'");
    }

    while($row = mysqli_fetch_assoc($result)){
        $order[] = $row;
    }

    if(isset($_POST['pesan'])){
        
        // Ambil ID Orderan
        $query = mysqli_query($db, "SELECT * FROM orderan WHERE username = '$username' and status = 'Sedang Diorder'");
        while($row = mysqli_fetch_assoc($query)){
            $IDcheck[] = $row;
        }
    
        $id = $IDcheck[0]['id_order'];

        // Ubah jumlah obat diorder + total harga di tabel obat_diorder
        foreach($order as $ord):
            
            $id_obat = $ord['id_obat'];
            $value = ($_POST[$ord['nama_obat']] == NULL)? 0 : $_POST[$ord['nama_obat']];
            $hargaTotal = $value * $ord['harga_obat'];
            $result = mysqli_query($db, "UPDATE obat_diorder SET jumlah_obat = $value,
                                         total_harga_obat = $hargaTotal
                                         WHERE id_order = $id AND id_obat = $id_obat");

        endforeach;

        // Hitung Total Harga Dengan Aggregat
        $query = mysqli_query($db, "SELECT SUM(total_harga_obat) as sum FROM obat_diorder
                                    WHERE id_order = $id");
        
        while($row = mysqli_fetch_assoc($query)){
            $res[] = $row;
        }

        $Total = $res[0]['sum'];

        date_default_timezone_set("Asia/Makassar");
        $Tanggal = date('Y-m-d');

        if($Total != 0){
            // Ubah Total Harga di tabel orderan
            $query = mysqli_query($db, "UPDATE orderan SET total_keseluruhan_harga = $Total,
                                        tanggal = DATE'$Tanggal',
                                        status = 'Belum Dibayar'
                                        WHERE id_order = $id");

            // Hapus obat yang jumlah dibelinya 0
            $query = mysqli_query($db, "DELETE FROM obat_diorder WHERE id_order = $id and jumlah_obat = 0");
        }

        header('Location: index.php');
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
            <form action="" method="POST">
        <?php
                foreach($order as $ord):
        ?>
                <div class="box">
                    <span class="stok"><input type="text" patern="[0-9]"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57"
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
            <button type="submit" name="anti_enter" onclick="return warning()" style="display:hidden">
            <button type="submit" name="pesan" onclick="return beli()" class="btn"> Pesan Sekarang </button> 
        </form>
    </section>


    <?php include 'footer.php' ?>

    <?php require 'login.php';?>

    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>