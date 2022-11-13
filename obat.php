<?php
    session_start();
    require('db-connect.php');

    if(!isset($_SESSION['user'])){
        echo"<script>alert('Login Dulu Ya Dek');document.location.href = 'index.php';</script>";
    }else{
        $username = $_SESSION['user'];
        $check = mysqli_query($db, "SELECT * FROM orderan WHERE username = '$username' and status = 'Sedang Diorder'");

        while($row = mysqli_fetch_assoc($check)){
            $checkSlot[] = $row;
        }

        if(!isset($checkSlot)){
            $query = "INSERT INTO orderan VALUES (default, '$username', ".date("Y-m-d").", 0)" ;
            $result = $db->query($query);
        }
    }
    
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

        <h1 class="heading"> obat </h1>
        <?php 
            if(isset($obat) or isset($_POST['Cari'])){
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
            if(isset($obat)){
                foreach($obat as $obt):
        ?>
            <div class="box">
                <span class="stok"><?php echo $obt['stok_obat']; ?></span>
                <div class="image">
                    <img src="image/obat-1.jpg" alt="">
                    <div class="icons">
                        <?php
                        $id_obat = $obt['id_obat'];
                        $ObatDiKeranjang = "SELECT * FROM orderan JOIN obat_diorder where username = '$username'
                                            and status = 'Sedang Diorder' and id_obat = $id_obat";
                        $qA = $db->query($ObatDiKeranjang);
                        while($rowA = mysqli_fetch_assoc($qA)){
                            $rowCheck[] = $rowA;
                        }

                        if (isset($rowCheck)){?>
                            <a href="#" class="cart-btn">Sudah di keranjang</a>
                        <?php
                            unset($rowCheck);
                        } else{
                        ?>
                            <a href=<?php echo "add-to-cart.php?id=".$obt["id_obat"]?>
                            class="cart-btn" onclick="cart_add()">Add to Cart</a>
                        <?php 
                        } ?>

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
            <h3>Mohon Maaf</h3>
            <p>
                Belum Ada Obat yang 
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