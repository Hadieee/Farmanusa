<?php
    require '../../db-connect.php';
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi  = $_POST['deskripsi'];
    $format_file = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $size = $_FILES['gambar']['size'];
    $file = urlencode($nama);
    $type = explode('.',$format_file);
    $jumlah = count($type)-1;
    $nama_file = "$file.$type[$jumlah]";

    $format = array('jpg', 'png', 'jpeg');
    $max_size = 3000000;    

    if(in_array($type[$jumlah], $format) === true) {
        if($size < $max_size){
            move_uploaded_file($tmp_name, '../../image/' . $nama_file);
            $hasil = mysqli_query($db, "INSERT INTO obat VALUES ('', '$nama', '$jenis', '$harga', '$stok', '$deskripsi', '$nama_file')"); 
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
        }else{
            print_r('WOI');
        }
    }else{
    }
?>