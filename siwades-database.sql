-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for siwades2
CREATE DATABASE IF NOT EXISTS `siwades2` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `siwades2`;

-- Dumping structure for table siwades2.agama
CREATE TABLE IF NOT EXISTS `agama` (
  `id_agama` varchar(10) NOT NULL,
  `nama_agama` varchar(30) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siwades2.agama: ~2 rows (approximately)
/*!40000 ALTER TABLE `agama` DISABLE KEYS */;
INSERT INTO `agama` (`id_agama`, `nama_agama`, `status`) VALUES
	('A1', 'Islam', 1),
	('A2', 'MAJUSI', 1);
/*!40000 ALTER TABLE `agama` ENABLE KEYS */;

-- Dumping structure for table siwades2.dokumen
CREATE TABLE IF NOT EXISTS `dokumen` (
  `id_dokumen` varchar(30) NOT NULL,
  `nama_dokumen` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siwades2.dokumen: ~2 rows (approximately)
/*!40000 ALTER TABLE `dokumen` DISABLE KEYS */;
INSERT INTO `dokumen` (`id_dokumen`, `nama_dokumen`, `status`) VALUES
	('D1', 'E-KTP', 1),
	('D2', 'IJAZAH', 1);
/*!40000 ALTER TABLE `dokumen` ENABLE KEYS */;

-- Dumping structure for table siwades2.file
CREATE TABLE IF NOT EXISTS `file` (
  `id_dokumen` varchar(30) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siwades2.file: ~0 rows (approximately)
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
/*!40000 ALTER TABLE `file` ENABLE KEYS */;

-- Dumping structure for table siwades2.hak_akses
CREATE TABLE IF NOT EXISTS `hak_akses` (
  `id_akses` varchar(10) NOT NULL,
  `nama_akses` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siwades2.hak_akses: ~2 rows (approximately)
/*!40000 ALTER TABLE `hak_akses` DISABLE KEYS */;
INSERT INTO `hak_akses` (`id_akses`, `nama_akses`, `status`) VALUES
	('akses01', 'admin', 1),
	('akses04', 'penduduk', 1);
/*!40000 ALTER TABLE `hak_akses` ENABLE KEYS */;

-- Dumping structure for table siwades2.hak_akses_user
CREATE TABLE IF NOT EXISTS `hak_akses_user` (
  `nik` varchar(15) NOT NULL,
  `id_akses` varchar(10) NOT NULL,
  KEY `hak_akses_user` (`id_akses`),
  CONSTRAINT `hak_akses_user` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siwades2.hak_akses_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `hak_akses_user` DISABLE KEYS */;
INSERT INTO `hak_akses_user` (`nik`, `id_akses`) VALUES
	('123451', 'akses04'),
	('123451', 'akses01'),
	('123445', 'akses04');
/*!40000 ALTER TABLE `hak_akses_user` ENABLE KEYS */;

-- Dumping structure for table siwades2.kk
CREATE TABLE IF NOT EXISTS `kk` (
  `id_kk` varchar(10) DEFAULT NULL,
  `no_kk` varchar(50) NOT NULL DEFAULT '',
  `alamat` varchar(30) DEFAULT NULL,
  `desa` varchar(30) DEFAULT NULL,
  `kecamatan` varchar(30) DEFAULT NULL,
  `kabupaten` varchar(30) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kepala_keluarga` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`no_kk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siwades2.kk: ~6 rows (approximately)
/*!40000 ALTER TABLE `kk` DISABLE KEYS */;
INSERT INTO `kk` (`id_kk`, `no_kk`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `kode_pos`, `provinsi`, `rt`, `rw`, `kepala_keluarga`, `status`) VALUES
	('1', '12341', 'Dukuh Pandean', 'TRUCUK', 'TRUCUK', 'BOJONEGORO', '62155', 'JAWA TIMUR', '07', '08', '123451', '1'),
	('2', '12342', 'JL. SENGGANI', 'TRUCUK', 'TRUCUK', 'BOJONEGORO', '62155', 'JAWA TIMUR', '01', '02', '123445', '1'),
	('3', '12343', 'JL. SAWAH', 'TRUCUK', 'TRUCUK', 'BOJONEGORO', '62155', 'JAWA TIMUR', '09', '09', '123453', '1'),
	('4', '12344', 'JL. GERDU SUTO', 'TRUCUK', 'TRUCUK', 'BOJONEGORO', '62155', 'JAWA TIMUR', '09', '08', '4444444444444', '1'),
	('7', '23456', 'JL. KITA BEDA', 'TRUCUK', 'TRUCUK', 'BOJONEGORO', '62155', 'JAWA TIMUR', '14', '02', '3434343', '1'),
	('5', '99999999', 'JL. HASSANUDDIN', 'TRUCUK', 'TRUCUK', 'BOJONEGORO', '62155', 'JAWA TIMUR', '08', '09', '123456', '1');
/*!40000 ALTER TABLE `kk` ENABLE KEYS */;

-- Dumping structure for table siwades2.klasifikasi
CREATE TABLE IF NOT EXISTS `klasifikasi` (
  `id_klasifikasi` varchar(10) NOT NULL DEFAULT '',
  `nama_klasifikasi` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_klasifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siwades2.klasifikasi: ~4 rows (approximately)
/*!40000 ALTER TABLE `klasifikasi` DISABLE KEYS */;
INSERT INTO `klasifikasi` (`id_klasifikasi`, `nama_klasifikasi`, `status`) VALUES
	('K1', 'Anak - Anak', 1),
	('K2', 'Remaja', 1),
	('K3', 'Dewasa', 1),
	('K4', 'MATI', 1);
/*!40000 ALTER TABLE `klasifikasi` ENABLE KEYS */;

-- Dumping structure for table siwades2.klasifikasi_dokumen
CREATE TABLE IF NOT EXISTS `klasifikasi_dokumen` (
  `id_klasifikasi` varchar(5) NOT NULL,
  `id_dokumen` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siwades2.klasifikasi_dokumen: ~5 rows (approximately)
/*!40000 ALTER TABLE `klasifikasi_dokumen` DISABLE KEYS */;
INSERT INTO `klasifikasi_dokumen` (`id_klasifikasi`, `id_dokumen`) VALUES
	('K3', 'D1'),
	('K1', 'D1'),
	('K1', 'D2'),
	('K3', 'D2'),
	('K2', 'D2');
/*!40000 ALTER TABLE `klasifikasi_dokumen` ENABLE KEYS */;

-- Dumping structure for table siwades2.online
CREATE TABLE IF NOT EXISTS `online` (
  `id_online` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(15) NOT NULL,
  `waktu` varchar(25) NOT NULL,
  PRIMARY KEY (`id_online`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Dumping data for table siwades2.online: ~44 rows (approximately)
/*!40000 ALTER TABLE `online` DISABLE KEYS */;
INSERT INTO `online` (`id_online`, `nik`, `waktu`) VALUES
	(1, '123451', '11-01-2017  14:27'),
	(2, '123451', '11-01-2017  14:27'),
	(3, '', '29-12-2020  23:02'),
	(4, '', '29-12-2020  23:03'),
	(5, '', '29-12-2020  23:08'),
	(6, '', '29-12-2020  23:09'),
	(7, '', '29-12-2020  23:10'),
	(8, '123451', '29-12-2020  23:11'),
	(9, '123451', '29-12-2020  23:12'),
	(10, '123451', '29-12-2020  23:12'),
	(11, '123445', '29-12-2020  23:14'),
	(12, '123445', '29-12-2020  23:15'),
	(13, '123445', '29-12-2020  23:15'),
	(14, '123451', '29-12-2020  23:15'),
	(15, '123451', '29-12-2020  23:26'),
	(16, '123451', '29-12-2020  23:26'),
	(17, '123445', '29-12-2020  23:26'),
	(18, '123451', '29-12-2020  23:27'),
	(19, '123451', '29-12-2020  23:31'),
	(20, '123451', '30-12-2020  10:02'),
	(21, '123451', '30-12-2020  10:31'),
	(22, '123451', '30-12-2020  10:33'),
	(23, '123451', '30-12-2020  12:36'),
	(24, '123451', '30-12-2020  12:46'),
	(25, '123451', '31-12-2020  08:36'),
	(26, '123451', '31-12-2020  11:37'),
	(27, '123451', '31-12-2020  11:37'),
	(28, '123451', '31-12-2020  11:37'),
	(29, '123451', '31-12-2020  14:49'),
	(30, '123451', '31-12-2020  14:51'),
	(31, '123445', '31-12-2020  19:05'),
	(32, '123445', '31-12-2020  19:07'),
	(33, '123445', '31-12-2020  19:09'),
	(34, '123445', '31-12-2020  19:14'),
	(35, '123445', '31-12-2020  19:17'),
	(36, '123445', '31-12-2020  19:18'),
	(37, '123445', '31-12-2020  19:18'),
	(38, '123451', '31-12-2020  19:25'),
	(39, '123445', '31-12-2020  19:28'),
	(40, '123451', '31-12-2020  19:31'),
	(41, '123445', '31-12-2020  19:45'),
	(42, '123451', '31-12-2020  20:14'),
	(43, '123451', '31-12-2020  20:21'),
	(44, '123445', '31-12-2020  20:23');
/*!40000 ALTER TABLE `online` ENABLE KEYS */;

-- Dumping structure for table siwades2.penduduk
CREATE TABLE IF NOT EXISTS `penduduk` (
  `nik` varchar(100) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(10) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `pekerjaan` text DEFAULT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `status_perkawinan` enum('KAWIN','BELUM KAWIN') NOT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `id_agama` varchar(30) DEFAULT NULL,
  `id_klasifikasi` varchar(20) NOT NULL,
  `no_kk` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`nik`),
  KEY `penduduk` (`id_agama`),
  CONSTRAINT `penduduk` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siwades2.penduduk: ~9 rows (approximately)
/*!40000 ALTER TABLE `penduduk` DISABLE KEYS */;
INSERT INTO `penduduk` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `golongan_darah`, `pekerjaan`, `pendidikan`, `status_perkawinan`, `kewarganegaraan`, `id_agama`, `id_klasifikasi`, `no_kk`, `foto`, `about`, `username`, `password`, `status`) VALUES
	('123445', 'LIONEL MASI', 'BOJONEGORO MATOH', '14-12-2016', 'L', 'A', 'PNS', 'D2', 'BELUM KAWIN', 'WNA', 'A1', 'K1', '12342', 'foto7847163.jpg', NULL, 'agus', 'YWd1c2FndXM=', 1),
	('123451', 'TEJA PAKU ALAM LIAR', 'TUBAN', '21-12-1997', 'L', 'A', 'PETANI', 'SD', 'KAWIN', 'WNI', 'A1', 'K3', '12341', 'foto2211829.jpeg', 'maka bekali untamu dengan cukup\r\nagar dia tau arah pulang dan tak tersesat oleh riuhnya perjalanan\r\nsampai jumpa di negeri bahagia\r\n', 'admin', 'YWRtaW4=', 1),
	('123452', 'MUHAMMAD ROIISUL ABIDIN', 'TUBAN', '1997-12-06', 'L', 'B', 'PNS', 'SD', 'KAWIN', 'WNA', 'A1', 'K4', '12341', 'foto123452.jpg', '', 'abidin', 'YWJpZGlu', 0),
	('123453', 'COBA AJA DULU', 'TEMPAT LAHIR', '1998-12-23', 'P', 'A', 'PETANI', 'SMP', 'KAWIN', 'WNI', 'A1', 'K4', '12343', 'foto123453.jpg', '', 'coba', '1621a5dc746d5d19665ed742b2ef9736', 0),
	('123456', 'SURYA DINATA', 'TUBAN', '1995-12-13', 'L', 'AB', 'PNS', 'SMA', 'KAWIN', 'WNA', 'A1', 'K3', '12345', 'foto123456.jpg', '\r\n', 'surya', 'aff8fbcbf1363cd7edc85a1e11391173', 0),
	('3434343', 'roy martin', 'Banyuwangi', '30-12-2020', 'L', 'AB', 'PNS', 'SMA', 'KAWIN', 'WNI', 'A1', 'K2', '23456', 'foto5195062.jpg', NULL, '', '', NULL),
	('4444444444444', 'Pelatihan Marketing', 'Banyuwangi', '24-12-2020', 'L', 'B', 'Lainnya', 'S3', 'KAWIN', 'WNI', 'A1', 'K3', '12344', 'foto5082470.png', NULL, '', '', NULL),
	('444444444444433', 'Riki Ahmad Maulana HAHA', 'Tasikmalaya', '25-12-2020', 'L', 'AB', 'Lainnya', 'S2', 'KAWIN', 'WNI', 'A1', 'K3', '12341', 'foto2211829.jpeg', NULL, '', '', NULL),
	('5555555555566', 'Rki Ahmad Maulana', 'Banyuwangi', '30-12-2020', 'L', 'A', 'Lainnya', 'S2', 'KAWIN', 'WNI', 'A1', 'K3', '12342', 'foto7634644.jpeg', NULL, '', '', NULL);
/*!40000 ALTER TABLE `penduduk` ENABLE KEYS */;

-- Dumping structure for table siwades2.pesan
CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

-- Dumping data for table siwades2.pesan: ~27 rows (approximately)
/*!40000 ALTER TABLE `pesan` DISABLE KEYS */;
INSERT INTO `pesan` (`id_pesan`, `nik`, `pesan`, `waktu`) VALUES
	(39, '123455', 'satu [kasmaran]', '10-12-2016  00:19'),
	(40, '123454', 'dua  [kedip]', '10-12-2016  00:19'),
	(41, '123451', 'tiga  [ketawa]', '10-12-2016  00:19'),
	(42, '123451', 'tes satu dua tiga  [kasmaran] [kedip] [ketawa] [marah] [melet] [nangis] [sakit] [bye] [maki-maki] [cmarah] [cmurung] [cnangis] [csedih] [csenyum] [bonus]', '10-12-2016  00:21'),
	(43, '123454', 'vhdhshdchshcbhsbhsbhbhsbdhsb', '15-12-2016  07:52'),
	(44, '123454', ' [nangis] [nangis] [nangis] [nangis] [nangis] [nangis] [nangis]', '15-12-2016  07:53'),
	(45, '123451', ' [cmurung] [cmurung] [cmurung] [cmurung] [bonus] [bonus] [bonus] [bonus] [bonus] [bonus]', '19-12-2016  22:00'),
	(46, '123451', 'obby auliyaur rohman  [bonus] [bonus] [bonus] [bonus]', '19-12-2016  22:00'),
	(47, '123451', ' [marah] [marah] [marah] [marah] [marah] [marah] [marah]', '19-12-2016  22:02'),
	(48, '123445', 'iki agus', '20-12-2016  23:44'),
	(49, '123445', ' [csenyum] [maki-maki] [melet] [nangis] [ketawa] [ketawa] [marah]', '20-12-2016  23:44'),
	(50, '123451', ' [kasmaran] [melet] [kasmaran] [ketawa] [ketawa] [marah] [marah]', '20-12-2016  23:47'),
	(51, '123454', 'malem semua [maki-maki]', '20-12-2016  23:50'),
	(52, '123451', ' [bonus] [csenyum] [csedih]', '22-12-2016  01:08'),
	(53, '123451', ' [cnangis] [cnangis] [cnangis]', '22-12-2016  01:18'),
	(54, '123451', ' [kasmaran] [kasmaran] [kasmaran] [kasmaran] [kasmaran] [kasmaran]', '22-12-2016  01:27'),
	(55, '123451', 'bjdhjhejfhekf', '22-12-2016  02:55'),
	(56, '123451', ' [cmurung] [cmurung] [cmurung]', '22-12-2016  02:55'),
	(57, '123451', ' [cmarah] [cmarah] [cmarah] [cmarah]', '02-01-2017  07:14'),
	(58, '123451', 'aku ingin berjalan bersamamu', '05-01-2017  08:32'),
	(59, '123445', 'dalam hujan dan malam gelap', '05-01-2017  08:33'),
	(60, '123451', 'tapi aku tak bisa melihat matamu', '05-01-2017  09:03'),
	(61, '123445', 'aku ingin berdua denganmu', '05-01-2017  09:04'),
	(62, '123445', ' [bonus] [bonus] [bonus] [bonus] [bonus] [cmarah] [cmarah] [csedih] [csedih]', '05-01-2017  09:04'),
	(63, '123451', ' [nangis] [nangis] [nangis] [cmarah] [cmarah] [cnangis] [cnangis] [csedih] [csedih]', '05-01-2017  09:04'),
	(64, '123445', ' [bonus] [sakit] [sakit] [nangis] [nangis] [cmarah]', '05-01-2017  09:04'),
	(65, '123451', ' [sakit] [sakit] [cmurung] [cmurung] [cmarah] [cmarah]', '05-01-2017  09:04');
/*!40000 ALTER TABLE `pesan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
