-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table db_zakat.tbl_mustahik
CREATE TABLE IF NOT EXISTS `tbl_mustahik` (
  `id_mustahik` int NOT NULL AUTO_INCREMENT,
  `nama_mustahik` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_mustahik` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_penerimaan` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `ket_mustahik` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `status_mustahik` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_mustahik`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table db_zakat.tbl_muzzaki
CREATE TABLE IF NOT EXISTS `tbl_muzzaki` (
  `id_muzzaki` int NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_muzzaki` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `tlp_muzzaki` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_muzzaki` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `nominal_zakat` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_zakat` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_penyerahan` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_muzzaki`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table db_zakat.tbl_rekap
CREATE TABLE IF NOT EXISTS `tbl_rekap` (
  `id_rekap` int NOT NULL AUTO_INCREMENT,
  `tahun_rekap` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `total_muzzaki` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `total_mustahik` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `total_uang` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `total_beras` varchar(226) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_rekap`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table db_zakat.tbl_rekap_mustahik
CREATE TABLE IF NOT EXISTS `tbl_rekap_mustahik` (
  `id_rekap` int NOT NULL AUTO_INCREMENT,
  `nama_mustahik` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_mustahik` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_zakat` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `ket_mustahik` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status_mustahik` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_rekap`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table db_zakat.tbl_rekap_muzzaki
CREATE TABLE IF NOT EXISTS `tbl_rekap_muzzaki` (
  `id_rekap` int NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_muzzaki` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tlp_muzzaki` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_muzzaki` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nominal_zakat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_zakat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_zakat` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_rekap`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table db_zakat.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `role_user` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Pengeluaran data tidak dipilih.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
