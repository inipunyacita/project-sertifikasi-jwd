<?php

session_start();

require_once 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$query = "UPDATE tb_user SET nama='$nama', email='$email', 
          pass='$pass' WHERE id_user=$id";

$hasil = mysqli_query($conn, $query);

if ($hasil) {
    if ($_SESSION['role'] == 1) {
        echo "<script>
        alert('Data akun siswa berhasil di Update');
        window.location.href = 'data-akun-siswa.php';
    </script>";
    } else {
        echo "<script>
        alert('Akun user berhasil di Update');
        window.location.href = 'user.php';
    </script>";
    }
}
