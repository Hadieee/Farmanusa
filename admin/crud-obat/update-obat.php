<?php
    require "../../db-connect.php";
    $id = $_GET['id'];
    $hasil = mysqli_query($db, "SELECT * FROM obat WHERE id_obat = '$id'");
    $obat = mysqli_fetch_assoc($hasil);

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $deskripsi  = $_POST['deskripsi'];
        $hasil = mysqli_query($db, "UPDATE obat SET nama_obat = '$nama', 
                                                    tipe_obat = '$jenis', 
                                                    harga_obat = '$harga', 
                                                    stok_obat = '$stok', 
                                                    deskripsi = '$deskripsi' 
                                                    WHERE id_obat = '$id'"); 
        if($hasil){
            echo"<script> 
                alert('berhasil update');
                document.location.href = '../obat.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicina</title>
    <link rel="browser tab icon" href="../../image/heart-health-48.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/index.css">
</head>

<body>
    <!-- obat section starts  -->

    <div class="popup" id="popup" style="display: flex;">
        <form class="login" action="" method="post">
            <table align="center">
                <tr>
                    <td align="right">Nama Obat</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="text" name="nama" value="<?php echo $obat['nama_obat']; ?>" required></input></td>
                </tr>
                <tr>
                    <td align="right">Jenis Obat</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="text" name="jenis" value="<?php echo $obat['tipe_obat']; ?>" required></input></td>
                </tr>
                <tr>
                    <td align="right">Harga Obat</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="number" name="harga" value="<?php echo $obat['harga_obat']; ?>" required></input></td>
                </tr>
                <tr>
                    <td align="right">Stok Obat</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="number" name="stok" value="<?php echo $obat['stok_obat']; ?>" required></input></td>
                </tr>
                <tr>
                    <td align="right">Deskripsi</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="text" name="deskripsi" value="<?php echo $obat['deskripsi']; ?>"></input></td>
                </tr>
                <tr>
                    <td align="center" colspan="3" style="padding-top: 10px;">
                            <button type="submit" name="submit" class="btn"> Perbarui </button>
                            <a class="btn" href="../obat.php"> Batalkan </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script type="text/javascript" src="../../js/script.js"></script>
</body>

</html>