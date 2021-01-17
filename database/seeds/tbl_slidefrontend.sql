-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2021 at 12:17 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u8648000_amsppdb`
--

--
-- Dumping data for table `tbl_slidefrontend`
--

INSERT INTO `tbl_slidefrontend` (`id_slidefrontend`, `gambar`, `judul`, `deskripsi`, `url`, `url_teks`, `status`, `created_at`, `updated_at`) VALUES
('3a77b001-2dd9-48cf-bca4-2c1e26122afc', 'http://ppdb.alfityankuburaya.sch.id/assets/frontend/img/slider/slider_1609881271.jpg', 'SELAMAT DATANG', 'PPDB ONLINE AL-FITYAN KUBU RAYA', 'http://ppdb.alfityankuburaya.sch.id/pendaftaran', 'DAFTAR', 1, '2021-01-05 21:14:31', '2021-01-05 21:14:31'),
('7837803f-a7b4-4233-ae26-c46e96f94670', 'http://ppdb.alfityankuburaya.sch.id/assets/frontend/img/slider/slider_1609881130.jpg', 'SELAMAT DATANG', 'PPDB ONLINE AL-FITYAN KUBU RAYA', 'http://ppdb.alfityankuburaya.sch.id/pendaftaran', 'DAFTAR', 1, '2021-01-05 21:12:10', '2021-01-05 21:12:10'),
('f8413c04-e65a-47c5-9de6-609a76b9f44b', 'http://ppdb.alfityankuburaya.sch.id/assets/frontend/img/slider/slider_1609881241.jpg', 'SELAMAT DATANG', 'PPDB ONLINE AL-FITYAN KUBU RAYA', 'http://ppdb.alfityankuburaya.sch.id/pendaftaran', 'DAFTAR', 1, '2021-01-05 21:14:01', '2021-01-05 21:14:01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
