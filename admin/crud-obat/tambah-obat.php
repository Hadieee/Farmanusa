<?php
    require '../../db-connect.php';
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi  = $_POST['deskripsi'];
    $hasil = mysqli_query($db, "INSERT INTO obat VALUES ('', '$nama', '$jenis', '$harga', '$stok', '$deskripsi')"); 
    if($hasil){
        echo "<script>
                alert('Obat Berhasil ditambahkan');
                document.location.href = '../obat.php';
            </script>";
    }else{
        echo "<script>
                alert('Obat Gagal ditambahkan');
                document.location.href = '../obat.php';
            </script>";
    }
?>