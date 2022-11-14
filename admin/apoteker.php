<?php
require('../db-connect.php');
session_start();
if (isset($_SESSION['tipe_akun'])) {
    if ($_SESSION['tipe_akun'] != 'admin') {
        echo "<script>
                alert('Kamu Bukan Admin Woi');
                document.location.href = 'index.php';
            </script>";
    }
}
if (!isset($_POST['Cari'])) {
    $result = mysqli_query($db, "SELECT * FROM user WHERE tipe_akun = 'apoteker'");
} else {
    $cari = $_POST['Search'];
    $result = mysqli_query($db, "SELECT * FROM user WHERE username LIKE '%$cari%' AND tipe_akun = 'apoteker'");
}
while ($row = mysqli_fetch_assoc($result)) {
    $apoteker[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Apoteker</title>
    <link rel="browser tab icon" href="/image/heart-health-48.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>

    <?php
    include 'admin-navbar.php';
    ?>

    <!-- apoteker section starts -->

    <section class="apoteker" id="apoteker">

        <h1 class="heading">apoteker</h1>
        <?php
        if (isset($apoteker) or isset($_POST['Cari']) or !isset($apoteker)) {
        ?>
            <div style="display: flex; flex-direction:row; justify-content:space-around; align-items:center; flex-wrap: wrap;  ">
                <button class="btn" style="padding:11.2px; margin-top: 0; display:flex; align-items:center;" onclick="document.querySelector('.popup').style.display = 'block'">+ Tambah Apoteker</button>
                <form id="searchObat" action="" method="POST">
                    <input type="text" value="" name="Search" placeholder="Cari Nama Apoteker">
                    <button class="btn" type="submit" name="Cari"><i class="fas fa-search"></i></button>
                </form>
            </div>
        <?php
        }
        ?>
        <div class="box-container">
            <?php
            if (isset($apoteker)) {
                foreach ($apoteker as $staff) :
            ?>
                    <div class="box">
                        <div class="image">
                        <img src=<?php echo "../image/".$staff['gambar'] ?> alt="">
                            <div class="icons">
                                <a href=<?php echo "crud-apoteker/update-apoteker.php?id=" . $staff["email"] ?> class="fas fa-pencil"></a>
                                <a href=<?php echo "crud-apoteker/hapus-apoteker.php?id=" . $staff["email"] ?> class="fas fa-trash"></a>
                            </div>
                        </div>
                        <div class="content">
                            <h3><?php echo $staff['username'] ?></h3>
                            <span>expert fharmachist</span>
                        </div>
                    </div>
                <?php
                endforeach;
            } else {
                if (!isset($_POST['Cari'])) {
                ?>
                    <div class="kosong">
                        <h3>Mohon Maaf</h3>
                        <p>
                            Belum Ada Apoteker yang
                            Bekerja di Farmanusa
                        </p>
                    </div>
                <?php
                } else {
                ?>
                    <div class="kosong">
                        <h3>Mohon Maaf</h3>
                        <p>
                            Apoteker yang anda cari tidak
                            ada di daftar apoteker kami
                        </p>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <!-- apoteker section ends -->
    <div class="popup" id="popup">
        <form class="login" action="crud-apoteker/tambah-apoteker.php" method="post" enctype="multipart/form-data">
            <table align="center">
                <tr>
                    <td align="right">Email</td>
                    <td>
                        <center>:</center>
                    </td>
                    <td align="left"><input type="text" name="email" required></td>
                </tr>
                <tr>
                    <td align="right">Username</td>
                    <td>
                        <center>:</center>
                    </td>
                    <td align="left"><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td align="right">Password</td>
                    <td>
                        <center>:</center>
                    </td>
                    <td align="left"><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td align="right">Konfirmasi Password</td>
                    <td>
                        <center>:</center>
                    </td>
                    <td align="left"><input type="password" name="password_konf" required></td>
                </tr>
                <tr>
                    <td align="right">Gambar</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="file" name="gambar"></td>
                </tr>
                <tr>
                    <td align="center" colspan="3" style="padding-top: 10px;">
                        <button type="submit" class="btn"> Tambah </button>
                        <button class="btn" onclick="document.querySelector('.popup').style.display = 'none'"> Batalkan </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script type="text/javascript" src="../js/script.js"></script>
</body>

</html>