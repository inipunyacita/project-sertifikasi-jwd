<?php

require_once 'koneksi.php';
$id = $_GET['id'];
$query = $conn->query("DELETE FROM tb_regissiswa WHERE id_regissiswa = '$id'");

if ($query) {
    echo "<script>
        alert('Data siswa berhasil dihapus');
        window.location.href = 'data-siswa.php';
    </script>";
}
