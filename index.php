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
                <h3>Your Wellness Is Our Priority.</h3>
                <p>
                    Selamat datang di Farmanusa,
                    di mana kesehatan Anda adalah
                    jantung kehidupan Kami
                </p>.
                <a href="#about" class="btn"> Tentang Kami <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>
    </section>

    <!-- home section ends  -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span>about</span> us </h1>

        <div class="row">

            <div class="image">
                <img src="image/blog-1.jpg" alt="">
            </div>

            <div class="content">
                <h3>we take care of your healthy life</h3>
                <p>APOTEK Farmanusa merupakan perusahaan Ritel Farmasi pertama dengan Reputasi Nasional melalui :</p>
                <p>Pengembangan brand dan image yang bertujuan untuk memberikan jaminan kepada pasien atau masyarakat terhadap kualitas,
                    Ketelitian pembacaan resep maupun peracikan obat, Kecepatan dalam pelayanan serta penambahan manfaat baru terhadap arti kesembuhan dan kesehatan bagi pasien.</p>
                <p>Pengembangan konsep dan strategi marketing yang diketengahkan adalah dengan memberikan penawaran harga produk yang kompetitif, Keramahan seluruh karyawan apotek dalam melayani pasien,
                    Kejujuran serta kesahajaan dari pelayanan pelanggan sebagai suatu nilai tambah penting terhadap produk obat-obatan yang ditawarkan oleh apotek. Pembenahan secara terus-menerus dipastikan dilakukan pada seluruh cabang Apotek Farmanusa.</p>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="#home"> <i class="fas fa-chevron-right"></i> home </a>
                <a href="#about"> <i class="fas fa-chevron-right"></i> about us</a>
            </div>

            <div class="box">
                <h3>our services</h3>
                <a href="obat.php"> <i class="fas fa-chevron-right"></i> obat </a>
                <a href="apoteker.php"> <i class="fas fa-chevron-right"></i> apoteker </a>
                <a href=""> <i class="fas fa-chevron-right"></i> keranjang </a>
                <a onclick="document.getElementById('popup').style.display = 'block';"> <i class="fas fa-chevron-right"></i> login </a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
                <a href="#"> <i class="fas fa-envelope"></i> farmanusa@gmail.com </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Samarinda, indonesia - 141122 </a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            </div>

        </div>

        <div class="credit"> created by <span>Farmanusa's Team Website Development</span> | all rights NOT reserved </div>

    </section>

    <!-- footer section ends  -->

    <!-- pop up login starts  -->

    <?php require 'login-page.php'; ?>

    <!-- pop up login ends  -->

    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>