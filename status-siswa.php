<?php
require_once 'koneksi.php';
session_start();
$id_user = $_SESSION['iduser'];
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
$sql = "SELECT * 
FROM tb_regis INNER JOIN tb_regissiswa 
ON tb_regissiswa.id_status = tb_regis.id_status
WHERE id_user = $id_user";
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
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>NISN</td>
                                <td>Nilai UN</td>
                                <td>Nilai UAS</td>
                                <td>Alamat</td>
                                <td>Asal Sekolah</td>
                                <td>Status</td>
                                <td>Bukti Registrasi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $data = mysqli_query($conn, $sql);

                            while ($datatable = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <td><?= $datatable['nama_siswa'] ?></td>
                                    <td><?= $datatable['nisn'] ?></td>
                                    <td><?= $datatable['nilai_un'] ?></td>
                                    <td><?= $datatable['nilai_uas'] ?></td>
                                    <td><?= $datatable['alamat'] ?></td>
                                    <td><?= $datatable['asal_sekolah'] ?></td>
                                    <td><?= $datatable['status_siswa'] ?></td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- boostrap section -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>