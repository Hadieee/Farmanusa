<?php
    include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="baru.css">
</head>

<body> 
    <div>
        <section class="home" id="home">
            <div class="image">
                <img src="image/book-img.svg" alt="">
            </div>
    
            <div class="content">
                <h3>stay safe, stay healthy</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem sed autem vero? Magnam, est laboriosam!</p>
                <a href="#" class="btn"> contact us <span class="fas fa-chevron-right"></span> </a>
            </div>
        </section>
    </div>
    <div class="popup" id="popop">
        <form class="login">
            <table align="center">
                <tr>
                    <td align="center">Username: </td>
                    <td align="center"><input type="text" size="20" maxlength="15" name="username"></td>
                </tr>
                <tr>
                    <td align="center">Password: </td>
                    <td align="center"><input size=\"20\"
                       type="password" size="20"
                       maxlength="15" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit"
                        value="Login"> </td>
                </tr>
            </table>
        </form>
    </div>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>