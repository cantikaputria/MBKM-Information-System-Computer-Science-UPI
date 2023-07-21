<?php
    $nim_mhs = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT t1.*, t2.* FROM tb_mahasiswa t1, mahasiswa t2 WHERE t1.nim = t2.nim AND t1.nim = $nim_mhs");
    $data_mhs = mysqli_fetch_assoc($data);


	if( isset($_POST['submit'])) {
    $nim       			= addslashes($_POST['nim']);
    $nama       			= addslashes($_POST['nama']);
    $semester       			= addslashes($_POST['semester']);
    $jurusan       			= addslashes($_POST['jurusan']);
    $password      		= mysqli_real_escape_string($koneksi, $_POST['password']);
    $repeat_password	= mysqli_real_escape_string($koneksi, $_POST['repeat_password']);
    $email       			= stripslashes($_POST['email']);
    $tanggal_lahir       			= $_POST['tanggal_lahir'];
    // $alamat       			= addslashes($_POST['alamat']);
    $jenis_kelamin       			= addslashes($_POST['jenis_kelamin']);
    // $jumlah_sks      			= $_POST['jumlah_sks'];
    // $ipk       			= $_POST['ipk'];
    $status_mhs       			= addslashes($_POST['status_mhs']);
    $id_doswal       			=  $_POST['doswal'];
    

    // Upload image
    // $image = uploadImage('upload/mahasiswa');
    // if ( !$image ) {
    //   return false;
    // }

    // Konfirmasi password
    if ( $password !== $repeat_password ) {
      echo "
				<script>
					alert('Password Tidak sesuai');
				</script>";
      return false;
    }

    // Mengedit data mahasiswa
		$query 	= "UPDATE mahasiswa SET nim = $nim, nama_mhs = $nama, email = '$email', tanggal_lahir = '$tanggal_lahir', jns_kelamin = $jenis_kelamin, status_mhs = '$status_mhs' WHERE nim = $nim_mhs";
        $result = mysqli_query($koneksi, $query);
		if( $result > 0){
		    $query 	= "UPDATE tb_mahasiswa SET  nama_user = '$nama', password ='$password', nim = '$nim', 'tingkat = $semester', id_doswal = '$id_doswal', id_jurusan = $jurusan WHERE nim = $nim_mhs";
            $result = mysqli_query($koneksi, $query);
            if( $result > 0){
                echo "
                    <script>
                        alert('Data berhasil diubah');
                        document.location.href = '?page=mahasiswa';
                    </script>";
                }
			} else {
				echo "
					<script>
						alert('Data gagal diubah');
						document.location.href = '?page=mahasiswa';
					</script>";
			}
	}
?>


<!-- START: Content -->
<div class="container">

    <div class="card mt-4 mb-4">
        <h5 class="card-header d-flex flex-row align-items-center justify-content-between">
            <a>Sunting Data Mahasiswa</a>
            <a href="?page=Pelanggan" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-chevron-left fa-sm fa-fw"></i>
            </a>
        </h5>
        <div class="card-body">

            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="nama">Nama Mahasiswa</label>
                            <input type="text" maxlength="50" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan Nama Mahasiswa" value="<?=$data_mhs['nama_mhs']?>" required
                                autofocus>
                        </div>
                        <!-- <div class=" custom-file">
                            <label for="image">Foto Profil Mahasiswa</label>
                            <input type="file" class="form-control-file" name="image" id="image" required>
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
                    <input type="text" maxlength="30" class="form-control" name="nim" id="nim" placeholder="NIM"
                        value="<?=$data_mhs['nim']?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" maxlength="16" class="form-control" name="password" id="password"
                        placeholder="Password" value="<?=$data_mhs['password']?>" required>
                </div>
                <div class="form-group">
                    <label for="repeat_password">Repeat Password</label>
                    <input type="password" maxlength="16" class="form-control" name="repeat_password"
                        id="repeat_password" placeholder="Repeat Password" value="<?=$data_mhs['password']?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" maxlength="200" class="form-control" name="email" id="email" placeholder="Email"
                        value="<?=$data_mhs['email']?>" required>
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="text" maxlength="30" class="form-control" name="semester" id="semester"
                        placeholder="Semester" value="<?=$data_mhs['tingkat']?>" required>
                </div>
                <div class="form-group">
                    <label for="jurusan">Program Studi</label>
                    <select name="jurusan" id="jurusan" class="form-select" aria-label="Default select example">
                        <?php $query = "SELECT * FROM tb_jurusan"; ?>
                        <?php $result = mysqli_query($koneksi, $query); ?>
                        <?php foreach($result as $data) : ?>
                        <option value="<?=$data['Id_jurusan']?>"> <?=$data['Jurusan']?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="doswal">Dosen Wali</label>
                    <select name="doswal" id="doswal" class="form-select" aria-label="Default select example">
                        <option selected value="">PIlih Dosen Wali</option>
                        <?php $query = "SELECT * FROM tb_doswal"; ?>
                        <?php $result = mysqli_query($koneksi, $query); ?>
                        <?php foreach($result as $data) : ?>
                        <option value="<?=$data['id_doswal']?>"><?=$data['nama_doswal']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki">
                        <label class="form-check-label" for="Laki-laki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                        <label class="form-check-label" for="Perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" maxlength="30" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                        placeholder="nim" required>
                </div>
                <div class="form-group">
                    <label for="status_mahasiswa">Status Mahasiwa</label>
                    <input type="text" maxlength="30" class="form-control" name="status_mhs" id="status_mhs"
                        placeholder="Status Mahasiswa" required>
                </div>
                <div class="card-footer text-center">
                    <button type="reset" class="btn btn-danger mr-2"><i class="fas fa-undo"></i> Reset</button>
                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- END: Content -->