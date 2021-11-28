<?php
require_once 'koneksi.php';
session_start();
$id_user = $_SESSION['iduser'];
$sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user = $id_user");
$data = mysqli_fetch_assoc($sql);
if (isset($_SESSION['iduser'])) {
    if ($data['status_regis'] == 0) {
        if (!isset($_SESSION["role"])) {
            echo "<script>
                    alert('Silahkan log in terlebih dahulu!');
                    window.location.href = 'login.php';
                </script>";
        } else {
            if ($_SESSION["role"] != 0) {
                echo "<script>
                    alert('Silahkan log in sebagai user terlebih dahulu!');
                    window.location.href = 'admin.php';
                </script>";
            }
        }
    } else {
        echo "<script>
                    alert('Anda telah melakukan pendaftaran sebagai calon siswa SMA N 3 Denpasar');
                    window.location.href = 'status-siswa.php';
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
    <title>Calon Siswa Baru - Trisma</title>
</head>

<body>
    <div class="user-page">
        <div class="row" id="row-user">
            <div class="col-md-3 bg-primary shadow p-4" id="left-side">
                <nav class="nav flex-column">
                    <a href="#" class="navbar-brand" id="logo">PSB TRISMA</a>
                    <hr style="background-color: white;">
                    <a class="nav-link active" aria-current="page" href="user.php">Home</a>
                    <a class="nav-link" href="regis-siswa.php">Daftar Siswa</a>
                    <a class="nav-link" href="status-siswa.php">Status Daftar</a>
                    <a class="nav-link" href="akun-siswa.php">Akun</a>
                    <a class="nav-link" href="logoutuser.php">Logout</a>
                </nav>
            </div>
            <div class="col-md-9 p-4" id="right-side">
                <h4>Daftar Siswa Baru <br></h4>
                <h3>SMA Negeri 3 Denpasar</h3>
                <hr>
                <form action="proses-regis-siswa.php" method="post" class="form-regis-siswa">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama :</label>
                        <input type="text" class="form-control" id="name" name="nama" placeholder="Masukan nama siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">NISN :</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukan NISN siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nilai UN :</label>
                        <input type="text" class="form-control" id="nilaiun" name="nilaiun" placeholder="Masukan nilai Ujian Nasional siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nilai UAS :</label>
                        <input type="text" class="form-control" id="nilaiun" name="nilaiuas" placeholder="Masukan nilai Ujian Akhir Sekolah siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat :</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan alamat siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Asal Sekolah :</label>
                        <input type="text" class="form-control" id="asalsekolah" name="asalsekolah" placeholder="Masukan asal sekolah siswa" required>
                    </div>
                    <input type="hidden" name="iduser" value="<?= $id_user ?>">
                    <button type="submit" class="btn btn-secondary" style="width: 100%;">DAFTAR</button>
                </form>
            </div>
        </div>
    </div>
    <!-- boostrap section -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>