<?php
    session_start();
    if(isset($_SESSION['tipe_akun'])){
        if($_SESSION['tipe_akun'] == 'admin' || $_SESSION['tipe_akun'] == 'apoteker'){
            header('Location: admin/index.php');
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
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <?php
        include 'navbar.php';
    ?>

    <!-- home section starts  -->

    <section class='badan'>
        <div class="home" id="home">
            <div class="image">
                <div class="dark" style="display: none;">
                    <object type="image/svg+xml" data="image/about-img.svg">
                        <img src="image/about-img.svg" />
                    </object>
                </div>
                <div class="light">
                    <object type="image/svg+xml" data="image/book-img.svg">
                        <img src="image/book-img.svg" />
                    </object>
                </div>
            </div>
            <div class="content">
                <h3>Your Wellness Is Our Priority</h3>
                <p>
                    Selamat datang di Farmanusa,
                    di mana kesehatan Anda adalah
                    jantung kehidupan Kami.</p>
                <a href="#about" class="btn"> Tentang Kami <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>
    </section>

    <!-- home section ends  -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> about us </h1>

        <div class="row">

            <div class="image">
                <img src="image/blog-1.jpg" alt="">
            </div>

            <div class="content">
                <h3>We Take Care of Your Healthy Life</h3>
                <p>APOTEK Farmanusa merupakan perusahaan Ritel Farmasi pertama dengan reputasi nasional melalui:</p>
                <p>Pengembangan brand dan image yang bertujuan untuk memberikan jaminan kepada pasien atau masyarakat terhadap kualitas,
                    ketelitian pembacaan resep maupun peracikan obat, kecepatan dalam pelayanan serta penambahan manfaat baru terhadap arti kesembuhan dan kesehatan bagi pasien.
                    pengembangan konsep dan strategi marketing yang diketengahkan adalah dengan memberikan penawaran harga produk yang kompetitif, keramahan seluruh karyawan apotek dalam melayani pasien,
                    kejujuran serta kesahajaan dari pelayanan pelanggan sebagai suatu nilai tambah penting terhadap produk obat-obatan yang ditawarkan oleh apotek.
                    Pembenahan secara terus-menerus dipastikan dilakukan pada seluruh cabang Apotek Farmanusa.</p>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- footer section starts  -->

    <?php include 'footer.php' ?>

    <!-- footer section ends  -->

    <!-- pop up login starts  -->

    <?php require 'login.php'; ?>

    <!-- pop up login ends  -->

    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>