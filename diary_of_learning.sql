-- ==========================================================
-- 1. MATIKAN PENGECEKAN KUNCI (SOLUSI CIRCULAR DEPENDENCY)
-- ==========================================================
SET FOREIGN_KEY_CHECKS = 0;

-- ==========================================================
-- 2. BERSIH-BERSIH (HAPUS SEMUA TABEL LAMA)
-- ==========================================================
DROP TABLE IF EXISTS `kosakata_misi`;
DROP TABLE IF EXISTS `misi`;
DROP TABLE IF EXISTS `progres`;
DROP TABLE IF EXISTS `reminder`;
DROP TABLE IF EXISTS `kosakata`;
DROP TABLE IF EXISTS `catatan`;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `sekolah`;

-- ==========================================================
-- 3. BUAT STRUKTUR TABEL (URUTAN TIDAK LAGI MASALAH)
-- ==========================================================

-- A. Tabel Sekolah (Ada id_guru & kode_sekolah)
CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL PRIMARY KEY,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kode_sekolah` varchar(10) NOT NULL UNIQUE, 
  `id_guru` int(11) DEFAULT NULL,
  KEY `idx_guru_pembuat` (`id_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- B. Tabel User
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL PRIMARY KEY,
  `id_sekolah` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL UNIQUE,
  `password_hash` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL UNIQUE,
  KEY `idx_user_sekolah` (`id_sekolah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- C. Tabel Lainnya
CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL PRIMARY KEY,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tipe` enum('teks','audio','gambar') NOT NULL,
  `konten_path` text NOT NULL,
  `tanggal_catatan` date NOT NULL,
  KEY `idx_catatan_user` (`id_user`)
) ENGINE=InnoDB;

CREATE TABLE `kosakata` (
  `id_kosakata` int(11) NOT NULL PRIMARY KEY,
  `id_user` int(11) NOT NULL,
  `kata_inggris` varchar(100) NOT NULL,
  `arti_indonesia` varchar(100) NOT NULL,
  `contoh_kalimat` text DEFAULT NULL,
  `tanggal_dicatat` date NOT NULL,
  KEY `idx_kosakata_user` (`id_user`)
) ENGINE=InnoDB;

CREATE TABLE `reminder` (
  `id_reminder` int(11) NOT NULL PRIMARY KEY,
  `id_user` int(11) NOT NULL,
  `pesan_reminder` varchar(255) NOT NULL,
  `waktu_reminder` time NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  KEY `idx_reminder_user` (`id_user`)
) ENGINE=InnoDB;

CREATE TABLE `progres` (
  `id_progres` int(11) NOT NULL PRIMARY KEY,
  `id_user` int(11) NOT NULL,
  `jenis_progres` enum('menulis','kosakata','misi') NOT NULL,
  `nilai` decimal(5,2) NOT NULL,
  `tanggal_update` date NOT NULL,
  KEY `idx_progres_user` (`id_user`)
) ENGINE=InnoDB;

CREATE TABLE `misi` (
  `id_misi` int(11) NOT NULL PRIMARY KEY,
  `id_pembuat` int(11) NOT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `nama_misi` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  KEY `idx_misi_pembuat` (`id_pembuat`),
  KEY `idx_misi_sekolah` (`id_sekolah`)
) ENGINE=InnoDB;

CREATE TABLE `kosakata_misi` (
  `id_kosakata_misi` int(11) NOT NULL PRIMARY KEY,
  `id_misi` int(11) NOT NULL,
  `kata_target` varchar(100) NOT NULL,
  KEY `idx_km_misi` (`id_misi`)
) ENGINE=InnoDB;

-- ==========================================================
-- 4. INSERT DATA (DATA DUMMY)
-- ==========================================================

INSERT INTO `user` (`id_user`, `id_sekolah`, `username`, `password_hash`, `nama_lengkap`, `role`, `email`) VALUES
(1, NULL, 'superadmin', 'hashed_pass_sa', '1', 'superadmin', 'admin@diary.com'),
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
(14, 102, 'siswa10', 'hashed_pass_s10', 'Miko Satria', '3', 'miko@mail.com');

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat`, `kode_sekolah`, `id_guru`) VALUES
(100, 'SMA Bintang Timur', 'Jl. Merdeka No. 10', '882910', 2),
(101, 'SMK Jaya Mandiri', 'Jl. Pendidikan 5', '192837', 3),
(102, 'Bimbel English Pro', 'Ruko Sentra Bisnis 7', '772819', 4);

INSERT INTO `catatan` (`id_catatan`, `id_user`, `judul`, `tipe`, `konten_path`, `tanggal_catatan`) VALUES
(1, 6, 'Refleksi Pelajaran Sejarah', 'teks', 'Today, I wrote about World War II.', '2025-10-01'),
(2, 6, 'Latihan Presentasi', 'audio', '/storage/audio/edo_pres_20251002.mp3', '2025-10-02');
-- (Saya potong sedikit agar tidak kepanjangan di chat, tapi struktur aman)

INSERT INTO `kosakata` (`id_kosakata`, `id_user`, `kata_inggris`, `arti_indonesia`, `contoh_kalimat`, `tanggal_dicatat`) VALUES
(1, 5, 'Diligent', 'Rajin', 'She is very diligent in her studies.', '2025-10-01'),
(2, 5, 'Elaborate', 'Menerangkan', 'Please elaborate on your idea.', '2025-10-02');

INSERT INTO `misi` (`id_misi`, `id_pembuat`, `id_sekolah`, `nama_misi`, `deskripsi`, `tanggal_mulai`, `tanggal_akhir`) VALUES
(1, 1, NULL, 'Misi Dasar: 10 Kata Kerja', 'Wajib kuasai 10 kata kerja tingkat B1.', '2025-10-01', '2025-10-31'),
(2, 2, 100, 'Misi Sekolah: Adjective', 'Cari 5 kata sifat yang unik.', '2025-10-05', '2025-10-20');

INSERT INTO `kosakata_misi` (`id_kosakata_misi`, `id_misi`, `kata_target`) VALUES
(1, 1, 'Determine'),
(2, 1, 'Inquire');

INSERT INTO `progres` (`id_progres`, `id_user`, `jenis_progres`, `nilai`, `tanggal_update`) VALUES
(1, 5, 'menulis', 80.50, '2025-10-15');

INSERT INTO `reminder` (`id_reminder`, `id_user`, `pesan_reminder`, `waktu_reminder`, `status`) VALUES
(1, 5, 'Jangan lupa buat jurnal harian!', '20:00:00', 'aktif');

-- ==========================================================
-- 5. PASANG FOREIGN KEY & NYALAKAN LAGI PENGECEKAN
-- ==========================================================

-- Relasi User <-> Sekolah (Saling Kunci)
ALTER TABLE `sekolah`
ADD CONSTRAINT `fk_sekolah_pembuat` FOREIGN KEY (`id_guru`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `user`
ADD CONSTRAINT `fk_user_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`) ON DELETE SET NULL ON UPDATE CASCADE;

-- Relasi Tabel Lain ke User
ALTER TABLE `catatan` ADD CONSTRAINT `fk_catatan_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
ALTER TABLE `kosakata` ADD CONSTRAINT `fk_kosakata_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
ALTER TABLE `reminder` ADD CONSTRAINT `fk_reminder_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
ALTER TABLE `progres` ADD CONSTRAINT `fk_progres_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

-- Relasi Misi (ke User & Sekolah)
ALTER TABLE `misi` ADD CONSTRAINT `fk_misi_user` FOREIGN KEY (`id_pembuat`) REFERENCES `user` (`id_user`);
ALTER TABLE `misi` ADD CONSTRAINT `fk_misi_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

-- Relasi Kosakata Misi
ALTER TABLE `kosakata_misi` ADD CONSTRAINT `fk_km_misi` FOREIGN KEY (`id_misi`) REFERENCES `misi` (`id_misi`) ON DELETE CASCADE;

-- Nyalakan kembali satpam Foreign Key
SET FOREIGN_KEY_CHECKS = 1;