<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="tempat">
        <nav class="kepala">
            <a href="" class="logo"><i class="fas fa-heart"></i><span>Farmanusa</span></a>
            <div class="muka">
                <div class="navbar">
                    <div>
                        <a href=""><i class="fas fa-home"></i><span>Home</span></a>
                    </div>
                    <div>
                        <a href=""><i class="fa-solid fa-pills"></i><span>Obat<span></a>
                    </div>
                    <div>
                        <a href=""><i class="fas fa-user-md"></i><span>Apoteker</span></a>
                    </div>
                </div>
                <div class="user">

                    <a onclick="document.getElementById('popop').style.display = 'block';"><i class="fas fa-user"></i><span>Login</span></a>
                </div>
            </div>
            <div><i id="menu-btn" class="fas fa-bars"></i></div>
            <div class="dark_mode">
                <input type="checkbox" class="checkbox" id="toggle" />
                <label class="label" for="toggle">
                    <!-- <i class="fas fa-moon"></i> -->
                    <!-- <i class="fas fa-sun"></i> -->
                    <div class="ball"></div>
                </label>
            </div>
        </nav>
    </div>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>