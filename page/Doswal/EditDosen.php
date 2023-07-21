<?php
        $nip_doswal = $_GET['id'];
        $data = mysqli_query($koneksi, "SELECT t1.*, t2.* FROM tb_doswal t1, mahasiswa t2 WHERE t1.nim = t2.nim AND t1.nim = $nim_mhs");
        $data_dosen = mysqli_fetch_assoc($data);

	if( isset($_POST['submit'])) {
    $nip_doswal			= addslashes($_POST['nip_doswal']);
    $nama_doswal       		= addslashes($_POST['nama']);
    $semester       	= addslashes($_POST['semester']);
    $password      		= mysqli_real_escape_string($koneksi, $_POST['password']);
    $email       		= stripslashes($_POST['email']);   

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
    $query 	= "UPDATE tb_doswal SET nip_doswal = $nip_doswal, nama_doswal = $nama_doswal, email = '$email' WHERE nip_doswal = $nip_doswal";
    $result = mysqli_query($koneksi, $query);
    if( $result > 0){
                echo "
                    <script>
                        alert('Data berhasil ditambahkan');
                        document.location.href = '?page=mahasiswa';
                    </script>";
                }
			} else {
				echo "
					<script>
						alert('Data gagal ditambahkan');
						document.location.href = '?page=mahasiswa';
					</script>";
			}
	
?>


<!-- START: Content -->
<div class="container">

    <div class="card mt-4 mb-4">
        <h5 class="card-header d-flex flex-row align-items-center justify-content-between">
            <a>Ubah Data Dosen Wali</a>
            <a href="?page=Pelanggan" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-chevron-left fa-sm fa-fw"></i>
            </a>
        </h5>
        <div class="card-body">

            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="nama">Nama Dosen Wali</label>
                            <input type="text" maxlength="50" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan Nama Mahasiswa" required autofocus>
                        </div>
                        <!-- <div class="custom-file">
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
                <div class="container">

                    <div class="card mt-4 mb-4">
                        <h5 class="card-header d-flex flex-row align-items-center justify-content-between">
                            <a>Sunting Data Mahasiswa</a>
                            <a href="?page=Pelanggan" role="button" id="dropdownMenuLink" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fas fa-chevron-left fa-sm fa-fw"></i>
                            </a>
                        </h5>
                        <div class="card-body">

                            <form method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="nama">Nama Dosen Wali</label>
                                            <input type="text" maxlength="50" class="form-control" name="nama" id="nama"
                                                placeholder="Masukkan Nama Dosen Wali"
                                                value="<?=$data_dosen['nama_mhs']?>" required autofocus>
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
                                    <label for="nim">Username/NIP</label>
                                    <input type="text" maxlength="30" class="form-control" name="nip_doswal"
                                        id="nip_doswal" placeholder="NIM" value="<?=$data_dosen['nip_doswal']?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" maxlength="16" class="form-control" name="password"
                                        id="password" placeholder="Password" value="<?=$data_dosen['password']?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="repeat_password">Repeat Password</label>
                                    <input type="password" maxlength="16" class="form-control" name="repeat_password"
                                        id="repeat_password" placeholder="Repeat Password"
                                        value="<?=$data_dosen['password']?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" maxlength="200" class="form-control" name="email" id="email"
                                        placeholder="Email" value="<?=$data_dosen['email']?>" required>
                                    <div class="card-footer text-center">
                                        <button type="reset" class="btn btn-danger mr-2"><i class="fas fa-undo"></i>
                                            Reset</button>
                                        <button type="submit" name="submit" class="btn btn-success"><i
                                                class="fas fa-save"></i>
                                            Save</button>
                                    </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- END: Content -->