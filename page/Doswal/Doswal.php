<!-- START: Content -->
<div class="container">

    <div class="card mt-4 mb-4">
        <div class="card-header">
            <h5>Dosen Wali</h5>
        </div>
        <div class="card-body">
            <!-- START: Button -->
            <div class="d-flex justify-content-start mb-4">
                <a href="?page=TambahDosen" type="button" class="btn btn-sm btn-primary mr-3"><i
                        class="fas fa-plus fa-sm text-white"></i>Tambah Data Dosen</a>
                <!-- <a href="page/Dosen/laporanDosen.php" target="_blank" type="button"
                    class="btn btn-sm btn-info mr-3"><i class="fas fa-download fa-sm text-white"></i> Hasilkan PDF</a> -->
            </div>
            <!-- END: Button -->
            <table id="dataTables" class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Dosen</th>
                        <th>Email</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php $query = "SELECT * FROM tb_doswal";?>
                    <?php $result = mysqli_query($koneksi, $query); ?>
                    <?php foreach($result as $data) : ?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?= $data['nip_doswal']; ?></td>
                        <td><?= $data['nama_doswal']; ?></td>
                        <td><?= $data['email']; ?></td>
                        <td>
                            <a href="?page=EditDosen&id=<?php echo $data['id_doswal']; ?>">
                                <span class="fas fa-edit"></span>
                            </a>
                            &nbsp;&nbsp;
                            <?php 
                $nip = $data['nip_doswal'];
                $result = viewDatas("SELECT * FROM tb_doswal WHERE nip_doswal = '$nip'");
                if ( count($result) > 0 ) { ?>
                            <a href="#" onclick="return confirm('Data sedang digunakan');">
                                <span class="fas fa-trash"></span>
                                <?php } else { ?>
                                <a href="?page=HapusDosen&id=<?php echo $data['id_doswal']; ?>"
                                    onclick="return confirm('Yakin ingin hapus <?= $data['nama']; ?>');">
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