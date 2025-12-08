-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 02:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diary_of_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tipe` enum('teks','audio','gambar') NOT NULL,
  `konten_path` text NOT NULL,
  `tanggal_catatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `id_user`, `judul`, `tipe`, `konten_path`, `tanggal_catatan`) VALUES
(1, 6, 'Refleksi Pelajaran Sejarah', 'teks', 'Today, I wrote about World War II.', '2025-10-01'),
(2, 6, 'Latihan Presentasi', 'audio', '/storage/audio/edo_pres_20251002.mp3', '2025-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `kosakata`
--

CREATE TABLE `kosakata` (
  `id_kosakata` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kata_inggris` varchar(100) NOT NULL,
  `arti_indonesia` varchar(100) NOT NULL,
  `contoh_kalimat` text DEFAULT NULL,
  `tanggal_dicatat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kosakata`
--

INSERT INTO `kosakata` (`id_kosakata`, `id_user`, `kata_inggris`, `arti_indonesia`, `contoh_kalimat`, `tanggal_dicatat`) VALUES
(1, 5, 'Diligent', 'Rajin', 'She is very diligent in her studies.', '2025-10-01'),
(2, 5, 'Elaborate', 'Menerangkan', 'Please elaborate on your idea.', '2025-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `kosakata_misi`
--

CREATE TABLE `kosakata_misi` (
  `id_kosakata_misi` int(11) NOT NULL,
  `id_misi` int(11) NOT NULL,
  `kata_target` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kosakata_misi`
--

INSERT INTO `kosakata_misi` (`id_kosakata_misi`, `id_misi`, `kata_target`) VALUES
(1, 1, 'Determine'),
(2, 1, 'Inquire');

-- --------------------------------------------------------

--
-- Table structure for table `misi`
--

CREATE TABLE `misi` (
  `id_misi` int(11) NOT NULL,
  `id_pembuat` int(11) NOT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `nama_misi` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `misi`
--

INSERT INTO `misi` (`id_misi`, `id_pembuat`, `id_sekolah`, `nama_misi`, `deskripsi`, `tanggal_mulai`, `tanggal_akhir`) VALUES
(1, 1, NULL, 'Misi Dasar: 10 Kata Kerja', 'Wajib kuasai 10 kata kerja tingkat B1.', '2025-10-01', '2025-10-31'),
(2, 2, 100, 'Misi Sekolah: Adjective', 'Cari 5 kata sifat yang unik.', '2025-10-05', '2025-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `progres`
--

CREATE TABLE `progres` (
  `id_progres` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_progres` enum('menulis','kosakata','misi') NOT NULL,
  `nilai` decimal(5,2) NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progres`
--

INSERT INTO `progres` (`id_progres`, `id_user`, `jenis_progres`, `nilai`, `tanggal_update`) VALUES
(1, 5, 'menulis', 80.50, '2025-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id_reminder` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pesan_reminder` varchar(255) NOT NULL,
  `waktu_reminder` time NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id_reminder`, `id_user`, `pesan_reminder`, `waktu_reminder`, `status`) VALUES
(1, 5, 'Jangan lupa buat jurnal harian!', '20:00:00', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kode_sekolah` varchar(10) NOT NULL,
  `id_guru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat`, `kode_sekolah`, `id_guru`) VALUES
(100, 'SMA Bintang Timur', 'Jl. Merdeka No. 10', '882910', 2),
(101, 'SMK Jaya Mandiri', 'Jl. Pendidikan 5', '192837', 3),
(102, 'Bimbel English Pro', 'Ruko Sentra Bisnis 7', '772819', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_sekolah`, `username`, `password_hash`, `nama_lengkap`, `role`, `email`) VALUES
(1, NULL, 'superadmin', 'c53cd2b3b64ded29b38ef3b185e07a06f23eec6e5b9b06f869da180a43e1c851', 'Admin Global', '1', 'admin@diary.com'),
(2, 100, 'gurua', 'hashed_pass_g1', 'Bapak Andi', '2', 'andi.g@bt.com'),
(3, 101, 'gurub', 'hashed_pass_g2', 'Ibu Bety', '2', 'bety.g@jm.com'),
(4, 102, 'guruc', 'hashed_pass_g3', 'Mr. Charlie', '2', 'charlie.g@ep.com'),
(5, 100, 'siswa01', 'hashed_pass_s1', 'Dian Anggraini', '3', 'dian@mail.com'),
(6, 100, 'siswa02', 'hashed_pass_s2', 'Edo Firmansyah', '3', 'edo@mail.com'),
(7, 100, 'siswa03', 'hashed_pass_s3', 'Fiona Cahyadi', '3', 'fiona@mail.com'),
(8, 101, 'siswa04', 'hashed_pass_s4', 'Gilang Prasetya', '3', 'gilang@mail.com'),
(9, 101, 'siswa05', 'hashed_pass_s5', 'Hana Wijaya', '3', 'hana@mail.com'),
(10, 101, 'siswa06', 'hashed_pass_s6', 'Intan Permata', '3', 'intan@mail.com'),
(11, 102, 'siswa07', 'hashed_pass_s7', 'Joko Susilo', '3', 'joko@mail.com'),
(12, 102, 'siswa08', 'hashed_pass_s8', 'Kiki Amelia', '3', 'kiki@mail.com'),
(13, 102, 'siswa09', 'hashed_pass_s9', 'Lina Marwati', '3', 'lina@mail.com'),
(14, 102, 'siswa10', 'hashed_pass_s10', 'Miko Satria', '3\\', 'miko@mail.com'),
(15, 101, 'elghi', 'c53cd2b3b64ded29b38ef3b185e07a06f23eec6e5b9b06f869da180a43e1c851', 'elghifary', '3', '1221221@gmail.com'),
(16, NULL, 'dosen', '6a43336baf50915c0042ba1ccecc7c75072763569bf8ad735bd7f6b4419ceb67', 'mr nobody', '2', 'react@gmail.com'),
(17, NULL, 'dosen_baru', '6a43336baf50915c0042ba1ccecc7c75072763569bf8ad735bd7f6b4419ceb67', 'rehannn', '2', 'rezeee@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `idx_catatan_user` (`id_user`);

--
-- Indexes for table `kosakata`
--
ALTER TABLE `kosakata`
  ADD PRIMARY KEY (`id_kosakata`),
  ADD KEY `idx_kosakata_user` (`id_user`);

--
-- Indexes for table `kosakata_misi`
--
ALTER TABLE `kosakata_misi`
  ADD PRIMARY KEY (`id_kosakata_misi`),
  ADD KEY `idx_km_misi` (`id_misi`);

--
-- Indexes for table `misi`
--
ALTER TABLE `misi`
  ADD PRIMARY KEY (`id_misi`),
  ADD KEY `idx_misi_pembuat` (`id_pembuat`),
  ADD KEY `idx_misi_sekolah` (`id_sekolah`);

--
-- Indexes for table `progres`
--
ALTER TABLE `progres`
  ADD PRIMARY KEY (`id_progres`),
  ADD KEY `idx_progres_user` (`id_user`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id_reminder`),
  ADD KEY `idx_reminder_user` (`id_user`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`),
  ADD UNIQUE KEY `kode_sekolah` (`kode_sekolah`),
  ADD KEY `idx_guru_pembuat` (`id_guru`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_user_sekolah` (`id_sekolah`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catatan`
--
ALTER TABLE `catatan`
  ADD CONSTRAINT `fk_catatan_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `kosakata`
--
ALTER TABLE `kosakata`
  ADD CONSTRAINT `fk_kosakata_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `kosakata_misi`
--
ALTER TABLE `kosakata_misi`
  ADD CONSTRAINT `fk_km_misi` FOREIGN KEY (`id_misi`) REFERENCES `misi` (`id_misi`) ON DELETE CASCADE;

--
-- Constraints for table `misi`
--
ALTER TABLE `misi`
  ADD CONSTRAINT `fk_misi_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`),
  ADD CONSTRAINT `fk_misi_user` FOREIGN KEY (`id_pembuat`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `progres`
--
ALTER TABLE `progres`
  ADD CONSTRAINT `fk_progres_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `reminder`
--
ALTER TABLE `reminder`
  ADD CONSTRAINT `fk_reminder_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `fk_sekolah_pembuat` FOREIGN KEY (`id_guru`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
