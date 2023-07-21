<?php

$id_user = $_GET['id'];

$query = "UPDATE surat_rekomendasi SET acc_dosen = 'Ditolak' WHERE id_user = $id_user";
$result = mysqli_query($koneksi, $query);
    if( $result > 0){
                echo "
                    <script>
                        alert('Berhasil menolak Pengajuan Surat Rekomendasi.');
                        document.location.href = 'index.php?page/SuratRekomendasiAdmin';
                    </script>";
                }