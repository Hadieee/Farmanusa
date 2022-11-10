<?php
function current_url()
{
    $url      = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $validURL = str_replace("&", "&amp;", $url);
    $legitURL = explode('/', $validURL);
    $legitURL = explode('.', end($legitURL));
    return $legitURL[0];
}
//echo "page URL is : ".current_url();

$offer_url = current_url();

?>

<div class="tempat">
    <nav class="kepala">
        <a href="" class="logo"><i class="fas fa-heart"></i><span>Farmanusa</span></a>
        <div class="muka">
            <div class="navbar">
                <?php 
                if ($offer_url != 'index'){
                echo'
                    <div>
                        <a href="index.php"><i class="fas fa-home"></i><span> Home </span></a>
                    </div>';
                }

                if($offer_url != 'obat'){
                echo'
                    <div>
                        <a href="obat.php"><i class="fa-solid fa-pills"></i><span>Obat<span></a>
                    </div>';
                }

                if($offer_url != 'apoteker'){
                echo'
                <div>
                    <a href="apoteker.php"><i class="fas fa-user-md"></i><span>Apoteker</span></a>
                </div>';
                }
                ?>
                
                <div>
                    <a href="" onclick=inconstruct()><i class="fas fa-shopping-cart"></i><span>Keranjang</span></a>
                </div>
            </div>
            <div class="user">
                <?php 
                    if(isset($_SESSION['user'])){
                ?>
                    <a href="profile.php">
                    <i class="fas fa-user"></i><span><?php echo $_SESSION['user']; ?></span></a>
                <?php
                    }else{
                ?>
                <a onclick="loggingPop();
                            document.querySelector('.kepala').classList.toggle('active');
                            document.querySelector('#menu-btn').style.left = '50px';
                            document.querySelector('#menu-btn').classList.toggle('fa-times');">
                <i class="fas fa-user"></i><span>Login</span></a>
                <?php
                    }
                ?>
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