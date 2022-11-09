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

    <section class="doctors" id="doctors">

        <h1 class="heading">apoteker</h1>

        <div class="box-container">
            <?php
            for ($i = 0; $i < 6; $i++) {
            ?>
                <div class="box">
                    <img src="image/blog-2.jpg" alt="">
                    <h1>Heidar Sadhana</h1>
                    <span>expert fharmachist</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>

    <!-- doctors section ends -->

    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>