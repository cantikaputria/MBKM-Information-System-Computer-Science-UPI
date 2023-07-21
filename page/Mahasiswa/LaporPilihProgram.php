<?php
$id_program = $_GET["id_program"];
$id = $_SESSION['id'];
$nim = $_SESSION['nim'];

$query = "UPDATE tb_mahasiswa SET id_program = $id_program, id_status = 1 WHERE id_user = $id AND nim = $nim";
$result = mysqli_query($koneksi, $query);
    if( $result > 0){
                echo "
                    <script>
                        alert('Berhasil melapor kepada prodi.');
                        document.location.href = 'index.php';
                    </script>";
                }