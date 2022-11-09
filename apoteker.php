<?php
    require('db-connect.php');
    $result = mysqli_query($db, "SELECT * FROM user WHERE tipe_akun = 'apoteker'");
    while($row = mysqli_fetch_assoc($result)){
        $apoteker[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apoteker</title>
    <link rel="browser tab icon" href="./image/heart-health-48.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <?php
    include 'navbar.php';
    ?>

    <!-- apoteker section starts -->

    <section class="apoteker" id="apoteker">

        <h1 class="heading">apoteker</h1>

        <div class="box-container">
            <?php
            if(isset($apoteker)){
                foreach ($apoteker as $staff):
            ?>
                <div class="box">
                    <img src="image/blog-2.jpg" alt="">
                    <h1><?php echo staff['username'] ?></h1>
                    <span>expert fharmachist</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
            <?php
                endforeach;
            } else {
            ?>
            <div class="kosong">
                <h3>Mohon Maaf</h3>
                <p>
                    Belum Ada Apoteker yang 
                    Bekerja di Farmanusa
                </p> 
            </div>
            <?php
            }
            ?>
        </div>
    </section>

    <!-- apoteker section ends -->
    <?php include 'footer.php' ?>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>