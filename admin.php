<?php
require_once 'koneksi.php';
session_start();
if (!isset($_SESSION["role"])) {
    echo "<script>
            alert('Silahkan log in terlebih dahulu!');
            window.location.href = 'login.php';
        </script>";
} else {
    if ($_SESSION["role"] != 1) {
        echo "<script>
            alert('Silahkan log in sebagai user terlebih dahulu!');
            window.location.href = 'user.php';
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
    <title>Admin - Trisma</title>
</head>

<body>
    <div class="user-page">
        <div class="row" id="row-user">
            <div class="col-md-3 bg-primary shadow p-4" id="left-side">
                <nav class="nav flex-column">
                    <a href="#" class="navbar-brand" id="logo">PSB TRISMA</a>
                    <hr style="background-color: white;">
                    <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
                    <a class="nav-link" href="data-siswa.php">Data Calon Siswa</a>
                    <a class="nav-link" href="data-akun-siswa.php">Akun Calon Siswa</a>
                    <a class="nav-link" href="logoutadmin.php">Logout</a>
                </nav>
            </div>
            <div class="col-md-9 p-4" id="right-side">
                <h1>Welcome to halaman admin</h1>
            </div>
        </div>
    </div>
    <!-- boostrap section -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>