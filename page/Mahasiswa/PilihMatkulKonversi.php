<?php 
$id = $_SESSION['id'];
$data = mysqli_query($koneksi, "SELECT nim, id_program FROM tb_mahasiswa WHERE id_user = '$id'");
$data_mhs = mysqli_fetch_assoc($data);
$id_program = $data_mhs['id_program'];
$nim_mhs = $data_mhs['nim'];

if( isset($_POST['submit'])) {
    if(!empty($_POST['matkul_konversi'])) {
        foreach($_POST['matkul_konversi'] as $id_matkul) {
            $query = "INSERT INTO tb_matkul_konversi VALUES('', '$nim_mhs', '$id_matkul')";
            $result = mysqli_query($koneksi, $query);
        }
            if($result > 0) {
                $check_sks = mysqli_query($koneksi, "SELECT SUM(sks_matkul) as jumlah_sks FROM view_matkul_konversi WHERE nim = '$nim_mhs'");
                $jumlah_sks = mysqli_fetch_assoc($check_sks);
                if($jumlah_sks['jumlah_sks'] <= 20) {
                    echo "
                    <script>
                        alert('Berhasil memilih mata kuliah yang ingin dikonversikan!');
                        document.location.href = 'index.php';
                    </script>";
                } else {
                    $delete_sks = mysqli_query($koneksi, "DELETE FROM tb_matkul_konversi WHERE nim = '$nim_mhs'");
                    echo "
                    <script>
                        alert('Gagal memilih mata kuliah yang ingin dikonversikan karena total SKS lebih dari 20 SKS.');
                        document.location.href = '?page=PilihMatkulKonversi';
                    </script>";
                } 
            }
        }
    }


?>

<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title m-b-0">Mata Kuliah yang dapat dikonversikan</h5>
                    <i>(Mata kuliah yang dapat dipilih mengacu berdasarkan program MBKM yang telah Anda selesaikan)</i>
                    <br>
                    <i class="text-danger">*Dapat mengonversikan maksimal 20 SKS</i>
                </div>
                <div class="table-responsive table-bordered">
                    <form action="" method="post">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th scope=" col">Kode Mata Kuliah</th>
                                    <th scope="col">Nama Mata Kuliah</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Jumlah SKS</th>
                                    <th scope="col">Dosen Pengampu</th>
                                    <th scope="col">| |</th>
                                </tr>
                            </thead>
                            <tbody class="customtable">
                                <?php 
                            $query = "SELECT t1.*, t2.*, t3.*, t4.* FROM tb_matkul_program t1, tb_mata_kuliah t2, tb_program t3, tb_dosen_pengampu t4  WHERE t1.id_program = '$id_program' AND t1.id_program = t3.id_program AND t1.id_matkul = t2.id_matkul AND t2.id_dosen_pengampu = t4.id_dosen_pengampu";
                            $data_matkul = viewDatas($query); ?>
                                <?php foreach($data_matkul as $data) : ?>
                                <tr>

                                    <td><?= $data['kode_matkul']?></td>
                                    <td><?= $data['nama_matkul']?></td>
                                    <td><?= $data['semester_matkul']?></td>
                                    <td><?= $data['sks_matkul']?></td>
                                    <td><?= $data['nama_dosen_pengampu']?></td>
                                    <td>
                                        <label class="customcheckbox m-b-20">
                                            <input type="checkbox" name="matkul_konversi[]"
                                                value="<?= $data['id_matkul']?>">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i>
                            Kirim Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>