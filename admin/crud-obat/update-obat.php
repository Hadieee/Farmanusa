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
        
        $tambah = "UPDATE obat SET nama_obat = '$nama', 
                                    tipe_obat = '$jenis', 
                                    harga_obat = '$harga', 
                                    stok_obat = '$stok', 
                                    deskripsi = '$deskripsi' 
                                    WHERE id_obat = '$id'";
        
        if($_FILES['gambar']['size']!=0){

            $format_file = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];
            $size = $_FILES['gambar']['size'];
    
            $file = urlencode($nama);
            $type = explode('.',$format_file);
            $jumlah = count($type)-1;
            $nama_file = "$file.$type[$jumlah]";
    
            $format = array('jpg', 'png', 'jpeg');
            $max_size = 2000000;
    
            if(in_array($type[$jumlah], $format) === true) {
                if($size < $max_size){
                    unlink('../../image/'.$obat['gambar']);
                    move_uploaded_file($tmp_name, '../../image/' . $nama_file);
    
                    $tambah = "UPDATE obat SET nama_obat = '$nama', 
                                                tipe_obat = '$jenis', 
                                                harga_obat = '$harga', 
                                                stok_obat = '$stok', 
                                                deskripsi = '$deskripsi', 
                                                gambar = '$nama_file'
                                                WHERE id_obat = '$id'";
                }
            }
        }
        $upload = mysqli_query($db, $tambah);
        if($upload){
            header('Location: ../obat.php');
            exit();
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
        <form class="login" action="" method="post" enctype="multipart/form-data">
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
                    <td align="right">Gambar</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="file" name="gambar"></td>
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