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
$id = $_GET['id'];
$sql = "SELECT * 
FROM tb_regis INNER JOIN tb_regissiswa 
ON tb_regissiswa.id_status = tb_regis.id_status
WHERE id_regissiswa = $id
";
$query = mysqli_query($conn, $sql);
$querystatus = mysqli_query($conn, "SELECT * FROM tb_regis");
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
                <h1>Edit data siswa</h1>
                <h6>Edit Data Calon Siswa SMA Negeri 3 Denpasar</h6>
                <hr>
                <!-- form edit -->
                <form action="proses-edit-siswa.php" method="post" class="form-regis-siswa">
                    <?php
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama :</label>
                            <input type="text" class="form-control" id="name" name="nama" value="<?php echo $data['nama_siswa'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">NISN :</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $data['nisn'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nilai UN :</label>
                            <input type="text" class="form-control" id="nilaiun" name="nilaiun" value="<?php echo $data['nilai_un'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nilai UAS :</label>
                            <input type="text" class="form-control" id="nilaiun" name="nilaiuas" value="<?php echo $data['nilai_uas'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Alamat :</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Asal Sekolah :</label>
                            <input type="text" class="form-control" id="asalsekolah" name="asalsekolah" value="<?php echo $data['asal_sekolah'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <fieldset disabled="disabled">
                                <label for="" class="form-label">Asal Sekolah :</label>
                                <input type="text" class="form-control" id="iduser" name="iduser" value="<?php echo $data['id_user'] ?>">
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status :</label>
                            <select class="form-select" name="status">
                                <?php foreach ($querystatus as $datastatus) { ?>
                                    <?php if ($data['id_status'] == $datastatus['id_status']) { ?>
                                        <option value="<?= $datastatus['id_status'] ?>" selected><?= $datastatus['status_siswa'] ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $datastatus['id_status'] ?> "><?= $datastatus['status_siswa'] ?></option>
                                    <?php }  ?>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?= $id ?>">
                    <?php } ?>
                    <button type="submit" class="btn btn-secondary" style="width: 100%;">EDIT</button>
                </form>
            </div>
        </div>
    </div>
    <!-- boostrap section -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>