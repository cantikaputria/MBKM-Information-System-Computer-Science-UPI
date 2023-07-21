<?php
    $query = "SELECT * from tb_program";
?>
<div class="container container-fluid">
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">List Program MBKM</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Program</th>
                        <th>Nama Program</th>
                        <th>Deskripsi</th>
                        <th>Jumlah Konversi SKS</th>
                        <th>Semester Minimal</th>
                        <th>Durasi Program</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $listProgram = viewDatas($query); ?>
                    <?php foreach($listProgram as $data) : ?>
                    <td><?= $no++  ?></td>
                    <td><?= $data['kode_program']; ?></td>
                    <td><?= $data['nama_program']; ?></td>
                    <td><?= $data['deskripsi']; ?></td>
                    <td><?= $data['jmlh_konversi_sks']; ?></td>
                    <td><?= $data['semester_min']; ?></td>
                    <td><?= $data['durasi_program']; ?></td>
                    <td>
                        <a href="?page=LaporPilihProgram&id_program=<?php echo $data['id_program']; ?>"
                            class="btn btn-info"
                            onclick='return confirm("Lapor kepada prodi bahwa <?= $mhs["nama_user"]?> dengan NIM <?= $mhs["nim"]?> telah mendaftar program <?= $data["nama_program"] ?>?")'>Pilih</a>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>