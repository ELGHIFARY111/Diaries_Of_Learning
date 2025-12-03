<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - Simple</title>
    <link rel="stylesheet" href="../css/homeMuridStyle.css">
</head>

<body>

    <div class="container">

        <div class="sidebar">
            <div class="logo">📘 Diary Sekolah</div>
            <div class="menu">
                <a href="#" class="aktif">🏠 Dashboard</a>
                <a href="catatanMurid.php">📝 Catatan Harian</a>
                <a href="kosakataMurid.php">📖 Kosakata</a>
                <a href="misiMurid.php">🎯 Misi Saya</a>
                <a href="#">🚪 Logout</a>
            </div>
            <div class="user-info">
                Login sebagai:<br>
                <b>Dian Anggraini <?= "(siswa)" ?></b>
            </div>
        </div>

        <div class="content">

            <div class="header">
                <h2>Selamat Datang, Dian!</h2>
                <p>Hari ini: Kamis, 27 November 2025</p>
            </div>

            <div class="stats-box">
                <div class="card">
                    <p>Total Catatan</p>
                    <h3>12</h3>
                </div>
                <div class="card">
                    <p>Kosakata Baru</p>
                    <h3>50</h3>
                </div>
                <div class="card">
                    <p>Total Poin</p>
                    <h3>850</h3>
                </div>
            </div>

            <h3 style="margin-bottom: 10px;">Mau Ngapain?</h3>
            <div class="action-area">
                <div class="btn">✏️ Tulis Teks</div>
            </div>

            <div class="bottom-section">

                <div class="box">
                    <h3>🎯 Misi Aktif</h3>
                    <div class="list-item">
                        <b>Cari 5 Kata Sifat</b>
                        <p>Cari kata sifat tentang sekolah.</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 70%;"></div>
                        </div>
                        <small>Sudah 70%</small>
                    </div>
                </div>

                <div class="box">
                    <h3>🕒 Aktivitas Terakhir</h3>
                    <div class="list-item">
                        <b>Review Pelajaran</b> <br>
                        <span style="color: grey;">Kemarin - Teks</span>
                    </div>
                    <div class="list-item">
                        <b>Latihan Speaking</b> <br>
                        <span style="color: grey;">25 Nov - Audio</span>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>