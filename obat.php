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

    <!-- prodcuts section starts  -->

    <section class="products" id="products">

        <h1 class="heading"> latest <span>products</span> </h1>
        <div class="box-container">
        <?php   
         for($i=0;$i<4;$i++){
        ?>

                <div class="box">
                    <span class="discount">-10%</span>
                    <div class="image">
                        <img src="image/doc-1.jpg" alt="">
                        <div class="icons">
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="cart-btn">add to cart</a>
                            <a href="#" class="fas fa-share"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3>Medicina</h3>
                        <div class="price"> $12.99 <span>$15.99</span> </div>
                    </div>
                </div>
                <?php
         }
         ?>
         </div>

    </section>

    <!-- prodcuts section ends -->

    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>