<?php
    require "../../db-connect.php";
    $id = $_GET['id'];
    $hasil = mysqli_query($db, "SELECT * FROM user WHERE email = '$id'");
    $staff = mysqli_fetch_assoc($hasil);
    $password = password_hash($password, PASSWORD_DEFAULT);

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_konf = $_POST['password_konf'];
        $hasil = mysqli_query($db, "UPDATE user SET email = '$email', 
                                                    username = '$username', 
                                                    password = '$password',
                                                    tipe_akun = 'apoteker'  
                                                    WHERE email = '$id'"); 
        if($hasil){
            echo"<script> 
                alert('berhasil update');
                document.location.href = '../apoteker.php';
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
                    <td align="right">Email</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="text" name="email" value="<?php echo $staff['email']; ?>" required></input></td>
                </tr>
                <tr>
                    <td align="right">Username</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="text" name="username" value="<?php echo $staff['username']; ?>" required></input></td>
                </tr>
                <tr>
                    <td align="right">Password</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="password" name="password" required></input></td>
                </tr>
                <tr>
                    <td align="right">Konfirmasi Password</td>
                    <td> <center>:</center></td>
                    <td align="left"><input type="password" name="password_konf" required></input></td>
                </tr>   
                <tr>
                    <td align="center" colspan="3" style="padding-top: 10px;">
                            <button type="submit" name="submit" class="btn"> Perbarui </button>
                            <a class="btn" href="../apoteker.php"> Batalkan </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script type="text/javascript" src="../../js/script.js"></script>
</body>

</html>