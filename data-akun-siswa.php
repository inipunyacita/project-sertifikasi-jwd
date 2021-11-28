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
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE role = 0");
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
                    <a class="nav-link active" aria-current="page" href="user.php">Home</a>
                    <a class="nav-link" href="data-siswa.php">Data Calon Siswa</a>
                    <a class="nav-link" href="data-akun-siswa.php">Akun Calon Siswa</a>
                    <a class="nav-link" href="logoutadmin.php">Logout</a>
                </nav>
            </div>
            <div class="col-md-9 p-4" id="right-side">
                <h1>Data akun siswa</h1>
                <h6>List akun pendaftar calon siswa SMA Negeri 3 Denpasar</h6>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <td>No</td>
                                <td>Nama Akun</td>
                                <td>Email</td>
                                <td>Password</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $data = $query;

                            while ($datatable = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <td><?= $datatable['nama'] ?></td>
                                    <td><?= $datatable['email'] ?></td>
                                    <td><?= $datatable['pass'] ?></td>
                                    <td>
                                        <a href="admin-edit-akun.php?id=<?= $datatable['id_user'] ?>" class="btn btn-warning m-1">Edit</a>
                                        <a href="delete-akun.php?id=<?= $datatable['id_user'] ?>" class="btn btn-danger m-1">Delete</a>
                                    </td>
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