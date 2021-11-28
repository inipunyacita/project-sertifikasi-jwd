<?php

require_once 'koneksi.php';
$id = $_GET['id'];
$query = $conn->query("DELETE FROM tb_user WHERE id_user = '$id'");
$query2 = $conn->query("DELETE FROM tb_regissiswa WHERE id_user = '$id'");

if ($query & $query2) {
    echo "<script>
        alert('Data akun siswa berhasil dihapus');
        window.location.href = 'data-akun-siswa.php';
    </script>";
}
