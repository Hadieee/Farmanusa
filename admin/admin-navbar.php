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
                        echo
                        '<div>
                        <a href="obat.php"><i class="fa-solid fa-pills"></i><span>Data Obat<span></a>
                        </div>';
                    }
                    if($_SESSION['tipe_akun'] == 'admin'){
                        if($offer_url != 'apoteker'){
                            echo'
                                <div>
                                    <a href="apoteker.php"><i class="fas fa-user-md"></i><span>Data Apoteker</span></a>
                                </div>';
                        }
                    }
                ?>
                
            </div>
            <?php
            if(isset($_SESSION['user'])){
                echo "
                    <div class='user'>
                        <a href='../logout.php'><i class='fas fa-user'></i><span>Logout</span></a>
                    </div>";
            }
            ?>
            
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