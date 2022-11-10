<?php
    require 'register.php';
    
?>

<div class="popup" id="popup">
    <form class="login" action="" method="post">
        <table align="center">
            <tr>
                <td align="right">Username</td>
                <td> <center>:</center></td>
                <td align="left"><input type="text" maxlength="15" name="username"></td>
            </tr>
            <tr>
                <td align="right">Password</td>
                <td> <center>:</center></td>
                <td align="left"><input type="password" maxlength="15" name="password"></td>
            </tr>
            <tr>
                <td align="center" colspan="3" style="padding-top: 10px;">
                        <button type="submit" value="Login" class="inLoginButton"> <a href=""> Login </a> </button>
                        <button class="inLoginButton"> <a href=""> Batalkan </a></button>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center" id="regist_btn">
                Belum punya akun? <a onclick=loggingPop()> Daftar Sekarang </a></td>
            </tr>
        </table>
    </form>
</div>
