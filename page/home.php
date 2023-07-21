<?php
// error_reporting(E_ERROR | E_PARSE);
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
    $nim = $user['nim'];
    }
  
    /* MENAMPILKAN DATA UTAMA */
    $query = "SELECT * from view_homepage ORDER BY status ASC, tingkat ASC, nama_user ASC";
?>

<!-- Awal Isi Halaman -->
<div class="container container-fluid">
    <!-- START: Category -->
    <?php if ($_SESSION['role'] == 'admin') { ?>
    <div class="card mt-4 mb-4">
        <div class="card-body">
            <h5 class="card-title">Dashboard</h5>
            <div class="row">

                <div class="col-md">
                    <div class="card text-white bg-warning" style="max-width: 18rem;">
                        <div class="card-body">
                            <h1 class="card-title d-flex align-items-center justify-content-between">
                                <i class="fas fa-users"></i>
                                <span class="text-right"><?= numData("tb_mahasiswa"); ?></span>
                            </h1>
                            <p class="card-text">Jumlah Mahasiswa Total</p>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="card text-white bg-primary" style="max-width: 18rem;">
                        <div class="card-body">
                            <h1 class="card-title d-flex align-items-center justify-content-between">
                                <i class="fas fa-user-check"></i>
                                <span
                                    class="text-right"><?= mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE id_status = '2'")); ?></span>
                            </h1>
                            <p class="card-text">Jumlah Mahasiswa Aktif MBKM</p>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="card text-white bg-danger" style="max-width: 18rem;">
                        <div class="card-body">
                            <h1 class="card-title d-flex align-items-center justify-content-between">
                                <i class="fas fa-envelope"></i>
                                <span
                                    class="text-right"><?= mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM surat_rekomendasi WHERE acc_prodi = 'Menunggu'")); ?></span>
                            </h1>
                            <p class="card-text">Surat Rekomendasi Menunggu Persetujuan</p>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="card text-white bg-info" style="max-width: 18rem;">
                        <div class="card-body">
                            <h1 class="card-title d-flex align-items-center justify-content-between">
                                <i class="fas fa-user"></i>
                                <span
                                    class="text-right"><?= mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_doswal")); ?></span>
                            </h1>
                            <p class="card-tesxt">Jumlah Dosen Wali</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php } ?>

    <?php 
    if ($_SESSION['role'] == 'doswal') {
        ?>
    <div class="card mt-4 mb-4">
        <div class="col-md">
            <div class="card text-white bg-danger" style="max-width: 18rem;">
                <div class="card-body">
                    <h1 class="card-title d-flex align-items-center justify-content-between">
                        <i class="fas fa-thumbs-up"></i>
                        <span
                            class="text-right"><?= mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM surat_rekomendasi WHERE acc_dosen = 'Menunggu' AND id_doswal = $id")); ?></span>
                    </h1>
                    <p class="card-text">Surat Rekomendasi Menunggu Persetujuan</p>
                </div>
            </div>
        </div>
    </div>
    <?php    
    }
    ?>

    <!-- END: Category -->

    <!-- PENGAJUAN SURAT REKOMENDASI -->
    <?php if(($_SESSION['role'] == "mahasiswa")) {
        $mbkm = mysqli_query($koneksi, "SELECT t1.*, t2.*, t3.* FROM tb_mahasiswa t1, surat_rekomendasi t2, tb_status t3 WHERE nim = $nim AND t1.id_user = t2.id_user AND t1.id_status = t3.id_status");
        $mhs = mysqli_fetch_assoc($mbkm);
        if(isset(($mhs['Id_program'])))  {
        // Jika sudah memiliki id_program (tandanya sudah daftar mbkm)
        echo "<div class='mt-4 mb-4'>"; ?>
    <h3>Status kamu saat ini:
        <?php if ($mhs['status'] == "Selesai") { ?>
        <span class='text-success'><?php }  
        else if ($mhs['status'] == "Aktif") {?>
            <span class='text-primary'><?php }  
        else if ($mhs['status'] == "Ditolak") {?>
                <span class='text-danger'>
                    <?php }else { ?>
                    <span class='text-info'>
                        <?php } ?>
                        <?= $mhs['status']?>
                    </span>
    </h3>
    <?php if(($mhs['id_status'] == 1)){
        echo "<p>Berikan update kepada kami jika proses pendaftaran Anda mendapatkan progress.</p> ";
    } ?>

    <?php if(($mhs['id_status'] == 3)){
    echo "<p>Tetap semangat!</p> ";
    } ?>

    <?php if(($mhs['id_pa'] == NULL ) && ($mhs['status'] == "Aktif")){
        echo "<p>Dosen Pembimbing Akademik Anda belum ditunjuk oleh prodi. Prodi akan melakukan pemilihan secepatnya.</p> ";
        echo "<p class= 'text-info mt-0'>Jika prodi sudah memilih, data informasi MBKM Anda akan muncul pada tabel.</p>";
    } ?>

    <?php if ($mhs['status'] != "Selesai") { ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Update Status MBKM
    </button>
    <?php } else {?>
    <p class="text-success">Selamat Anda telah menyelesaikan program MBKKM Anda!</p>
    <?php 
    $status_konversi = mysqli_query($koneksi, "SELECT * FROM tb_matkul_konversi WHERE nim = $nim");
    if (mysqli_num_rows($status_konversi) > 0) {
        ?>
    <p class="text-success">Anda sudah berhasil memilih mata kuliah yang ingin dikonversikan.</p>
    <?php
    } else {
    ?>
    <p class="mb-0">Silakan pilih mata kuliah yang ingin dikonversikan.</p>
    <a href="?page=PilihMatkulKonversi" type="button" class="btn btn-primary">
        Pilih Mata Kuliah
    </a>
    <?php } ?>
</div>
<?php
    }} else {
        // Jika belum memiliki id program
        $mbkm = mysqli_query($koneksi, "SELECT t1.*, t2.* FROM tb_mahasiswa t1, surat_rekomendasi t2 WHERE nim = $nim AND t1.id_user = t2.id_user");
        $mhs = mysqli_fetch_assoc($mbkm);
            if((isset($mhs['acc_dosen']))) {
                echo "<div class='mt-4 mb-4'>"; ?>
<h3>Status Ajuan Surat Rekomendasi kamu saat ini: </h3>
<p>Persetujuan Dosen Wali:
    <?php if ($mhs['acc_dosen'] == "Diterima") { ?>
    <span class='text-success'><?php }  
        else if ($mhs['acc_dosen'] == "Menunggu") {?>
        <span class='text-info'><?php }  
        else { ?>
            <span class='text-danger'>
                <?php } ?>
                <?= $mhs['acc_dosen']?>
            </span>
</p>
<p>Persetujuan Prodi:
    <?php if ($mhs['acc_prodi'] == "Diterima") { ?>
    <span class='text-success'><?php }  
        else if ($mhs['acc_prodi'] == "Menunggu") {?>
        <span class='text-info'><?php }  
        else { ?>
            <span class='text-danger'>
                <?php } ?>
                <?= $mhs['acc_prodi']?>
            </span>
</p>
<?php if (($mhs['acc_dosen'] == "Diterima") && ($mhs['acc_prodi'] == "Diterima")) { ?>
<p class="my-3"> Kamu sudah dipersilakan untuk mendaftar program MBKM yang ingin kamu pilih. Jika sudah,
    <strong>mohon
        lapor kepada
        kami</strong>.
    <a href='?page=PilihProgram' type='button' class='btn btn-sm btn-primary mr-3 mt-2'>Lapor Program MBKM yang
        didaftar</a>
    <?php }

} else {
echo "<div class='mt-4 mb-4'>";
    echo "<h3> Ingin mendaftar untuk mengikuti program MBKM? </h3>";
    ?>
    <a href='?page=PengajuanSuratRekomendasi' type='button' class='btn btn-sm btn-primary mr-3'
        onclick='return confirm("Ajukan Surat Rekomendasi sebagai <?= $mhs["nama_user"]?> dengan NIM <?= $mhs["nim"]?> ?")'>
        Ajukan Surat Rekomendasi</a>
    <?php
    }}}
    ?>

    <!-- <?php if(($_SESSION['role'] == "mahasiswa")) {
    $mbkm = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE nim = $nim");
    $mhs = mysqli_fetch_assoc($mbkm);
    if(($mhs['Id_program'] != NULL )){
    echo "<div class='mt-4 mb-4'>";
        echo "<h3>Status kamu saat ini</h3>";
        ?>
<?php
    }
}
    ?> -->
    <!-- START: Button -->

    <!-- END: Button -->

    <!-- START: Data listMahasiswa Terakhir -->
<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">List Mahasiswa Mengikuti Program MBKM</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Mahasiswa</th>
                    <th>Semester</th>
                    <th>Program</th>
                    <th>Jurusan</th>
                    <th>Dosen Pembimbing</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    $listMahasiswa = viewDatas($query); ?>
                <?php foreach($listMahasiswa as $data) : ?>
                <?php if ($data['nama_user'] == $nama) {
                        echo "<tr class='table-info'>";
                        } else {
                        echo "<tr>";
                        } 
                    ?>
                <td><?= $no++  ?></td>
                <td><?= $data['nama_user']; ?></td>
                <td><?= $data['tingkat']; ?></td>
                <td><?= $data['nama_program']; ?></td>
                <td><?= $data['jurusan']; ?></td>
                <td><?= $data['nama_pa']; ?></td>
                <td>
                    <?php 
							if ( $data['status'] == "Ditolak" ) {
								echo "<span class='badge badge-pill badge-danger'>Ditolak</span>";
							} else if($data['status'] == "Selesai") {
								echo "<span class='badge badge-pill badge-success'>Selesai</span>";
							} else if($data['status'] == "Aktif") {
								echo "<span class='badge badge-pill badge-primary'>Aktif</span>";
							} else {
								echo "<span class='badge badge-pill badge-info'>Tahap Seleksi</span>";
                            }
						    ?>
                    &nbsp;&nbsp;
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- END: Data listMahasiswa Terakhir -->

</div>
<!-- Akhir Isi Halaman -->