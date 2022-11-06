<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Farmanusa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class='badan'>
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
                <h3>stay safe, stay healthy</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem sed autem vero? Magnam, est laboriosam!</p>
                <a href="#" class="btn"> contact us <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>
    </div>

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span>about</span> us </h1>

        <div class="row">

            <div class="image">
                <img src="image/blog-1.jpg" alt="">
            </div>

            <div class="content">
                <h3>we take care of your healthy life</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure ducimus, quod ex cupiditate ullam in assumenda maiores et culpa odit tempora ipsam qui, quisquam quis facere iste fuga, minus nesciunt.</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus vero ipsam laborum porro voluptates voluptatibus a nihil temporibus deserunt vel?</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <div class="popup" id="popup">
        <form class="login">
            <table align="center">
                <tr>
                    <td align="center">Username: </td>
                    <td align="center"><input type="text" size="20" maxlength="15" name="username"></td>
                </tr>
                <tr>
                    <td align="center">Password: </td>
                    <td align="center"><input size=\"20\" type="password" size="20" maxlength="15" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Login"> </td>
                </tr>
            </table>
        </form>
    </div>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>