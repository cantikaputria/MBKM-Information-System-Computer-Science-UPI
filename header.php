<?php
	// Menampilkan nama user
    $nama = "";
    if($_SESSION['role'] == "admin") {
        $id = $_SESSION['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin = '$id'");
    $user = mysqli_fetch_assoc($result);
    $nama = $user['nama'];
    }
    else if ($_SESSION['role'] == "doswal") {
        $id = $_SESSION['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM tb_doswal WHERE id_doswal = '$id'");
    $user = mysqli_fetch_assoc($result);
    $nama = $user['nama_doswal'];
    }
    else if ($_SESSION['role'] == "mahasiswa") {
        $id = $_SESSION['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE id_user = '$id'");
    $user = mysqli_fetch_assoc($result);
    $nama = $user['nama_user'];
    }
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBKM CS UPI</title>

    <link rel="shortcut icon" href="asset/img/upi-logo.png" type="image/x-icon">

    <!-- Boostrap 4 -->
    <link rel="stylesheet" href="asset/vendor/bootstrap-4.5.3/css/bootstrap.min.css">
    <!-- Font Awesome free-->
    <link rel="stylesheet" href="asset/vendor/fontawesome/css/all.min.css">
    <!-- Datatables with style bootstrap 4 -->
    <link rel="stylesheet" href="asset/vendor/datatables-b4/datatables.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="asset/img/upi-logo.png" width="30" height="30" alt="">
            MBKM CS UPI
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item ml-3">
                    <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home<span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link" href="?page=Program"><i class="fas fa-flag"></i> Program</a>
                </li>
                <?php if($_SESSION['role'] == "admin") { ?>
                <li class="nav-item ml-3">
                    <a class="nav-link" href="?page=Mahasiswa"><i class="fas fa-users"></i> Mahasiswa</a>
                </li>

                <li class="nav-item ml-3">
                    <a class="nav-link" href="?page=Doswal"><i class="fas fa-user"></i> Dosen</a>
                </li>

                <li class="nav-item ml-3">
                    <a class="nav-link " href="?page=SuratRekomendasiAdmin"><i class="fas fa-envelope"></i> Surat
                        Rekomendasi</a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link " href="?page=PilihDosenPembimbing"><i class="fas fa-thumbs-up"></i> Atur Dosen
                        Pembimbing</a>
                </li>
                <?php } ?>
                <?php if($_SESSION['role'] == "doswal") { ?>
                <li class="nav-item ml-3">
                    <a class="nav-link " href="?page=SuratRekomendasiDoswal"><i class="fas fa-thumbs-up"></i> Surat
                        Rekomendasi</a>
                </li>
                <?php } ?>
            </ul>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline"><?= $nama ?></span>
                    </a>

                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="?page=Profil">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profil
                        </a>
                        <a class="dropdown-item" href="?page=UbahPassword">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Ubah Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Keluar
                        </a>
                    </div>
                </li>
            </ul>

        </div>
    </nav>