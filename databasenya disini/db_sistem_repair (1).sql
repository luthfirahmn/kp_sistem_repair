-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ms_barang`;
CREATE TABLE `ms_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `size` varchar(15) NOT NULL,
  `model` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `created_time` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_time` datetime NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `ms_barang_merk`;
CREATE TABLE `ms_barang_merk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merk` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `ms_barang_model`;
CREATE TABLE `ms_barang_model` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `model` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `ms_karyawan`;
CREATE TABLE `ms_karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `posisi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ms_karyawan` (`id`, `nama_lengkap`, `email`, `no_telp`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `posisi`) VALUES
(2,	'Muhamad Luthfirrahman',	'luthfirrahman696@gmail.com',	'081312566813',	'Laki-Laki',	'1998-08-09',	'Rancaekek',	'Manager');

DROP TABLE IF EXISTS `ms_login`;
CREATE TABLE `ms_login` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ms_login` (`id`, `username`, `password`, `nama`, `id_role`) VALUES
(7,	'admin@admin.com',	'0192023a7bbd73250516f069df18b500',	'Super Admin',	1),
(9,	'luthfirrahman696@gmail.com',	'202cb962ac59075b964b07152d234b70',	'Muhamad Luthfirrahman',	1);

DROP TABLE IF EXISTS `ms_parameter`;
CREATE TABLE `ms_parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `param_variable` varchar(50) NOT NULL,
  `param_id` varchar(50) NOT NULL,
  `param_value` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ms_parameter` (`id`, `param_variable`, `param_id`, `param_value`) VALUES
(1,	'SIZE_BARANG',	'32',	'32'),
(2,	'SIZE_BARANG',	'33',	'33'),
(3,	'POSISI',	'Manager',	'Manager'),
(4,	'POSISI',	'Gudang',	'Gudang');

DROP TABLE IF EXISTS `ms_role`;
CREATE TABLE `ms_role` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tr_barang_masuk`;
CREATE TABLE `tr_barang_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_no` varchar(30) NOT NULL,
  `id_barang` int(15) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `style_no` varchar(50) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `tot` int(15) NOT NULL,
  `remark` varchar(25) NOT NULL,
  `po_date` date NOT NULL,
  `created_time` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `updated_time` datetime NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2022-08-05 16:20:34
