<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>PSB Online - SMAN 3 Denpasar</title>
</head>

<body>
    <header>
        <div class="container">
            <!-- navbar start -->
            <div class="row d-flex justify-content-between mb-5" id="navbar">
                <div class="col-md-6">
                    <!-- logo -->
                    <nav class="navbar navbar-light navbar-expand-md d-flex justify-content-between">
                        <a href="#" class="navbar-brand" id="logo">PSB TRISMA</a>
                        <button class="navbar-toggler" id="btn-menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </nav>
                </div>
                <!-- navmenu -->
                <div class="col-md-6 d-flex justify-content-end text-end" id="navmenu">
                    <nav class="navbar navbar-light navbar-expand-md">
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a href="index.php" class="nav-link">Beranda</a>
                                <a href="#" class="nav-link">Tentang</a>
                                <a href="#" class="nav-link">Informasi</a>
                                <a href="regis.php" class="nav-link" class="btn btn-warning" id="btn-daftar">Daftar</a>
                                <a href="login.php" class="btn btn-warning">Login</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- content start -->
    <div class="content">
        <div class="container">
            <div class="regis-content">
                <center>
                    <h3>Registrasi Akun PSB Trisma</h3>
                    <span id="subtitle">Silahkan daftar akun terlebih dahulu untuk melakukan pendaftaran sekolah</span><br><br>
                    <hr style="width : 50%"><br>
                </center>
                <div class="row">
                    <div class="col-md-6">
                        <form action="proses-regis.php" method="post" class="form-regis">
                            <div class="mb-3">
                                <label for="" class="form-label">Nama :</label>
                                <input type="name" class="form-control" id="name" name="nama" placeholder="Masukan nama anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email :</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password :</label>
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Masukan password anda" required>
                            </div>
                            <button type="submit" class="btn btn-secondary" style="width: 100%;">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-6 mt-3 d-flex justify-content-center">
                        <img src="assets/img/regis.svg" alt="" srcset="" width="85%" height="85%">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            copyright 2021 by Citananta
        </div>
    </footer>
    <!-- boostrap section -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>