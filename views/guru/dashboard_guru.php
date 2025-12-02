<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru - Diary of Learning</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./view/css/dashboard_guru.css">
</head>

<body>

    <div class="container">

                <div class="sidebar">
            <div class="logo">📘 Diary of Learning</div>
            <div class="menu">
                <a href="#" class="aktif">🏠 Dashboard</a>
                <a href="#">🧑‍🎓 Daftar Siswa</a>
                <a href="#">🎯 Misi Kosa Kata Sekolah</a>
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
                <h2>Selamat Datang, Bapak Andi! 👋</h2>
                <p>Dashboard Pengawasan Institusi: SMA Bintang Timur. Pantau aktivitas belajar siswa Anda.</p>
            </div>

            <div class="stats-box">
                <div class="card">
                    <p>Total Siswa Diawasi</p>
                    <h3>50</h3>
                </div>
                <div class="card">
                    <p>Catatan Menunggu Review</p>
                    <h3>12</h3>
                </div>
                <div class="card">
                    <p>Misi Aktif Sekolah</p>
                    <h3>1</h3>
                </div>
            </div>

            <h3 style="margin-bottom: 15px; font-size: 1.5em; color: #2c3e50;">Aksi Cepat Supervisor</h3>
            <div class="action-area">
                <a href="#" class="btn-action btn-success">🎯 Buat Misi Baru Institusi</a>
                <a href="#" class="btn-action btn-primary">📝 Review Catatan Masuk (12)</a>
            </div>

            <div class="bottom-section">

                <div class="box">
                    <h3>📈 Progres Siswa Terbaru</h3>
                    <div class="list-item">
                        <b>Dian Anggraini</b>
                        <p>Aktivitas: Menulis Refleksi | Nilai: 80.50%</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 80.5%;"></div>
                        </div>
                    </div>
                    <div class="list-item">
                        <b>Edo Firmansyah</b>
                        <p>Aktivitas: Menulis Refleksi | Nilai: 95.00%</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 95%;"></div>
                        </div>
                    </div>
                    <div class="list-item">
                        <b>Fiona Cahyadi</b>
                        <p>Aktivitas: Kosakata Misi | Progres: 5/10 Unit</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 50%;"></div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <h3>📝 Catatan Harian Terbaru</h3>
                    <div class="list-item">
                        <b>Edo Firmansyah</b>
                        <span style="color: #27ae60;">'Refleksi Pelajaran Sejarah'</span>
                        <p style="margin-top: 5px; color: #aaa;">2025-10-01 (Menunggu Review)</p>
                    </div>
                    <div class="list-item">
                        <b>Dian Anggraini</b>
                        <span style="color: #2980b9;">'Kosa Kata: Ambiguous'</span>
                        <p style="margin-top: 5px; color: #aaa;">2025-10-05 (Selesai Direview)</p>
                    </div>
                    <div class="list-item">
                        <b>Fiona Cahyadi</b>
                        <span style="color: #27ae60;">'Laporan Tugas Kelompok'</span>
                        <p style="margin-top: 5px; color: #aaa;">2025-10-07 (Menunggu Review)</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>