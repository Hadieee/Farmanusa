<?php
    require 'db-connect.php';
    require 'register.php';
?>

<div class="popup" id="popup">
    <form class="login" action="" method="post">
        <table align="center">
            <tr>
                <td align="right"> Username </td>
                <td> <center>:</center></td>
                <td align="left"><input type="text" maxlength="15" name="username" required></td>
            </tr>
            <tr>
                <td align="right">Password</td>
                <td> <center>:</center></td>
                <td align="left"><input type="password" maxlength="15" name="password" required></td>
            </tr>
            <tr>
                <td align="center" colspan="3" style="padding-top: 10px;">
                        <button type="submit" name="login" class="inLoginButton"><a> Login </a></button>
                        <button class="inLoginButton"> <a href="">Batalkan</a></button>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center" id="regist_btn">
                Belum punya akun? <a href=# onclick=loggingPop()> Daftar Sekarang </a></td>
            </tr>
        </table>
    </form>
</div>
<?php
    if(isset($_POST['register'])){
        ?>
            <script type="text/javascript">
                document.getElementById('popup2').style.display = 'flex';
                document.getElementById('popup').style.display = 'none';
            </script>
    <?php    
    }
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $rows = $db->query("SELECT * FROM user
                                WHERE username = '$username'
                                OR email='$username'");

        $account = mysqli_fetch_array($rows);

        if(isset($account['tipe_akun'])){
            if(password_verify($password, $account['password'])){
                //$_SESSION['login'] = $account['jenis'];
    
                ?>
                <script>
                    alert('Selamat Datang <?php $username ?>');
                    document.location.href = '';
                    </script>";
                <?php    
            }
            else{
                ?>

                <script>
                    alert('Username atau Password salah');
                </script>"
                <?php
            }
        }
        else{
            ?>
            <script>
                alert('Username atau Password salah')
            </script>"
            <?php
        }

    }
?>