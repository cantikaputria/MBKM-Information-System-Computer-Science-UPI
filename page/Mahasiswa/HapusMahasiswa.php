<?php

$id_user = $_GET['id'];

$q1 = "SELECT * FROM tb_mahasiswa WHERE id_user = '$id_user'";
$result = mysqli_query($koneksi, $q1);
$mhs = mysqli_fetch_array($result);
$nim = $mhs['nim'];

$qhapus = "DELETE FROM tb_mahasiswa WHERE nim = $nim";
$hapus = mysqli_query($koneksi, $qhapus);
    if( $hapus > 0){
                echo "
                    <script>
                        alert('Berhasil menghapus akun mahasiswa.');
                        document.location.href = '?page=Mahasiswa';
                    </script>";
                }