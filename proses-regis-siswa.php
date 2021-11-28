<?php

session_start();

include_once("koneksi.php");

$nama = $_POST['nama'];
$nisn = $_POST['nisn'];
$un = $_POST['nilaiun'];
$uas = $_POST['nilaiuas'];
$alamat = $_POST['alamat'];
$asal = $_POST['asalsekolah'];
$id_user = $_POST['iduser'];

$sql = "INSERT INTO tb_regissiswa(nama_siswa, nisn, nilai_un, nilai_uas, alamat,asal_sekolah,id_user) VALUES ('$nama','$nisn','$un', '$uas', '$alamat', '$asal', '$id_user')";
$query = mysqli_query($conn, $sql);
if ($query) {
    $sql2 = "UPDATE tb_user
    SET status_regis = 1
    WHERE id_user = $id_user";
    $query2 = mysqli_query($conn, $sql2);
    echo "<script>
        alert('Data Siswa berhasil ditambahkan');
        window.location.href = 'status-siswa.php';
    </script>";
}
