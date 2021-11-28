<?php

session_start();

require_once 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$nisn = $_POST['nisn'];
$un = $_POST['nilaiun'];
$uas = $_POST['nilaiuas'];
$alamat = $_POST['alamat'];
$asal = $_POST['asalsekolah'];
$status = $_POST['status'];

$query = "UPDATE tb_regissiswa SET nama_siswa='$nama', nisn='$nisn', 
          nilai_un='$un', nilai_uas='$uas', alamat='$alamat', asal_sekolah='$asal', id_status='$status' WHERE id_regissiswa=$id";

$hasil = mysqli_query($conn, $query);

if ($hasil) {
    echo "<script>
        alert('Data Siswa berhasil di Update');
        window.location.href = 'data-siswa.php';
    </script>";
}
