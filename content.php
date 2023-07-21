<?php 
  switch (@$_GET['page']) {

		// Mahasiswa
    case 'Mahasiswa':
			include 'page/Mahasiswa/Mahasiswa.php';
			break;
		case 'TambahMahasiswa':
			include 'page/Mahasiswa/tambahMahasiswa.php';
			break;
		case 'HapusMahasiswa':
			include 'page/Mahasiswa/HapusMahasiswa.php';
			break;
		case 'EditMahasiswa':
			include 'page/Mahasiswa/EditMahasiswa.php';
			break;
		case 'PengajuanSuratRekomendasi':
			include 'page/Mahasiswa/PengajuanSuratRekomendasi.php';
			break;
		case 'PilihProgram':
			include 'page/Mahasiswa/PilihProgram.php';
			break;
		case 'LaporPilihProgram':
			include 'page/Mahasiswa/LaporPilihProgram.php';
			break;
		case 'PilihMatkulKonversi':
			include 'page/Mahasiswa/PilihMatkulKonversi.php';
			break;

		// Doswal
		case 'Doswal':
			include 'page/Doswal/Doswal.php';
			break;
		case 'TambahDosen':
			include 'page/Doswal/TambahDosen.php';
			break;
		case 'SuratRekomendasiDoswal':
			include 'page/Doswal/SuratRekomendasiDoswal.php';
			break;
		case 'TerimaSuratRekomendasiDoswal':
			include 'page/Doswal/TerimaSuratRekomendasiDoswal.php';
			break;
		case 'TolakSuratRekomendasiDoswal':
			include 'page/Doswal/TolakSuratRekomendasiDoswal.php';
			break;

		// Admin
		case 'SuratRekomendasiAdmin':
			include 'page/Admin/SuratRekomendasiAdmin.php';
			break;
		case 'Program':
			include 'page/Admin/Program.php';
			break;
		case 'PilihDosenPembimbing':
			include 'page/Admin/PilihDosenPembimbing.php';
			break;
		case 'AturDosenPembimbing':
			include 'page/Admin/AturDosenPembimbing.php';
			break;
		case 'TerimaSuratRekomendasiAdmin':
			include 'page/Admin/TerimaSuratRekomendasiAdmin.php';
			break;
		case 'TolakSuratRekomendasiAdmin':
			include 'page/Admin/TolakSuratRekomendasiAdmin.php';
			break;	

    default :
      include 'page/home.php';
      break;
  }
?>