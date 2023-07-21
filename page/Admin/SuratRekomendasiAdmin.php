<?php
    $id = $_SESSION['id'];
?>

<!-- START: Content -->
<div class="container">
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <h5>List Pengajuan Surat Rekomendasi</h5>
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
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $query1 =  mysqli_query($koneksi, "SELECT b.id_user, b.nama_user, b.nim, b.tingkat, c.jurusan FROM surat_rekomendasi a, tb_mahasiswa b, tb_jurusan c WHERE a.id_user = b.id_user AND b.id_jurusan = c.id_jurusan AND a.acc_prodi = 'Menunggu'");
                    while ($data = mysqli_fetch_array($query1)) { ?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?= $data['nim']; ?></td>
                        <td><?= $data['nama_user']; ?></td>
                        <td><?= $data['tingkat']; ?></td>
                        <td><?= $data['jurusan']; ?></td>
                        <td>
                            <a href="?page=TerimaSuratRekomendasiAdmin&id=<?php echo $data['id_user']?>"
                                class="btn btn-success">Terima</a>
                            <a href="?page=TolakSuratRekomendasiAdmin&id=<?php echo $data['id_user']?>"
                                class="btn btn-danger">Tolak</a>
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