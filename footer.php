<section class="footer">
    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="index.php#home"> <i class="fas fa-chevron-right"></i> home </a>
            <a href="index.php#about"> <i class="fas fa-chevron-right"></i> about us</a>
        </div>

        <div class="box">
            <h3>our services</h3>
            <a href="obat.php"> <i class="fas fa-chevron-right"></i> obat </a>
            <a href="apoteker.php"> <i class="fas fa-chevron-right"></i> apoteker </a>
            <a href=""> <i class="fas fa-chevron-right"></i> keranjang </a>
            <?php if(!isset($_SESSION['user'])){ ?>    
                <a onclick="document.getElementById('popup').style.display = 'block';"> <i class="fas fa-chevron-right"></i> login </a>
            <?php } ?>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
            <a href="#"> <i class="fas fa-envelope"></i> farmanusa@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Samarinda, Indonesia - 141122 </a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> Facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> Twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> Instagram </a>
        </div>

    </div>

    <div class="credit"> Created By <span>Farmanusa's Team Website Development</span> | All Rights NOT Reserved </div>

</section>