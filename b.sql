-- 1\. Data  untuk Tabel Master (20 Baris)

-- 1.1. `Jenis_Ewaste` (Kategori Sampah Elektronik)

INSERT INTO Jenis_Ewaste (nama_jenis) VALUES
('Ponsel (HP)'),
('Laptop/Notebook'),
('Monitor CRT'),
('Monitor LED/LCD'),
('Printer Inkjet'),
('Printer Laser'),
('PC Desktop (CPU)'),
('TV Tabung'),
('TV Flat Screen'),
('Keyboard & Mouse'),
('Router/Modem'),
('Kabel & Adaptor'),
('Baterai Lithium'),
('Hard Disk Drive'),
('RAM/Memori'),
('Motherboard PC'),
('Kamera Digital'),
('Drone'),
('Projector'),
('Console Game');




-- 1.2. `Anggota` (Pengguna/Penyetor)

INSERT INTO Anggota (nama_anggota, alamat, no_telepon, email, password, tanggal_registrasi) VALUES
('Rizky Sanjaya', 'Jl. Merdeka No. 10, Jakarta', '081234567801', 'rizky.sanjaya@mail.com', 'pass123', '2023-01-15'),
('Siti Aminah', 'Komplek Griya Indah Blok C5, Bandung', '081234567802', 'siti.aminah@mail.com', 'pass124', '2023-02-20'),
('Bambang Sutejo', 'Perumahan Elok Blok Z12, Surabaya', '081234567803', 'bambang.tj@mail.com', 'pass125', '2023-03-01'),
('Dewi Kartika', 'Jalan Kemuning Raya No. 45, Medan', '081234567804', 'dewi.karti@mail.com', 'pass126', '2023-04-10'),
('Fajar Nugroho', 'Gang Delima No. 1, Yogyakarta', '081234567805', 'fajar.nugroho@mail.com', 'pass127', '2023-05-05'),
('Aulia Putri', 'Jl. Sudirman No. 20A, Makassar', '081234567806', 'aulia.p@mail.com', 'pass128', '2023-06-12'),
('Candra Wijaya', 'Komplek Permata Hijau Kav. 8, Semarang', '081234567807', 'candra.w@mail.com', 'pass129', '2023-07-01'),
('Eka Lestari', 'Jl. Pahlawan No. 7, Palembang', '081234567808', 'eka.lestari@mail.com', 'pass130', '2023-08-18'),
('Gani Ramadhan', 'Perumahan Harmoni Blok B3, Denpasar', '081234567809', 'gani.rama@mail.com', 'pass131', '2023-09-25'),
('Hana Susanti', 'Jalan Raya Bogor KM 25, Bogor', '081234567810', 'hana.s@mail.com', 'pass132', '2023-10-01'),
('Irfan Hakim', 'Komplek Metropolitan City, Bekasi', '081234567811', 'irfan.hakim@mail.com', 'pass133', '2023-11-03'),
('Jihan Fadillah', 'Jl. Cisadane No. 100, Tangerang', '081234567812', 'jihan.f@mail.com', 'pass134', '2023-12-07'),
('Kiki Ronaldo', 'Perumahan Citra Indah Blok D5, Malang', '081234567813', 'kiki.r@mail.com', 'pass135', '2024-01-20'),
('Lina Maulina', 'Jalan Setiabudi No. 50, Cirebon', '081234567814', 'lina.m@mail.com', 'pass136', '2024-02-29'),
('Maman Suparman', 'Gang Mawar No. 15, Pekanbaru', '081234567815', 'maman.s@mail.com', 'pass137', '2024-03-17'),
('Nisa Aprilia', 'Jl. Gajah Mada No. 8, Balikpapan', '081234567816', 'nisa.a@mail.com', 'pass138', '2024-04-05'),
('Oscar Pratama', 'Komplek Bumi Serpong Damai, Serpong', '081234567817', 'oscar.p@mail.com', 'pass139', '2024-05-11'),
('Putri Regina', 'Jalan Gatot Subroto Kav. 3, Jakarta', '081234567818', 'putri.r@mail.com', 'pass140', '2024-06-01'),
('Qodri Wijaya', 'Perumahan Bunga Raya Blok F9, Padang', '081234567819', 'qodri.w@mail.com', 'pass141', '2024-07-09'),
('Rina Melati', 'Jl. Ahmad Yani No. 2, Samarinda', '081234567820', 'rina.m@mail.com', 'pass142', '2024-08-16');




-- 1.3. `Titik_Pengumpulan` (Lokasi Penyetoran)

INSERT INTO Titik_Pengumpulan (nama_lokasi, alamat_lokasi, nama_petugas) VALUES
('Eco-Center Jakarta Pusat', 'Jl. Thamrin No. 5, Jakarta Pusat', 'Adi Wijaya'),
('Drop Point Bandung Utara', 'Jl. Dago Atas No. 20, Bandung', 'Bagas Pramana'),
('Recycle Hub Surabaya Timur', 'Jl. Arief Rachman Hakim No. 100, Surabaya', 'Citra Dewi'),
('Kolekta Zone Medan', 'Komplek Setiabudi No. 15, Medan', 'Dion Saputra'),
('Gudang E-Waste Yogyakarta', 'Jl. Magelang KM 7, Sleman, Yogyakarta', 'Erlina Kusuma'),
('Pusat Daun Ulang Makassar', 'Jl. Perintis Kemerdekaan No. 3, Makassar', 'Fahmi Hidayat'),
('Pos Kumpul Semarang', 'Jl. Pandanaran No. 50, Semarang', 'Gina Fatma'),
('Depo Limbah Palembang', 'Jl. Radial No. 8, Palembang', 'Hadi Sucipto'),
('Green Corner Denpasar', 'Jl. Teuku Umar Barat No. 12, Denpasar', 'Intan Sari'),
('Unit Penampungan Bogor', 'Jl. Pajajaran No. 30, Bogor', 'Joko Santoso'),
('Service Center Bekasi', 'Jl. Kalimalang Blok A, Bekasi', 'Karina Larasati'),
('E-Waste Mall Tangerang', 'Mall Alam Sutera Lt. Dasar, Tangerang', 'Lukman Hakim'),
('Pondok Recycle Malang', 'Jl. Veteran No. 10, Malang', 'Maya Puspita'),
('Pusat Pengolahan Cirebon', 'Jl. Tuparev No. 1, Cirebon', 'Nanda Rizky'),
('Shelter Eko Pekanbaru', 'Jl. Riau No. 45, Pekanbaru', 'Octa Permana'),
('Balikpapan Eco Station', 'Jl. Jendral Sudirman No. 1, Balikpapan', 'Pipit Safitri'),
('BSD Collect Point', 'AEON Mall BSD City, Ground Floor, Serpong', 'Quentin Riza'),
('Gatsu Ewaste Spot', 'Menara Standard Chartered, Jakarta Selatan', 'Rani Amelia'),
('Padang Green Hub', 'Jl. Khatib Sulaiman No. 5, Padang', 'Sandy Kurniawan'),
('Samarinda Waste Desk', 'Mall SCP Lt. 2, Samarinda', 'Tia Utami');




-- 1.4. `Teknisi` (Staf Sortir/Bongkar)

INSERT INTO Teknisi (nama_teknisi, keahlian) VALUES
('Joni Elektrik', 'Servis Motherboard'),
('Maria PCB', 'Pemisahan Komponen PCB'),
('Taufik Baterai', 'Daur Ulang Baterai Lithium'),
('Lidya Logam', 'Pemurnian Logam Mulia'),
('Denny LCD', 'Perbaikan Layar/Panel'),
('Putra Kabel', 'Sortir Kabel Tembaga'),
('Asep Bongkar', 'Pembongkaran Laptop/PC'),
('Bima Printer', 'Perbaikan Printer'),
('Clara Chip', 'Identifikasi Chipset'),
('Dedi Solder', 'Penyolderan Presisi'),
('Edo Mesin', 'Perawatan Mesin Penghancur'),
('Fitri Monitor', 'Sortir Monitor CRT/LED'),
('Gilang Sensor', 'Perbaikan Sensor Elektronik'),
('Hilda Plastik', 'Pemisahan Casing Plastik'),
('Iwan Audio', 'Perbaikan Perangkat Audio'),
('Jeni Gadget', 'Pembongkaran Ponsel/Tablet'),
('Koko Power', 'Servis Power Supply'),
('Lia Network', 'Perbaikan Perangkat Jaringan'),
('Miko Kamera', 'Perbaikan Kamera Digital'),
('Nindi Optik', 'Perbaikan Drive Optik (CD/DVD)');




-- 1.5. `Komponen` (Material Bernilai)

INSERT INTO Komponen (nama_komponen, nilai_poin_per_gram) VALUES
('Emas Murni (PC)', 5000),
('Paladium (Kapasitor)', 4500),
('Tembaga Murni (Kabel)', 80),
('Aluminium (Heatsink)', 15),
('Plastik ABS (Casing)', 2),
('Besi Baja (Chassis)', 1),
('Kaca Monitor CRT', 0),
('PCB Level Tinggi', 150),
('PCB Level Menengah', 80),
('RAM Modul', 3000),
('Chipset (CPU/GPU)', 4000),
('Hard Disk Plat', 10),
('Baterai Li-ion', 50),
('Transformator Tembaga', 120),
('Konektor Berlapis Emas', 500),
('Capacitor Tantalum', 2000),
('Kabel Koaksial', 40),
('Power Supply Unit (PSU)', 50),
('Floppy Disk/CD Drive', 5),
('Layar LCD Panel', 20);


-- 2\. Data  untuk Tabel Transaksi (20 Baris)

-- 2.1. `Ewaste` (Barang Masuk)

INSERT INTO Ewaste (kode_ewaste, id_anggota, id_jenis_ewaste, merek, deskripsi_kondisi, tanggal_pendaftaran, status) VALUES
('EWT-001', 1, 1, 'Samsung', 'Layar retak, mesin hidup', '2024-09-01', 'Diterima'),
('EWT-002', 2, 2, 'Dell', 'Mati total, casing utuh', '2024-09-02', 'Diterima'),
('EWT-003', 3, 3, 'LG', 'Layar bergaris, fisik besar', '2024-09-03', 'Diterima'),
('EWT-004', 4, 4, 'Acer', 'Layar pecah, mesin mati', '2024-09-04', 'Diterima'),
('EWT-005', 5, 5, 'Epson', 'Tinta kering, ada bagian patah', '2024-09-05', 'Diterima'),
('EWT-006', 6, 6, 'HP', 'Toner habis, body lecet', '2024-09-06', 'Diterima'),
('EWT-007', 7, 7, 'Asus', 'CPU tanpa RAM dan HDD', '2024-09-07', 'Diterima'),
('EWT-008', 8, 8, 'Sony', 'Sudah dibongkar, sisa tabung', '2024-09-08', 'Diterima'),
('EWT-009', 9, 9, 'Panasonic', 'Layar mati, suara normal', '2024-09-09', 'Diterima'),
('EWT-010', 10, 10, 'Logitech', 'Mouse dan Keyboard rusak', '2024-09-10', 'Diterima'),
('EWT-011', 11, 11, 'TP-Link', 'Tidak bisa booting', '2024-09-11', 'Diterima'),
('EWT-012', 12, 12, 'Universal', 'Campuran kabel power dan data', '2024-09-12', 'Diterima'),
('EWT-013', 13, 13, 'Samsung', 'Baterai kembung (3 pcs)', '2024-09-13', 'Diterima'),
('EWT-014', 14, 14, 'Seagate', 'HDD 1TB bad sector', '2024-09-14', 'Diterima'),
('EWT-015', 15, 15, 'Kingston', 'RAM DDR3 4GB (2 keping)', '2024-09-15', 'Diterima'),
('EWT-016', 16, 16, 'Gigabyte', 'Motherboard lama, masih lengkap', '2024-09-16', 'Diterima'),
('EWT-017', 17, 17, 'Canon', 'Lensa macet, body utuh', '2024-09-17', 'Diterima'),
('EWT-018', 18, 18, 'DJI', 'Remote rusak, unit drone utuh', '2024-09-18', 'Diterima'),
('EWT-019', 19, 19, 'Epson', 'Lampu mati, fisik baik', '2024-09-19', 'Diterima'),
('EWT-020', 20, 20, 'Microsoft', 'Konsol rusak, tanpa kabel', '2024-09-20', 'Diterima');




-- 2.2. `Transaksi_Penyetoran`


INSERT INTO Transaksi_Penyetoran (kode_ewaste, id_titik_kumpul, tanggal_setor) VALUES
('EWT-001', 1, '2024-09-01 10:00:00'),
('EWT-002', 2, '2024-09-02 11:30:00'),
('EWT-003', 3, '2024-09-03 14:45:00'),
('EWT-004', 4, '2024-09-04 09:15:00'),
('EWT-005', 5, '2024-09-05 16:00:00'),
('EWT-006', 6, '2024-09-06 13:20:00'),
('EWT-007', 7, '2024-09-07 10:40:00'),
('EWT-008', 8, '2024-09-08 15:10:00'),
('EWT-009', 9, '2024-09-09 11:55:00'),
('EWT-010', 10, '2024-09-10 17:30:00'),
('EWT-011', 11, '2024-09-11 12:05:00'),
('EWT-012', 12, '2024-09-12 08:30:00'),
('EWT-013', 13, '2024-09-13 14:00:00'),
('EWT-014', 14, '2024-09-14 10:10:00'),
('EWT-015', 15, '2024-09-15 16:50:00'),
('EWT-016', 16, '2024-09-16 11:25:00'),
('EWT-017', 17, '2024-09-17 13:40:00'),
('EWT-018', 18, '2024-09-18 09:00:00'),
('EWT-019', 19, '2024-09-19 15:30:00'),
('EWT-020', 20, '2024-09-20 12:45:00');



--2.3. `Hasil_Sortir`



INSERT INTO Hasil_Sortir (kode_ewaste, id_komponen, id_teknisi, berat_gram, tanggal_sortir) VALUES
('EWT-001', 13, 15, 250.50, '2024-09-21'), -- Baterai Li-ion (Ponsel)
('EWT-001', 8, 1, 80.00, '2024-09-21'), -- PCB Level Tinggi
('EWT-002', 10, 2, 60.00, '2024-09-22'), -- RAM Modul (Laptop)
('EWT-002', 11, 2, 10.00, '2024-09-22'), -- Chipset
('EWT-003', 7, 3, 5000.00, '2024-09-23'), -- Kaca Monitor CRT
('EWT-004', 18, 4, 1500.00, '2024-09-24'), -- Power Supply Unit
('EWT-005', 4, 5, 500.00, '2024-09-25'), -- Aluminium (Printer)
('EWT-006', 5, 6, 2000.00, '2024-09-26'), -- Plastik ABS
('EWT-007', 16, 7, 10.50, '2024-09-27'), -- Capacitor Tantalum (CPU)
('EWT-008', 6, 8, 8000.00, '2024-09-28'), -- Besi Baja (TV Tabung)
('EWT-009', 20, 9, 3000.00, '2024-09-29'), -- Layar LCD Panel
('EWT-010', 3, 10, 50.00, '2024-09-30'), -- Tembaga Murni (Kabel)
('EWT-011', 9, 11, 120.00, '2024-10-01'), -- PCB Level Menengah
('EWT-012', 3, 12, 150.00, '2024-10-02'), -- Tembaga Murni (Kabel)
('EWT-013', 13, 13, 750.00, '2024-10-03'), -- Baterai Li-ion
('EWT-014', 12, 14, 200.00, '2024-10-04'), -- Hard Disk Plat
('EWT-015', 10, 15, 30.00, '2024-10-05'), -- RAM Modul
('EWT-016', 1, 16, 0.50, '2024-10-06'), -- Emas Murni (Motherboard)
('EWT-017', 15, 17, 1.20, '2024-10-07'), -- Konektor Berlapis Emas
('EWT-018', 11, 18, 5.00, '2024-10-08'), -- Chipset (Drone)
('EWT-019', 4, 19, 150.00, '2024-10-09'), -- Aluminium
('EWT-020', 10, 20, 45.00, '2024-10-10'); -- RAM Modul (Console)
