<?php
 $id_user = $_GET['id'];
 $query = "SELECT t1.*, t2.*, t3.* FROM tb_mahasiswa t1, tb_program t2, tb_jurusan t3 WHERE t1.id_user = $id_user AND t1.id_Program = t2.id_program AND t3.id_jurusan = t1.id_jurusan";
 $mhs = mysqli_query($koneksi,$query);
 $data_mhs = mysqli_fetch_array($mhs);

if( isset($_POST['submit'])) {
    $id_pa = $_POST['dosen_pa'];
    
    $query = "UPDATE tb_mahasiswa SET id_pa = $id_pa WHERE id_user = $id_user";
    $result = mysqli_query($koneksi, $query);
    if( $result > 0){
                echo "
                    <script>
                        alert('Berhasil memilihkan Dosen Pembimbing.');
                        document.location.href = '?page=PilihDosenPembimbing';
                    </script>";
                }
}
?>


<!-- START: Content -->
<div class="container">

    <div class="card mt-4 mb-4">
        <h5 class="card-header d-flex flex-row align-items-center justify-content-between">
            <a>Memilihkan Dosen Pembimbing</a>
            <a href="?page=Pelanggan" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-chevron-left fa-sm fa-fw"></i>
            </a>
        </h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa</label>
                        <input type="text" maxlength="50" class="form-control" name="nama" id="nama"
                            value="<?=$data_mhs['nama_user']?>" disabled autofocus>
                    </div>
                    <!-- <div class="custom-file">
                            <label for="image">Foto Profil Mahasiswa</label>
                            <input type="file" class="form-control-file" name="image" id="image" disabled>
                            <small>Max size is 3MB</small>
                        </div> -->
                </div>
                <!-- <div class="col">
                        <img id="imagePreview" class="mb-4" height="150px" width="150px" alt="">
                        <script type="text/javascript">
                            document.getElementById("image").onchange = function() {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                // Get loaded data and render thumbnail.
                                document.getElementById("imagePreview").src = e.target.result;
                            };
                            // Read the image file as a data URL.
                            reader.readAsDataURL(this.files[0]);
                        };
                    </script>
                </div> -->
            </div>
            <div class="form-group">
                <label for="nim">Username/NIM</label>
                <input type="text" maxlength="30" class="form-control" name="nim" id="nim" value="<?=$data_mhs['nim']?>"
                    disabled>
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <input type="text" maxlength="30" class="form-control" name="semester" id="semester"
                    value="<?=$data_mhs['tingkat']?>" disabled>
            </div>
            <div class="form-group">
                <label for="semester">Jurusan</label>
                <input type="text" maxlength="30" class="form-control" name="semester" id="semester"
                    value="<?=$data_mhs['Jurusan']?>" disabled>
            </div>
            <div class="form-group">
                <label for="status_mahasiswa">Program MBKM yang Dijalani </label>
                <input type="text" maxlength="30" class="form-control" name="status_mhs" id="status_mhs"
                    value="<?=$data_mhs['nama_program']?>" disabled>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="dosenPembimbing">Dosen Pembimbing: </label>
                    <select name="dosen_pa" id="dosen_pa" class="form-select" aria-label="Default select example">
                        <option selected value="">PIlih Dosen Pembimbing</option>
                        <?php $query = "SELECT * FROM tb_pa"; ?>
                        <?php $result = mysqli_query($koneksi, $query); ?>
                        <?php foreach($result as $data) : ?>
                        <option value="<?=$data['id_pa']?>"><?=$data['nama_pa']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class=" card-footer text-center">
                    <button type="reset" class="btn btn-danger mr-2"><i class="fas fa-undo"></i> Reset</button>
                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- END: Content -->