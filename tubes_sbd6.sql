-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 09:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_sbd6`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_mhs` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jns_kelamin` varchar(20) NOT NULL,
  `jumlah_sks` int(11) DEFAULT NULL,
  `status_mhs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nim`, `nama_mhs`, `email`, `tanggal_lahir`, `alamat`, `jns_kelamin`, `jumlah_sks`, `status_mhs`) VALUES
(1, '2100846', 'Rafly Putra Santoso', 'rafly_putra_santoso@gmail.com', '2002-12-28', 'Bandung', 'Laki-laki', 2, 'Aktif'),
(2, '2100137', 'Muhamad Nur Yasin Amadudin', 'muhamad_nur_yasin_amadudin@gmail.com', '2002-01-02', 'Bandung', 'Laki-laki', 2, 'Aktif'),
(3, '2100187', 'Muhammad Hilmy Rasyad Sofyan', 'muhammad_hilmy_rasyad_sofyan@gmail.com', '2002-01-04', 'Bandung', 'Laki-laki', 2, 'Aktif'),
(4, '2100192', 'Muhammad Rayhan Nur', 'muhammad_rayhan_nur@gmail.com', '2002-02-03', 'Bekasi', 'Laki-laki', 2, 'Aktif'),
(5, '2100195', 'Davin Fausta Putra Sanjaya', 'davin_fausta_putra_sanjaya@gmail.com', '2002-02-01', 'Bandung', 'Laki-laki', 2, 'Aktif'),
(6, '2100901', 'Azzahra Siti Hadjar', 'azzahra_siti_hadjar@gmail.com', '2002-04-03', 'Bandung', 'Perempuan', 2, 'Aktif'),
(7, '2100991', 'Khana Yusdiana', 'khana_yusdiana@gmail.com', '2002-04-15', 'Makassar', 'Perempuan', 2, 'Aktif'),
(8, '2102159', 'Virza Raihan Kurniawan', 'virza_raihan_kurniawan@gmail.com', '2003-09-26', 'Bekasi', 'Laki-laki', 2, 'Aktif'),
(9, '2102671', 'Anderfa Jalu Kawani', 'anderfa_jalu_kawani@gmail.com', '2002-05-28', 'Lembang', 'Laki-laki', 2, 'Aktif'),
(10, '2103727', 'Cantika Putri Arbiliansyah', 'cantika_putri_arbiliansyah@gmail.com', '2002-06-30', 'Bandung', 'Perempuan', 2, 'Aktif'),
(11, '2105673', 'Alghaniyu Naufal Hamid', 'alghaniyu_naufal_hamid@gmail.com', '2002-06-12', 'Bekasi', 'Laki-laki', 2, 'Aktif'),
(12, '2108061', 'Achmad Fauzan', 'achmad_fauzan@gmail.com', '2003-07-13', 'Bandung', 'Laki-laki', 2, 'Aktif'),
(13, '2102204', 'Mohamad Asyqari Anugrah', 'mohamad_asyqari_anugrah@gmail.com', '2002-07-14', 'Bandung', 'Laki-laki', 2, 'Aktif'),
(14, '2102313', 'Muhammad Kaman Robbani', 'muhammad_kaman_robbani@gmail.com', '2002-08-23', 'Bandung', 'Laki-laki', 2, 'Aktif'),
(15, '2108927', 'Muhammad Fahru Rozi', 'muhammad_fahru_rozi@gmail.com', '2002-10-24', 'Bandung', 'Laki-laki', 2, 'Aktif'),
(23, '2100120', 'Bill Gates', 'billgates@gmail.com', '1997-06-04', 'Bandung', 'Laki-laki', 2, 'Aktif'),
(24, '2010284', 'Mark Zuckerberg', 'markzuck@gmail.com', '1998-03-09', 'Bandung', 'Laki-laki', 2, 'Aktif'),
(25, '14045', 'Contoh', 'contoh@gmail.com', '2000-05-23', 'Bandung', 'Laki-laki', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `surat_rekomendasi`
--

CREATE TABLE `surat_rekomendasi` (
  `id_surat` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_doswal` int(11) NOT NULL,
  `acc_dosen` varchar(255) DEFAULT NULL,
  `acc_prodi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_rekomendasi`
--

INSERT INTO `surat_rekomendasi` (`id_surat`, `id_user`, `id_doswal`, `acc_dosen`, `acc_prodi`) VALUES
(1, 6, 2, 'Terima', 'Terima'),
(2, 3, 2, 'Menunggu', 'Menunggu'),
(4, 2, 1, 'Menunggu', 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen_pengampu`
--

CREATE TABLE `tb_dosen_pengampu` (
  `id_dosen_pengampu` int(11) NOT NULL,
  `nama_dosen_pengampu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dosen_pengampu`
--

INSERT INTO `tb_dosen_pengampu` (`id_dosen_pengampu`, `nama_dosen_pengampu`) VALUES
(1, 'Budi Laksono Putro, MT'),
(3, 'Dr. Asep Wahyudin, S.Kom., M.T'),
(4, 'Dr. Ida Kaniawati, M.Si.'),
(5, 'Dr. Lala Septem Riza, M.T.'),
(6, 'Dr. Muhamad Nursalman, S.Si., M.T'),
(7, 'Dr. Rani Megasari, S.Kom., M.T.'),
(8, 'Dr. Rasim, M.T'),
(9, 'Dr. Wahyudin, M.T.'),
(10, 'Dr. Yudi Wibisono, M.T'),
(11, 'Drs. H. Heri Sutarno, M.T.'),
(12, 'Eddy Prasetyo Nugroho, M.T.'),
(13, 'Eki Nugraha, S.Pd., M.Kom.'),
(14, 'Erlangga, S.Kom, M.T.'),
(15, 'Erna Piantari, M.T.'),
(16, 'Nusuki Syariati Fathimah, S.Pd., M.Pd.'),
(17, 'Physical Education and Sports Lecturer Team'),
(18, 'Prof. DR. H. Munir, M. IT.'),
(19, 'Prof. Dr. Wawan Setiawan, M.Kom'),
(21, 'Rizky Rachman J, M.Kom'),
(22, 'Rosa Ariani Sukamto, M.T.'),
(23, 'Seminar for Islamic Education (SPAI) Lecturer Team'),
(24, 'Yaya Wihardi, M.Kom');

-- --------------------------------------------------------

--
-- Table structure for table `tb_doswal`
--

CREATE TABLE `tb_doswal` (
  `id_doswal` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nip_doswal` varchar(255) NOT NULL,
  `nama_doswal` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_doswal`
--

INSERT INTO `tb_doswal` (`id_doswal`, `email`, `nip_doswal`, `nama_doswal`, `password`) VALUES
(1, 'ani.anisyah@gmail.com', '920200419930811000', 'Ani Anisyah, S.Pd., M.T.', '67ABE'),
(2, 'yudi.wibisono.gmail.com', '197507072003121003', 'Dr. Yudi Wibisono, M.T.', '2JHS8');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ipk`
--

CREATE TABLE `tb_ipk` (
  `id_ipk` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nilai_ipk` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ipk`
--

INSERT INTO `tb_ipk` (`id_ipk`, `nim`, `nilai_ipk`) VALUES
(1, '2100846', 3.84),
(3, '2108061', 3.96);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `Id_jurusan` int(255) NOT NULL,
  `Jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`Id_jurusan`, `Jurusan`) VALUES
(1, 'Ilmu Komputer'),
(2, 'Pendidikan Ilmu Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `tingkat` int(255) NOT NULL,
  `id_doswal` int(11) NOT NULL,
  `Id_program` int(255) DEFAULT NULL,
  `Id_jurusan` int(11) NOT NULL,
  `Id_status` int(255) DEFAULT NULL,
  `id_pa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_user`, `nama_user`, `password`, `nim`, `tingkat`, `id_doswal`, `Id_program`, `Id_jurusan`, `Id_status`, `id_pa`) VALUES
(1, 'Rafly Putra Santoso', '6RF39F', '2100846', 5, 1, 12, 1, 1, 2),
(2, 'Muhamad Nur Yasin Amadudin', '5AC20B', '2100137', 6, 1, 4, 1, 1, 2),
(3, 'Muhammad Hilmy Rasyad Sofyan', '6CA34B', '2100187', 5, 1, 5, 2, 3, NULL),
(4, 'Muhammad Rayhan Nur', '4CB30F', '2100192', 7, 2, 5, 2, 2, 2),
(5, 'Davin Fausta Putra Sanjaya', '7BJ56D', '2100195', 6, 1, 5, 2, 3, NULL),
(6, 'Azzahra Siti Hadjar', '5GH89F', '2100901', 7, 1, 11, 2, 4, 2),
(7, 'Khana Yusdiana', '6JK23V', '2100991', 8, 2, 11, 2, 2, 2),
(8, 'Virza Raihan Kurniawan', '7YH12M', '2102159', 6, 1, 3, 1, 2, 2),
(9, 'Anderfa Jalu Kawani', '8UJ56K', '2102671', 5, 2, 10, 1, 2, 2),
(10, 'Cantika Putri Arbiliansyah', '7IJ12L', '2103727', 7, 1, 10, 1, 2, 2),
(11, 'Alghaniyu Naufal Hamid', '4EF34G', '2105673', 7, 2, 2, 2, 2, 2),
(12, 'Achmad Fauzan', '8IK67M', '2108061', 7, 1, 5, 2, 3, NULL),
(13, 'Mohamad Asyqari Anugrah', '5PL87J', '2102204', 7, 1, 12, 2, 2, 2),
(14, 'Muhammad Kamal Robbani', '7IK45N', '2102313', 8, 2, 8, 1, 3, NULL),
(15, 'Muhammad Fahru Rozi', '9IK09M', '2108927', 8, 1, 7, 2, 2, 2),
(18, 'Bill Gates', 'BLLGTS', '2100120', 5, 2, 4, 1, 2, 5),
(19, 'Mark Zuckerberg', 'FBFBFB', '2010284', 7, 2, NULL, 2, NULL, NULL),
(20, 'Contoh', 'contoh', '14045', 5, 2, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mata_kuliah`
--

CREATE TABLE `tb_mata_kuliah` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(11) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `sks_matkul` int(11) NOT NULL,
  `semester_matkul` int(11) NOT NULL,
  `id_dosen_pengampu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mata_kuliah`
--

INSERT INTO `tb_mata_kuliah` (`id_matkul`, `kode_matkul`, `nama_matkul`, `sks_matkul`, `semester_matkul`, `id_dosen_pengampu`) VALUES
(1, 'KU300', 'Seminar Pendidikan Agama Islam', 2, 5, 23),
(2, 'IK140', 'Bahasa Inggris', 2, 5, 23),
(3, 'IK150', 'Statistika', 2, 5, 23),
(4, 'IK430', 'E-Business', 2, 5, 23),
(5, 'IK120', 'Paradigma Pemrograman', 2, 5, 23),
(6, '-', 'MKKPS', 10, 5, 7),
(7, 'MA100', 'MSTR', 3, 6, 23),
(8, 'KU400', 'Kuliah Kerja Nyata', 2, 6, 23),
(9, 'IK420', 'Seminar', 2, 6, 23),
(10, 'IK180', 'Aljabar Linear dan Matriks', 2, 6, 23),
(11, 'IK227', 'Teknik Riset Operasi', 2, 6, 23),
(12, 'IK190', 'Etika Profesi Teknologi Informasi dan Komunikasi', 2, 6, 23),
(13, '--', 'MKKPS', 5, 6, 18),
(14, 'KU108', 'Pendidikan Jasmani dan Olahraga', 2, 7, 23),
(15, 'MA200', 'Aplikasi MSTR', 3, 7, 23),
(16, 'IK210', 'Metode Numerik', 2, 7, 23),
(17, 'IK410', 'Kewirausahaan Ilmu Komputer', 2, 7, 23),
(18, 'IK360', 'Kapita Selekta', 2, 7, 23),
(19, '---', 'MKKPS', 3, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul_konversi`
--

CREATE TABLE `tb_matkul_konversi` (
  `id_matkul` int(11) NOT NULL,
  `id_program` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_matkul_konversi`
--

INSERT INTO `tb_matkul_konversi` (`id_matkul`, `id_program`) VALUES
(1, 0),
(2, 2),
(2, 3),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(3, 3),
(3, 8),
(3, 10),
(3, 12),
(4, 2),
(4, 8),
(5, 5),
(5, 1),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(7, 0),
(8, 3),
(8, 6),
(8, 9),
(8, 10),
(8, 12),
(9, 10),
(10, 2),
(10, 8),
(10, 10),
(10, 5),
(10, 10),
(11, 11),
(12, 2),
(12, 5),
(12, 9),
(12, 10),
(12, 11),
(12, 12),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(13, 5),
(13, 6),
(13, 7),
(13, 8),
(13, 9),
(13, 10),
(13, 11),
(13, 12),
(14, 3),
(14, 6),
(14, 9),
(14, 12),
(15, 0),
(16, 2),
(16, 8),
(16, 10),
(17, 2),
(17, 6),
(17, 10),
(17, 12),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(18, 5),
(18, 6),
(18, 7),
(18, 8),
(18, 9),
(18, 10),
(18, 11),
(18, 12),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(19, 7),
(19, 8),
(19, 9),
(19, 10),
(19, 11),
(19, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul_yangdiambil_siswa`
--

CREATE TABLE `tb_matkul_yangdiambil_siswa` (
  `id_sks` int(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_matkul_yangdiambil_siswa`
--

INSERT INTO `tb_matkul_yangdiambil_siswa` (`id_sks`, `nim`, `id_matkul`) VALUES
(1, '2100192', 3),
(2, '2100192', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pa`
--

CREATE TABLE `tb_pa` (
  `id_pa` int(11) NOT NULL,
  `nip` varchar(40) NOT NULL,
  `password_pa` varchar(255) NOT NULL,
  `nama_pa` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jns_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pa`
--

INSERT INTO `tb_pa` (`id_pa`, `nip`, `password_pa`, `nama_pa`, `email`, `jns_kelamin`, `alamat`) VALUES
(2, '920200419941231000', 'andini', 'Andini Setya Arianti, S.Ds., M.Ds.', 'andini_setya_arianti@gmail.com', 'Perempuan', 'Bandung'),
(3, '920200419930811000', 'ani', 'Ani Anisyah, S.Pd., M.T.', 'ani_anisyah@gmail.com', 'Perempuan', 'Bandung'),
(4, '197112232006041000', 'asep', 'Dr. Asep Wahyudin, M.T.', 'asep_wahyudin@gmail.com', 'Laki-laki', 'Bandung'),
(5, '197909292006041000', 'nursalman', 'Dr. Muhammad Nursalman, M.T.', 'muhammad_nursalman@gmail.com', 'Laki-laki', 'Bandung'),
(6, '198705242014042000', 'rani', 'Dr. Rani Megasari, M.T.', 'rani_megasari@gmail.com', 'Perempuan', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_program`
--

CREATE TABLE `tb_program` (
  `id_program` int(11) NOT NULL,
  `kode_program` varchar(255) NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `deskripsi` varchar(1024) NOT NULL,
  `jmlh_konversi_sks` varchar(255) NOT NULL,
  `semester_min` varchar(255) NOT NULL,
  `durasi_program` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_program`
--

INSERT INTO `tb_program` (`id_program`, `kode_program`, `nama_program`, `deskripsi`, `jmlh_konversi_sks`, `semester_min`, `durasi_program`) VALUES
(1, 'MB-1', 'Bangkit by Google, Goto, Traveloka', 'Bangkit adalah program kesiapan karier yang didesain oleh Google untuk memberikan mahasiswa Indonesia paparan langsung dengan praktisi industri, serta mempersiapkan mahasiswa dengan keterampilan yang relevan untuk karir sukses di perusahaan teknologi terkemuka.', '20', '5', '6 Bulan'),
(2, 'MB-2', 'Indonesian International Student Mobility Awards', 'Mobilitas mahasiswa selama 1 semester di perguruan tinggi terbaik dunia.', '20', '5', '6 Bulan'),
(3, 'MB-3', 'Kampus Mengajar ', 'Membantu peningkatan kualitas dan pemerataan pendidikan dasar', '20', '5', '6 bulan'),
(4, 'MB-4', 'Kementrian ESDM-GERILYA', 'Studi Independen GERILYA (Gerakan Inisiatif Listrik Tenaga Surya) memanggil 50 mahasiswa eksakta dari perguruan tinggi di indonesia untuk turut bergabung mengasah skill dan mengembangkan kompetensi secara praktis di bidang energi bersih khususnya Solar Photovoltaic(PV)', '20', '5', '6 bulan'),
(5, 'MB-5', 'Magang ', 'Sambut karir masa depan dengan pengalaman kerja yang berharga ', '20', '5', '6 bulan '),
(6, 'MB-6', 'Membangun Desa (KKN Tematik)\r\n', 'Menyumbang gagasan solusi untuk isu-isu sosial', '20', '5', '6 bulan '),
(7, 'MB-7', 'Pejuang Muda Kampus Merdeka', 'Pejuang Muda adalah laboratorium sosial bagi para mahasiswa mengaplikasikan ilmu dan pengetahuannya untuk memberi dampak sosial secara konret.Melalui Program setara 20 SKS ini,mahasiswa ditantang untuk belajar dari warga sekaligus berkolaborasi dengan Pemerintah Daerah dan tokoh daerah setempat', '20', '5', '6 bulan'),
(8, 'MB-8', 'Pertukaran Mahasiswa Merdeka', 'Belajar lintas kampus dan lintas budaya', '20', '5', '6 bulan'),
(9, 'MB-9', 'Proyek Kemanusiaan ', 'Menyumbang gagasan solusi untuk isu-isu sosial', '20', '5', '6 bulan '),
(10, 'MB-10', 'Riset atau Penelitian ', 'Proyek penelitian di laboratorium pusat riset', '20', '5', '6 bulan '),
(11, 'MB-11', 'Studi Independen', 'Kuasai Ilmu aplikatif lintas jurusan dari para ahli di bidangnya', '20', '5 ', '6 bulan '),
(12, 'MB-12', 'Wirausaha', 'Mengembangkan usaha di bawah bimbingan profesional', '20', '5', '6 bulan ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`) VALUES
(1, 'Tahap seleksi '),
(2, 'Aktif'),
(3, 'Ditolak'),
(4, 'Selesai');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_homepage`
-- (See below for the actual view)
--
CREATE TABLE `view_homepage` (
`nama_user` varchar(255)
,`tingkat` int(255)
,`nama_program` varchar(255)
,`jurusan` varchar(255)
,`nama_pa` varchar(255)
,`status` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_list_matkul_program`
-- (See below for the actual view)
--
CREATE TABLE `view_list_matkul_program` (
`nama_matkul` varchar(255)
,`nama_program` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_sks`
-- (See below for the actual view)
--
CREATE TABLE `view_sks` (
`nim` varchar(255)
,`nama_mhs` varchar(225)
,`nama_matkul` varchar(255)
,`sks_matkul` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `view_homepage`
--
DROP TABLE IF EXISTS `view_homepage`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_homepage`  AS   (select `a`.`nama_user` AS `nama_user`,`a`.`tingkat` AS `tingkat`,`b`.`nama_program` AS `nama_program`,`c`.`Jurusan` AS `jurusan`,`e`.`nama_pa` AS `nama_pa`,`d`.`status` AS `status` from ((((`tb_mahasiswa` `a` join `tb_program` `b`) join `tb_jurusan` `c`) join `tb_status` `d`) join `tb_pa` `e`) where `a`.`Id_program` = `b`.`id_program` and `a`.`Id_jurusan` = `c`.`Id_jurusan` and `a`.`Id_status` = `d`.`id_status` and `a`.`id_pa` = `e`.`id_pa`)  ;

-- --------------------------------------------------------

--
-- Structure for view `view_list_matkul_program`
--
DROP TABLE IF EXISTS `view_list_matkul_program`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_list_matkul_program`  AS   (select `a`.`nama_matkul` AS `nama_matkul`,`b`.`nama_program` AS `nama_program` from ((`tb_mata_kuliah` `a` join `tb_program` `b`) join `tb_matkul_konversi` `c`) where `c`.`id_matkul` = `a`.`id_matkul` and `c`.`id_program` = `b`.`id_program`)  ;

-- --------------------------------------------------------

--
-- Structure for view `view_sks`
--
DROP TABLE IF EXISTS `view_sks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_sks`  AS   (select `a`.`nim` AS `nim`,`a`.`nama_mhs` AS `nama_mhs`,`b`.`nama_matkul` AS `nama_matkul`,`b`.`sks_matkul` AS `sks_matkul` from ((`tb_matkul_yangdiambil_siswa` `c` join `mahasiswa` `a`) join `tb_mata_kuliah` `b`) where `c`.`nim` = `a`.`nim` and `c`.`id_matkul` = `b`.`id_matkul`)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `surat_rekomendasi`
--
ALTER TABLE `surat_rekomendasi`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_user` (`id_user`,`id_doswal`),
  ADD KEY `idx_surat_id_doswal` (`id_doswal`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_dosen_pengampu`
--
ALTER TABLE `tb_dosen_pengampu`
  ADD PRIMARY KEY (`id_dosen_pengampu`);

--
-- Indexes for table `tb_doswal`
--
ALTER TABLE `tb_doswal`
  ADD PRIMARY KEY (`id_doswal`);

--
-- Indexes for table `tb_ipk`
--
ALTER TABLE `tb_ipk`
  ADD PRIMARY KEY (`id_ipk`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`Id_jurusan`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `Id_program` (`Id_program`),
  ADD KEY `Id_jurusan` (`Id_jurusan`),
  ADD KEY `Id_status` (`Id_status`),
  ADD KEY `tb_mahasiswa_ibfk_4` (`id_doswal`),
  ADD KEY `id_pa` (`id_pa`);

--
-- Indexes for table `tb_mata_kuliah`
--
ALTER TABLE `tb_mata_kuliah`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `id_dosen_pengampu` (`id_dosen_pengampu`);

--
-- Indexes for table `tb_matkul_yangdiambil_siswa`
--
ALTER TABLE `tb_matkul_yangdiambil_siswa`
  ADD PRIMARY KEY (`id_sks`),
  ADD KEY `id_user` (`nim`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tb_pa`
--
ALTER TABLE `tb_pa`
  ADD PRIMARY KEY (`id_pa`);

--
-- Indexes for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `surat_rekomendasi`
--
ALTER TABLE `surat_rekomendasi`
  MODIFY `id_surat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dosen_pengampu`
--
ALTER TABLE `tb_dosen_pengampu`
  MODIFY `id_dosen_pengampu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_doswal`
--
ALTER TABLE `tb_doswal`
  MODIFY `id_doswal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_ipk`
--
ALTER TABLE `tb_ipk`
  MODIFY `id_ipk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `Id_jurusan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_matkul_yangdiambil_siswa`
--
ALTER TABLE `tb_matkul_yangdiambil_siswa`
  MODIFY `id_sks` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pa`
--
ALTER TABLE `tb_pa`
  MODIFY `id_pa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_program`
--
ALTER TABLE `tb_program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat_rekomendasi`
--
ALTER TABLE `surat_rekomendasi`
  ADD CONSTRAINT `idx_surat_id_doswal` FOREIGN KEY (`id_doswal`) REFERENCES `tb_doswal` (`id_doswal`),
  ADD CONSTRAINT `idx_surat_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_mahasiswa` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_ipk`
--
ALTER TABLE `tb_ipk`
  ADD CONSTRAINT `idx_nim` FOREIGN KEY (`nim`) REFERENCES `tb_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasisa_ibfk_5` FOREIGN KEY (`id_pa`) REFERENCES `tb_pa` (`id_pa`),
  ADD CONSTRAINT `tb_mahasiswa_ibfk_1` FOREIGN KEY (`Id_program`) REFERENCES `tb_program` (`id_program`),
  ADD CONSTRAINT `tb_mahasiswa_ibfk_2` FOREIGN KEY (`Id_jurusan`) REFERENCES `tb_jurusan` (`Id_jurusan`),
  ADD CONSTRAINT `tb_mahasiswa_ibfk_3` FOREIGN KEY (`Id_status`) REFERENCES `tb_status` (`id_status`),
  ADD CONSTRAINT `tb_mahasiswa_ibfk_4` FOREIGN KEY (`id_doswal`) REFERENCES `tb_doswal` (`id_doswal`),
  ADD CONSTRAINT `tb_mahasiswa_ibfk_6` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `tb_mata_kuliah`
--
ALTER TABLE `tb_mata_kuliah`
  ADD CONSTRAINT `tb_mata_kuliah_ibfk_1` FOREIGN KEY (`id_dosen_pengampu`) REFERENCES `tb_dosen_pengampu` (`id_dosen_pengampu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_matkul_yangdiambil_siswa`
--
ALTER TABLE `tb_matkul_yangdiambil_siswa`
  ADD CONSTRAINT `idx_sks_matkul` FOREIGN KEY (`id_matkul`) REFERENCES `tb_mata_kuliah` (`id_matkul`),
  ADD CONSTRAINT `idx_sks_nim` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
