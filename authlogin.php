<?php

session_start();

require_once "koneksi.php";

$email = $_POST['email'];
$pass = $_POST['pass'];

$login = mysqli_query($conn, "SELECT * FROM tb_user WHERE email='$email' AND pass='$pass'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    $_SESSION['iduser'] = $data['id_user'];
    if ($data['role'] == 1) {
        // buat session login admin
        $_SESSION['role'] = 1;
        echo "<script>
            alert('Sukses login sebagai admin');
            window.location.href = 'admin.php';
        </script>";
    } else if ($data['role'] == 0) {
        // buat session login user
        $_SESSION['role'] = 0;
        echo "<script>
            alert('Sukses login sebagai user');
            window.location.href = 'user.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal untuk login!');
            window.location.href = 'login.php';
        </script>";
    }
} else {
    echo "<script>
            alert('Email atau password salah!');
            window.location.href = 'login.php';
        </script>";
}
