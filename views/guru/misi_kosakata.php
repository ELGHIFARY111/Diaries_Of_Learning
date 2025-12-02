<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misi Kosa Kata Sekolah - Diary of Learning (Guru)</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/misi_kosakata_guru.css">

    </style>
</head>

<body>

    <div class="container">

        <div class="sidebar">
            <div class="logo">📘 Diary of Learning</div>
            <div class="menu">
                <a href="#">🏠 Dashboard</a>
                <a href="#">🧑‍🎓 Daftar Siswa</a>
                <a href="#" class="aktif">🎯 Misi Kosa Kata Sekolah</a>
                <a href="#">📝 Review Catatan Siswa</a>
                <a href="#">📊 Laporan Progres</a>
                <a href="#">👤 Profil Guru</a>
                <a href="#">🚪 Logout</a>
            </div>
            <div class="user-info">
                Login sebagai:<br>
                <b>Bapak Andi (Guru)</b>
                <br>SMA Bintang Timur
            </div>
        </div>

        <div class="content">

            <div class="header">
                <div class="header-text">
                    <h2>Misi Kosa Kata Sekolah</h2>
                    <p>Kelola dan pantau misi kosakata yang Anda buat khusus untuk siswa di institusi ini.</p>
                </div>
                <a href="#" class="btn-success">➕ Buat Misi Baru</a>
            </div>
            

            <div class="data-table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nama Misi</th>
                            <th>Deskripsi Singkat</th>
                            <th>Durasi</th>
                            <th>Target Kosa Kata</th>
                            <th style="min-width: 150px;">Progres Siswa</th>
                            <th>Status</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tantangan 10 Kata Sifat (B1)</td>
                            <td>Temukan 10 kata sifat unik dari artikel berita.</td>
                            <td>12 Okt - 25 Okt 2025</td>
                            <td>10 Kata</td>
                            <td class="progress-indicator">
                                <div class="progress-percentage">85% Selesai</div>
                                <div class="progress-bar-container">
                                    <div class="progress-bar" style="width: 85%;"></div>
                                </div>
                                <div class="progress-text">42 dari 50 Siswa Lulus</div>
                            </td>
                            <td><span class="badge badge-active">AKTIF</span></td>
                            <td>
                                <div class="aksi-group">
                                    <button class="btn-aksi">Detail</button>
                                    <button class="btn-aksi">Edit</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>5 Idiom Makanan</td>
                            <td>Pelajari 5 idiom umum yang berkaitan dengan makanan.</td>
                            <td>1 Sep - 30 Sep 2025</td>
                            <td>5 Idiom</td>
                            <td class="progress-indicator">
                                <div class="progress-percentage">98% Selesai</div>
                                <div class="progress-bar-container">
                                    <div class="progress-bar progress-bar-complete" style="width: 98%;"></div>
                                </div>
                                <div class="progress-text">49 dari 50 Siswa Lulus</div>
                            </td>
                            <td><span class="badge badge-expired">SELESAI</span></td>
                            <td>
                                <div class="aksi-group">
                                    <button class="btn-aksi" style="background-color: var(--color-secondary);">Lapor</button>
                                    <button class="btn-delete">Hapus</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Misi November: Kata Kerja Transitif</td>
                            <td>Misi persiapan yang akan dimulai bulan depan.</td>
                            <td>1 Nov - 30 Nov 2025</td>
                            <td>15 Kata</td>
                            <td class="progress-indicator">
                                <div class="progress-percentage">0% Selesai</div>
                                <div class="progress-bar-container">
                                    <div class="progress-bar" style="width: 0%; background-color: #adb5bd;"></div>
                                </div>
                                <div class="progress-text">0 dari 50 Siswa Lulus</div>
                            </td>
                            <td><span class="badge badge-upcoming">SEGERA</span></td>
                            <td>
                                <div class="aksi-group">
                                    <button class="btn-aksi">Edit</button>
                                    <button class="btn-delete">Batalkan</button>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            
            <div class="footer-link">
                <a href="#">Lihat Misi Global</a>
            </div>

        </div>

    </div>

</body>

</html>