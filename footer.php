	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	    aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>
	            <div class="modal-body">Pilih "Keluar" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.
	            </div>
	            <div class="modal-footer">
	                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
	                <a class="btn btn-primary" href="logout.php">Keluar</a>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	    aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Update Status MBKM </h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	                Pilih progress status MBKM Anda
	                <form action="" method="POST">
	                    <select class="form-select" aria-label="Default select example" name="idStatus" id="idStatus">
	                        <option selected value="">Pilih Status</option>
	                        <option value="2">Diterima</option>
	                        <option value="3">Ditolak</option>
	                        <option value="4">Selesai</option>
	                    </select>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	                <button class="btn btn-primary" name="update">Lapor</button>
	                </form>
	                <?php
					if(isset($_POST['update'])) {
						$id_status = $_POST['idStatus'];
						$id_user = $_SESSION['id_user'];
						$nim = $_SESSION['nim'];

						$sql = "UPDATE tb_mahasiswa SET id_status = $id_status WHERE nim = $nim";
						$result = mysqli_query($koneksi, $sql);
						if($result > 0) {
							?><script>
	                alert('Berhasil mengupdate status MBKM.');
	                document.location.href = 'index.php';
	                </script>"; <?php
	                }
	                }
	                ?>
	            </div>
	        </div>
	    </div>
	</div>


	</body>
	<!-- Asset -->
	<script src="asset/vendor/jquery-3.5.1/jquery-3.5.1.min.js"></script>
	<script src="asset/vendor/bootstrap-4.5.3/js/bootstrap.min.js"></script>
	<script src="asset/vendor/datatables-b4/datatables.min.js"></script>

	<script src="asset/js/demo.js"></script>
	<script src="asset/js/main.js"></script>
	</script>

	</html>