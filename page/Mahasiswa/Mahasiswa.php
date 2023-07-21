<!-- START: Content -->
<div class="container">

    <div class="card mt-4 mb-4">
        <div class="card-header">
            <h5>Mahasiswa</h5>
        </div>
        <div class="card-body">
            <!-- START: Button -->
            <div class="d-flex justify-content-start mb-4">
                <a href="?page=TambahMahasiswa" type="button" class="btn btn-sm btn-primary mr-3"><i
                        class="fas fa-plus fa-sm text-white"></i> Tambah Data Mahasiswa</a>
                <!-- <a href="page/Mahasiswa/laporanMahasiswa.php" target="_blank" type="button"
                    class="btn btn-sm btn-info mr-3"><i class="fas fa-download fa-sm text-white"></i> Hasilkan PDF</a> -->
            </div>
            <!-- END: Button -->
            <table id="dataTables" class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                        <th>Status Mahasiswa</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php $query = "SELECT t1.*, t2.*, t3.* FROM mahasiswa t1, tb_mahasiswa t2, tb_jurusan t3 WHERE t1.nim = t2.nim AND t2.Id_jurusan = t3.Id_jurusan"; ?>
                    <?php $result = mysqli_query($koneksi, $query); ?>
                    <?php foreach($result as $data) : ?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?= $data['nim']; ?></td>
                        <td><?= $data['nama_mhs']; ?></td>
                        <td><?= $data['email']; ?></td>
                        <td><?= $data['Jurusan']; ?></td>
                        <td><?= $data['status_mhs']; ?></td>
                        <td>
                            <a href="?page=EditMahasiswa&id=<?php echo $data['nim']; ?>">
                                <span class="fas fa-edit"></span>
                            </a>
                            &nbsp;&nbsp;
                            <?php 
                $nim = $data['nim'];
                $result = viewDatas("SELECT * FROM `mahasiswa` WHERE nim = '$nim'");
                if ( count($result) > 0 ) { ?>
                            <a href="?page=HapusMahasiswa&id=<?php echo $data['id_user']; ?>"
                                onclick="return confirm('Apakah yakin ingin menghapus akun mahasiswa atas nama <?= $data['nama_mhs']; ?>?');">
                                <span class="fas fa-trash"></span>
                                <?php } ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- END: Content -->