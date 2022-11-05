-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 03:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(255) NOT NULL,
  `bidang` varchar(255) NOT NULL,
  `namaBidang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `bidang`, `namaBidang`) VALUES
(1, 'SET', 'Setretariat'),
(2, 'SEKRT', 'Sekretaris'),
(3, 'PENDAL', 'Bidang Penagihan'),
(4, 'PP', 'Bidang Pelayanan'),
(5, 'TAP-DATA', 'Bidang Pendataan');

-- --------------------------------------------------------

--
-- Table structure for table `lembar_disposisi`
--

CREATE TABLE `lembar_disposisi` (
  `id` int(255) NOT NULL,
  `dSatu` varchar(255) NOT NULL,
  `dDua` varchar(255) NOT NULL,
  `dTiga` varchar(255) NOT NULL,
  `dEmpat` varchar(255) NOT NULL,
  `dLima` varchar(255) NOT NULL,
  `dEnam` varchar(255) NOT NULL,
  `dTujuh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lembar_disposisi`
--

INSERT INTO `lembar_disposisi` (`id`, `dSatu`, `dDua`, `dTiga`, `dEmpat`, `dLima`, `dEnam`, `dTujuh`) VALUES
(132, '1', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `nama-instansi`
--

CREATE TABLE `nama-instansi` (
  `id` int(255) NOT NULL,
  `namaSingkat` varchar(255) NOT NULL,
  `namaLengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nama-instansi`
--

INSERT INTO `nama-instansi` (`id`, `namaSingkat`, `namaLengkap`) VALUES
(1, 'BAPENDA', 'Badan Pendapatan Daerah Kabupaten Tabalong');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(255) NOT NULL,
  `noAgenda` int(255) NOT NULL,
  `nomorSurat` varchar(255) NOT NULL,
  `tanggalSurat` date NOT NULL,
  `bidang` varchar(255) NOT NULL,
  `prihalSurat` varchar(255) NOT NULL,
  `fileSurat` varchar(255) DEFAULT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `noAgenda`, `nomorSurat`, `tanggalSurat`, `bidang`, `prihalSurat`, `fileSurat`, `tgl`) VALUES
(57, 1, 'S-347/BAPENDA-SEKRT/094/10/2022', '2022-10-27', 'Sekretaris', 'SURAT PERINTAH TUGAS', '61fe827c914d5f090ba9d9e80b6e6303.pdf', '2022-10-27'),
(58, 2, 'B-650/BAPENDA/SET/005/09/2022', '2022-09-13', 'Setretariat', 'UNDANGAN RAPAT', '49d44c52f41494d1d2058451e23cf39e.pdf', '2022-10-27'),
(59, 3, 'B-159/BAPENDA/SEKT/800/02/2022', '2022-02-07', 'Sekretaris', 'KESEDIAAN PEMINJAMAN PERANGKAT ZOOM MEETING', '486b531c3f76e58bdad3007c683279ab.pdf', '2022-10-27'),
(60, 4, 'B-143/BAPENDA/SET/800/01/2022', '2022-01-28', 'Sekretaris', 'SURAT IZIN PENELITIAN', '1a9dc4201ad60017b631b57e0cb562e4.pdf', '2022-10-27'),
(62, 5, 'B-546/BAPENDA/PEN-DAL/973/07/2022', '2022-08-02', 'Bidang Penagihan', 'UNDANGAN RALAT KEDUA SEMINAR DAN PENYULUHAN', '82984d46ca7d7d224679c7f80b958092.pdf', '2022-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(255) NOT NULL,
  `noAgenda` int(255) NOT NULL,
  `nomorSurat` varchar(255) NOT NULL,
  `asalSurat` varchar(255) NOT NULL,
  `tanggalTerimaSurat` date NOT NULL,
  `prihalSurat` varchar(255) NOT NULL,
  `fileSurat` varchar(255) DEFAULT NULL,
  `waktu` int(255) NOT NULL,
  `disposisi` varchar(255) DEFAULT NULL,
  `dibaca` int(11) NOT NULL,
  `melihat` int(11) NOT NULL,
  `lapor` int(11) NOT NULL,
  `baruDisposisi` int(11) NOT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `noAgenda`, `nomorSurat`, `asalSurat`, `tanggalTerimaSurat`, `prihalSurat`, `fileSurat`, `waktu`, `disposisi`, `dibaca`, `melihat`, `lapor`, `baruDisposisi`, `tgl`) VALUES
(131, 1, 'B.113/DPMD-BAPD/140/02/2022', 'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA KABUPATEN TABALONG', '2022-02-04', 'PERMOHONAN PEMINJAMAN PERANGKAT ZOOM MEETING', '94de2bf5cf1455e34413d75646199541.pdf', 1666877416, NULL, 0, 0, 0, 0, '2022-10-27'),
(132, 2, 'B-212/BUP/KESRA/400/03/2022', 'BUPATI TABALONG', '2022-03-15', 'UNDANGAN SHALAT HAJAT', 'e45f0232a80cfc24b90afdf9b6711223.pdf', 1667265850, 'Sekretaris tolong ditindak lanjuti undangan tersebut', 1, 1, 0, 1, '2022-10-27'),
(133, 3, 'B-109/BPKAD-SEKT/011/01/2022', 'BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KABUPATEN TABALONG', '2022-01-13', 'PEMBERITAHUAN', 'f413fb3e8785480166082e9f71557aea.pdf', 1666877579, NULL, 0, 0, 0, 0, '2022-10-27'),
(134, 4, '197/UN8.1.12.5/SP/2022', 'UNIVERSITAS LAMBUNG MANGKURAT BANJARMASIN', '2022-06-13', 'PELAKSANAAN PROGRAM MAGANG A.N TRIA ERIKA DAMAYANTI', 'e196de4a4693f5c785a39e71b70cec28.pdf', 1666877643, NULL, 0, 0, 0, 0, '2022-10-27'),
(135, 5, 'B-628/DPRD/170/05/2022', 'DEWAN PERWAKILAN RAKYAT DAERAH KABUPATEN TABALONG', '2022-05-09', 'MOHON IKUT SERTA DALAM KEGIATAN WAKIL KETUA DPRD KAB. TABALONG', 'ea8bad583eec277e0c4613aa8e31dc31.pdf', 1666877696, NULL, 0, 0, 0, 0, '2022-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Admin', 'admin@admin.com', 'man-with-inscription-admin-icon-outline-style-vector-30713429.jpg', '$2y$10$I5GPS/x6gSqSf9a0/WHzp.AWh/UtEuDUbAi2xfGNECDSTToGCl9Bq', 1, 1, 1),
(69, 'Kasir', 'kasir@kasir.com', 'default.jpg', '$2y$10$ZdovePZcXqnahFBRZI0gOe3P/iRkfocx9spKTYuFo.Pdk2WqTleWu', 186, 1, 1648639580),
(73, 'Sekretariat', 'sekretariat@simas.com', 'default.jpg', '$2y$10$NUK5IX6aJ91XcWDdMm/upepvu7GnvQAeP2Tta.TBA2FE1rSthJtBm', 181, 1, 1664897338),
(74, 'Pimpinan', 'pimpinan@simas.com', 'default.jpg', '$2y$10$eNHUKtqZwMbzBegE4wJdPOPGvktpma7qIl2cv4GudZiiMRpNioprS', 185, 1, 1664897362);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(114, 185, 43),
(117, 181, 41),
(124, 186, 45),
(125, 1, 45),
(140, 181, 42);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`, `name`) VALUES
(1, 'Administrator', 'fa fa-cogs', 'Administrator'),
(2, 'Profile', 'mdi mdi-account-settings-variant', 'Profile'),
(3, 'Menu', 'mdi mdi-folder-multiple', 'Setting Menu'),
(41, 'SuratMasuk', 'mdi mdi-email-secure', 'Surat Masuk'),
(42, 'SuratKeluar', 'mdi mdi-email-secure', 'Surat Keluar'),
(43, 'Disposisi', 'mdi mdi-email-variant', 'Disposisi Anda');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(181, 'SEKRETARIAT'),
(185, 'PIMPINAN');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icons` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icons`, `is_active`) VALUES
(1, 1, 'Home Admin', 'Administrator', 'mdi mdi-linux', 1),
(2, 2, 'My Profile', 'profile', 'mdi mdi-account-card-details', 1),
(3, 2, 'Edit Profile', 'profile/edit', 'mdi mdi-account-settings-variant', 1),
(4, 3, 'Controller', 'menu', 'mdi mdi-lan-connect', 1),
(5, 3, 'Submenu', 'menu/submenu', 'mdi mdi-folder', 1),
(7, 1, 'Hak Akses', 'Administrator/role', 'mdi mdi-access-point-network', 1),
(8, 2, 'Change Password', 'profile/changepassword', 'mdi mdi-key', 1),
(20, 1, 'Users', 'Administrator/users', 'mdi mdi-account-multiple-plus', 1),
(51, 43, 'Disposisi Surat', 'disposisi', 'mdi mdi-email', 1),
(56, 41, 'Surat Masuk', 'suratmasuk', 'mdi mdi-email-variant', 1),
(57, 42, 'Surat Keluar', 'suratkeluar', 'mdi mdi-send', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(30, 'admin@admihn.com', 'ab8/U4E/Lhnkvavuwx/VOOU2ONjK3xkRy+CicNxKFbc=', 1644208633),
(31, 'utuh@palui.com', '1r+ajA4QCvz2YkL2HCUzxQ86hWRSZIjSWBMVvww9iGU=', 1646014036),
(34, 'admin@admin.com', 'paLAy1bkcHku6h1L2fMDJEUoD9P1n4Tlr2NCulIy2H8=', 1650682359),
(48, 'admin@admin.com', 'ofROjpvTquXrjYQyC3S/1U88QRoWGWXeBj5GdIYKLtw=', 1658509343),
(49, 'hadirusadi97@gmail.com', 'dQjWUbelUc/OIVbMCM/soHBfh8+EbOYeqbfsn4W+ZvY=', 1658509367);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lembar_disposisi`
--
ALTER TABLE `lembar_disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nama-instansi`
--
ALTER TABLE `nama-instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lembar_disposisi`
--
ALTER TABLE `lembar_disposisi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `nama-instansi`
--
ALTER TABLE `nama-instansi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
