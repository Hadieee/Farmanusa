<?php
    require "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div>
    <section class="home">
        <table id='login_form' border=1>
            <br>
            <tr>
                <td class='tbtext' width=49%>Username</td>
                <td class='tbtext'>:</td>
                <td class='tbinput' widrh=49%><input type="text" name="username"/></td>
            </tr>
            <tr>
                <td class='tbtext'>Password</td>
                <td class='tbtext'>:</td>
                <td class='tbinput'><input type="password" name="password"/></td>
            </tr>
            <tr>
                <td colspan="3" align="center"><input type="submit"
                    value="Login"> </td>
            </tr>
        </table>
    </section>
    </div>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>