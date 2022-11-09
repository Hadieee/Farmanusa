<?php
    require('db-connect.php');
    $result = mysqli_query($db, "SELECT * FROM obat");
    $obat = [];
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
    <title>Medicina</title>
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
        <div class="box-container">
        <?php   
            if(!isset($obat)){
                foreach($obat as $obt):
        ?>
            <div class="box">
                <span class="discount">-10%</span>
                <div class="image">
                    <img src="image/obat-1.jpg" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">add to cart</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3><?php echo $obt['nama_obat']; ?></h3>
                    <div class="price"><?php echo $obt['harga_obat']; ?><span>$4.99</span> </div>
                </div>
            </div>
        <?php
                endforeach;
            } else {
        ?>
        <div class="kosong">
            <h3>Mohon Maaf</h3>
            <p>
                Belum Ada Obat yang 
                tersedia di Farmanusa
            </p> 
        </div>
        <?php
            }
        ?>
        </div>
    </section>

    <?php include 'footer.php' ?>

    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>