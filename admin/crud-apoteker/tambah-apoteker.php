<?php
    require '../../db-connect.php';
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
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
        $query = "INSERT INTO user VALUES ('$email', '$username', '$password', 'apoteker')";
        $result = $db->query($query);
        unset($_POST['register']);
        ?>
        <script type="text/javascript">
            alert(" Registrasi Berhasil ");
            document.location.href = '../apoteker.php';
        </script>
        <?php
        }
?>