<?php
    $id = $_SESSION['id'];
?>

<!-- START: Content -->
<div class="container">
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <h5>List Mahasiswa Aktif MBKM Belum Memiliki Dosen Pembimbing</h5>
        </div>
        <div class="card-body">
            <!-- START: Button -->
            <!-- <div class="d-flex justify-content-start mb-4">
                <a href="?page=Tambahsurat" type="button" class="btn btn-sm btn-primary mr-3"><i
                        class="fas fa-plus fa-sm text-white"></i> Tambah Data</a>
                <a href="page/surat/laporansurat.php" target="_blank" type="button"
                    class="btn btn-sm btn-info mr-3"><i class="fas fa-download fa-sm text-white"></i> Hasilkan PDF</a>
            </div> -->
            <!-- END: Button -->
            <table id="dataTables" class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Semester</th>
                        <th>Jurusan</th>
                        <th>Program</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $query1 =  mysqli_query($koneksi, "SELECT t1.nim, t1.nama_user, t1.tingkat, t2.jurusan, t3.nama_program FROM tb_mahasiswa t1, tb_jurusan t2, tb_program t3 WHERE t1.id_pa IS NULL AND t1.id_status = 2 AND t1.id_jurusan = t2.id_jurusan AND t3.id_program = t1.id_program");
                    while ($data = mysqli_fetch_array($query1)) { ?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?= $data['nim']; ?></td>
                        <td><?= $data['nama_user']; ?></td>
                        <td><?= $data['tingkat']; ?></td>
                        <td><?= $data['jurusan']; ?></td>
                        <td><?= $data['nama_program']; ?></td>
                        <td>
                            <a type="button" class="btn btn-primary"
                                href='?page=AturDosenPembimbing&id=<?= $data["id_user"]?>'>
                                Pilihkan Dosen
                            </a>
                            <!-- <a href="?page=TolakSuratRekomendasiAdmin" class="btn btn-danger">Tolak</a> -->
                        </td>
                        <td> &nbsp;&nbsp; </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- END: Content -->