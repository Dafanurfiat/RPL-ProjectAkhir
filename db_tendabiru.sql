-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.11.2-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_tendabiru
CREATE DATABASE IF NOT EXISTS `db_tendabiru` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `db_tendabiru`;

-- Dumping structure for table db_tendabiru.detailorders
CREATE TABLE IF NOT EXISTS `detailorders` (
  `jumlahBarang` int(11) DEFAULT NULL,
  `idOrder` int(11) DEFAULT NULL,
  `idMakanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table db_tendabiru.detailorders: ~3 rows (approximately)
/*!40000 ALTER TABLE `detailorders` DISABLE KEYS */;
INSERT INTO `detailorders` (`jumlahBarang`, `idOrder`, `idMakanan`) VALUES
	(1, 1, 1),
	(2, 3, 1),
	(2, 4, 1),
	(4, 5, 1);
/*!40000 ALTER TABLE `detailorders` ENABLE KEYS */;

-- Dumping structure for table db_tendabiru.detailtransaksi
CREATE TABLE IF NOT EXISTS `detailtransaksi` (
  `idDetailTransaksi` int(11) DEFAULT NULL,
  `idBarang` int(11) DEFAULT NULL,
  `jumlahBarang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table db_tendabiru.detailtransaksi: ~115 rows (approximately)
/*!40000 ALTER TABLE `detailtransaksi` DISABLE KEYS */;
INSERT INTO `detailtransaksi` (`idDetailTransaksi`, `idBarang`, `jumlahBarang`) VALUES
	(23, 1, 0),
	(23, 2, 2),
	(23, 3, 0),
	(23, 4, 2),
	(23, 5, 0),
	(27, 1, 2),
	(27, 2, 0),
	(27, 3, 0),
	(27, 4, 0),
	(27, 5, 0),
	(30, 1, 2),
	(30, 2, 0),
	(30, 3, 0),
	(30, 4, 0),
	(30, 5, 0),
	(31, 1, 2),
	(31, 2, 0),
	(31, 3, 0),
	(31, 4, 0),
	(31, 5, 0),
	(32, 1, 1),
	(32, 2, 0),
	(32, 3, 0),
	(32, 4, 0),
	(32, 5, 0),
	(33, 1, 2),
	(33, 2, 0),
	(33, 3, 0),
	(33, 4, 0),
	(33, 5, 0),
	(34, 1, 1),
	(34, 2, 0),
	(34, 3, 0),
	(34, 4, 0),
	(34, 5, 1),
	(35, 1, 1),
	(35, 2, 0),
	(35, 3, 0),
	(35, 4, 0),
	(35, 5, 0),
	(36, 1, 2),
	(36, 2, 0),
	(36, 3, 0),
	(36, 4, 0),
	(36, 5, 0),
	(37, 1, 2),
	(37, 2, 0),
	(37, 3, 0),
	(37, 4, 0),
	(37, 5, 0),
	(38, 1, 1),
	(38, 2, 1),
	(38, 3, 1),
	(38, 4, 0),
	(38, 5, 0),
	(39, 1, 2),
	(39, 2, 0),
	(39, 3, 0),
	(39, 4, 0),
	(39, 5, 0),
	(40, 1, 0),
	(40, 2, 0),
	(40, 3, 0),
	(40, 4, 1),
	(40, 5, 1),
	(41, 1, 0),
	(41, 2, 0),
	(41, 3, 0),
	(41, 4, 0),
	(41, 5, 0),
	(42, 1, 0),
	(42, 2, 0),
	(42, 3, 0),
	(42, 4, 0),
	(42, 5, 2),
	(43, 1, 0),
	(43, 2, 0),
	(43, 3, 3),
	(43, 4, 0),
	(43, 5, 0),
	(44, 1, 0),
	(44, 2, 0),
	(44, 3, 0),
	(44, 4, 6),
	(44, 5, 0),
	(45, 1, 0),
	(45, 2, 0),
	(45, 3, 13),
	(45, 4, 0),
	(45, 5, 0),
	(46, 1, 2),
	(46, 2, 0),
	(46, 3, 1),
	(46, 4, 0),
	(46, 5, 0),
	(47, 1, 0),
	(47, 2, 0),
	(47, 3, 0),
	(47, 4, 6),
	(47, 5, 0),
	(48, 1, 0),
	(48, 2, 2),
	(48, 3, 0),
	(48, 4, 2),
	(48, 5, 0),
	(49, 1, 0),
	(49, 2, 3),
	(49, 3, 0),
	(49, 4, 0),
	(49, 5, 0),
	(50, 1, 0),
	(50, 2, 3),
	(50, 3, 0),
	(50, 4, 0),
	(50, 5, 0);
/*!40000 ALTER TABLE `detailtransaksi` ENABLE KEYS */;

-- Dumping structure for table db_tendabiru.komposisi
CREATE TABLE IF NOT EXISTS `komposisi` (
  `jumlahBarang` int(11) DEFAULT NULL,
  `idMakanan` int(11) DEFAULT NULL,
  `idBarang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table db_tendabiru.komposisi: ~3 rows (approximately)
/*!40000 ALTER TABLE `komposisi` DISABLE KEYS */;
INSERT INTO `komposisi` (`jumlahBarang`, `idMakanan`, `idBarang`) VALUES
	(200, 1, 1),
	(25, 1, 2),
	(40, 1, 5);
/*!40000 ALTER TABLE `komposisi` ENABLE KEYS */;

-- Dumping structure for table db_tendabiru.makanan
CREATE TABLE IF NOT EXISTS `makanan` (
  `idMakanan` int(11) NOT NULL AUTO_INCREMENT,
  `namaMakanan` varchar(50) DEFAULT NULL,
  `hargaMakanan` int(11) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idMakanan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table db_tendabiru.makanan: ~0 rows (approximately)
/*!40000 ALTER TABLE `makanan` DISABLE KEYS */;
INSERT INTO `makanan` (`idMakanan`, `namaMakanan`, `hargaMakanan`, `gambar`) VALUES
	(1, 'Nasi Goreng', 15000, 'nasigoreng.jpg');
/*!40000 ALTER TABLE `makanan` ENABLE KEYS */;

-- Dumping structure for table db_tendabiru.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `idOrder` int(11) NOT NULL AUTO_INCREMENT,
  `tanggalOrder` date DEFAULT NULL,
  `totalHarga` int(11) DEFAULT NULL,
  PRIMARY KEY (`idOrder`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table db_tendabiru.orders: ~3 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`idOrder`, `tanggalOrder`, `totalHarga`) VALUES
	(1, '2023-11-26', 15000),
	(3, '2023-11-26', 30000),
	(4, '2023-11-26', 30000),
	(5, '2023-11-28', 60000);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table db_tendabiru.stok
CREATE TABLE IF NOT EXISTS `stok` (
  `idBarang` int(11) NOT NULL AUTO_INCREMENT,
  `namaBarang` varchar(50) DEFAULT NULL,
  `stokBarang` int(11) DEFAULT NULL,
  `hargaBarang` int(11) DEFAULT NULL,
  `fotoBarang` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idBarang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table db_tendabiru.stok: ~5 rows (approximately)
/*!40000 ALTER TABLE `stok` DISABLE KEYS */;
INSERT INTO `stok` (`idBarang`, `namaBarang`, `stokBarang`, `hargaBarang`, `fotoBarang`) VALUES
	(1, 'Beras', 15000, 1500, 'beras.png'),
	(2, 'Bawang Merah', 10000, 3550, 'bawang merah.png'),
	(3, 'Bawang Putih', 8000, 3875, 'bawang putih.png'),
	(4, 'Cabai', 5000, 8360, 'cabai.png'),
	(5, 'Kecap', 2500, 2833, 'kecap.png');
/*!40000 ALTER TABLE `stok` ENABLE KEYS */;

-- Dumping structure for table db_tendabiru.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `idTransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `tanggalTransaksi` date DEFAULT NULL,
  `totalHarga` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `statusReq` int(11) DEFAULT NULL,
  `isKokiReq` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTransaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table db_tendabiru.transaksi: ~25 rows (approximately)
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`idTransaksi`, `tanggalTransaksi`, `totalHarga`, `status`, `statusReq`, `isKokiReq`) VALUES
	(1, '2021-11-12', 5050, 3, 1, 1),
	(23, '2023-11-26', 23820, 4, 2, 1),
	(24, '2023-11-26', 3000, 2, 1, 1),
	(27, '2023-11-26', 3000, 4, 2, 1),
	(30, '2023-11-26', 3000, 2, 1, 1),
	(31, '2023-11-26', 3000, 3, 1, 1),
	(32, '2023-11-26', 1500, 3, 1, 1),
	(33, '2023-11-26', 3000, 3, 1, 1),
	(34, '2023-11-26', 4333, 1, 1, 1),
	(35, '2023-11-27', 1500, 0, 0, 1),
	(36, '2023-11-27', 3000, 1, 1, 0),
	(37, '2023-11-27', 3000, 1, 1, 0),
	(38, '2023-11-27', 8925, 1, 1, 0),
	(39, '2023-11-27', 3000, 0, 0, 1),
	(40, '2023-11-27', 11193, 1, 1, 0),
	(41, '2023-11-27', 0, 2, 1, 0),
	(42, '2023-11-27', 5666, 1, 1, 0),
	(43, '2023-11-27', 11625, 0, 0, 1),
	(44, '2023-11-27', 50160, 0, 0, 1),
	(45, '2023-11-27', 50375, 0, 0, 1),
	(46, '2023-11-27', 6875, 1, 1, 1),
	(47, '2023-11-27', 50160, 3, 1, 1),
	(48, '2023-11-28', 23820, 3, 1, 1),
	(49, '2023-11-28', 10650, 0, 0, 1),
	(50, '2023-11-28', 10650, 1, 1, 1);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

-- Dumping structure for table db_tendabiru.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table db_tendabiru.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `roles`, `password`) VALUES
	(1, 'admin', 'admin@email.com', 'manager', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'),
	(2, 'koki', 'koki@email.com', 'koki', '707c403908e826807640df1bea0ad7674d40b25de50c190bd8aeb5ef00d08055'),
	(3, 'pemasok', 'pemasok@email.com', 'pemasok', 'd5e7e757918bfd14f87af457e169ad99ce42b898319938c3218e0df699dc5280');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

