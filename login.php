<?php
require_once 'koneksi.php';
session_start();
if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] == 0) {
        echo "<script>
            alert('Silahkan log out dari user terlebih dahulu!');
            window.location.href = 'user.php';
        </script>";
    } else {
        echo "<script>
            alert('Silahkan log out dari admin terlebih dahulu!');
            window.location.href = 'admin.php';
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
    <link rel="stylesheet" href="css/style.css">
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login PSB - SMA N 3 Denpasar</title>
</head>

<body>
    <div class="container-login d-flex justify-content-center align-items-center">
        <div class="login-content card shadow">
            <div class="other d-flex justify-content-center">
                <label for=""><a href="index.php"> Beranda</a></label>
            </div>
            <h3><b>LOGIN PSB Trisma</b></h3>
            <hr>
            <form action="authlogin.php" method="post">
                <div class="row">
                    <div class="form-label"><b>Email :</b></div>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="email" id="email" required>
                </div><br>
                <div class="row">
                    <div class="form-label"><b>Password :</b></div>
                </div>
                <div class="row mb-4">
                    <input type="password" class="form-control" name="pass" id="pass" required>
                </div>
                <div class="other">
                    <label for="">Belum daftar ? klik <a href="regis.php" class="belum-daftar"> Disini</a></label><br>
                </div>
                <div class="row">
                    <button type="submit" name="login" class="btn btn-warning mt-2"><b>LOGIN</b></button>
                </div><br>
            </form>
        </div>
    </div>
    <!-- boostrap section -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>