<?php

$id = $_SESSION['id'];
$id_doswal = $_SESSION['id_doswal'];

$query = "INSERT INTO surat_rekomendasi VALUES('', $id, $id_doswal, 'Menunggu', 'Menunggu')";
$result = mysqli_query($koneksi, "INSERT INTO surat_rekomendasi VALUES('', $id, $id_doswal, 'Menunggu', 'Menunggu')");
    if( $result > 0){
                echo "
                    <script>
                        alert('Pengajuan Surat Rekomendasi Berhasil! Silakan tunggu konfirmasi lebih lanjut.');
                        document.location.href = 'index.php';
                    </script>";
                }