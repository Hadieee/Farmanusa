<div class="popup2" id="popup2">
    <form class="register" action="" method="post">
        <table align="center">
            <tr>
                <td align="left">Email:</td>
            </tr>
            <tr>
                <td colspan="2" align="left"><input type="text" maxlength="15" 
                value = "<?php echo isset($_POST['register'])? $_POST['email'] : ''?>"
                name="email"
                required></td>
            </tr>
            <tr>
                <td colspan="2" align="left" class="CheckInp" style='color:red'> </td>
            </tr>
            <tr>
                <td align="left">Username:</td>
            </tr>
            <tr>
                <td align="left"><input type="text" maxlength="15"
                value = "<?php echo isset($_POST['register'])? $_POST['username_reg'] : ''?>"
                name="username_reg" required></td>
            </tr>
            <tr>
                <td colspan="2" align="left" class="CheckInp" style='color: red'></td>
            </tr>
            <tr>
                <td align="left">Password:</td>
            </tr>
            <tr>
                <td align="left"><input type="password" maxlength="15"
                name="password_reg" required></td>
            </tr>
            <tr>
                <td align="left">Konfirmasi Password:</td>
            </tr>
            <tr>
                <td align="left"><input type="password" maxlength="15" name="password_konf" required></td>
            </tr>
            <tr>
                <td colspan="2" align="left" class="CheckInp" style="color:red"></td>
            </tr>
            <tr>
                <td align="center" colspan="2" id="registerButtons">
                        <button type="submit" name="register" class="inLoginButton"><a> Daftar </a></button>
                        <button class="inLoginButton"><a href=""> Batalkan </a> </button>
                </td>
            </tr>
        </table>
    </form>
</div>

<div>
    <?php
        if(isset($_POST['register'])){
            $email = $_POST['email'];
            $username = $_POST['username_reg'];
            $password = $_POST['password_reg'];
            $konf_password = $_POST['password_konf'];
            $fail = false;
    
            // cek username telah digunakan atau belom
            $user = $db->query("SELECT * FROM user WHERE username='$username'");
            if(mysqli_num_rows($user) > 0 || $password != $konf_password){
                $fail = true;
            ?>
         
                <script type="text/javascript">
                    var change = document.getElementsByClassName('CheckInp');
                    change[1].innerHTML = "Username Sudah Ada";
                </script>
            <?php
            }

            $user = $db->query("SELECT * FROM user WHERE email='$email'");
            if(mysqli_num_rows($user) > 0){
                $fail = true;
            ?>

                    <script type="text/javascript">
                        var change = document.getElementsByClassName('CheckInp');
                        change[0].innerHTML = "Email Sudah Digunakan";
                    </script>
            <?php
            }
            if($password != $konf_password){
                $fail = true;
            ?>

                    <script type="text/javascript">
                        var change = document.getElementsByClassName('CheckInp');
                        change[2].innerHTML = "Password Berbeda";
                    </script>
            <?php
            }
    
            if($fail == false){
                // konfirmasi password uda bener atau belom
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO user VALUES ('$email', '$username', '$password', 'user')";
                $result = $db->query($query);
                unset($_POST['register']);
                ?>
                <script type="text/javascript">
                    alert(" Registrasi Berhasil ");
                    document.getElementById('popup2').style.display = 'none';
                </script>
                <?php
                }
        }
        ?>
</div>