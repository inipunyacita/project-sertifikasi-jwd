<?php

session_start();

include_once("koneksi.php");

$nama = $_POST['nama'];
$email = $_POST['email'];
$pass = $_POST['pass'];

// query tb cust 
$query = "INSERT INTO `tb_user`(`nama`, `email`, `pass`) VALUES ('$nama','$email','$pass')";
$query = mysqli_query($conn, $query);
if ($query) {
    echo "<script>
            alert('Selamat, registrasi akun anda berhasil');
            window.location.href = 'login.php';
        </script>";
}
