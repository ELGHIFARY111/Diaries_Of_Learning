<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Harian - Diary Sekolah</title>
    <link rel="stylesheet" href="../css/catatanMuridStyle.css">
</head>

<body>

    <div class="container">

        <div class="sidebar">
            <div class="logo">📘 Diary Sekolah</div>
            <div class="menu">
                <a href="homeMurid.php">🏠 Dashboard</a>
                <a href="#" class="aktif">📝 Catatan Harian</a> 
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
                <h2>Catatan Harian</h2>
                <p>Tulis pengalaman dan materi belajarmu hari ini.</p>
            </div>

            <div class="form-box">
                <h3 style="margin-bottom: 15px;">✍️ Tulis Catatan Baru</h3>
                
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Judul Catatan</label>
                        <input type="text" name="judul" class="input-field" placeholder="Contoh: Belajar Simple Present Tense" required>
                    </div>

                    <div class="form-group">
                        <label>Isi Jurnal</label>
                        <textarea name="isi" class="input-field" rows="6" placeholder="Ceritakan apa yang kamu pelajari hari ini..." required></textarea>
                    </div>

                    <button type="submit" class="btn-simpan">Simpan Catatan</button>
                </form>
            </div>

            <h3 style="margin: 30px 0 15px 0;">🕒 Riwayat Catatanmu</h3>
            
            <div class="history-card">
                <div class="card-meta">
                    <span>📅 27 Nov 2025</span>
                    <span>Pukul 08:30</span>
                </div>
                <div class="card-title">Review Pelajaran Minggu Lalu</div>
                <div class="card-body">
                    Hari ini saya mengulang kembali materi tentang Adjective. Saya belajar bahwa kata sifat biasanya diletakkan sebelum kata benda.
                </div>
            </div>

            <div class="history-card">
                <div class="card-meta">
                    <span>📅 26 Nov 2025</span>
                    <span>Pukul 14:15</span>
                </div>
                <div class="card-title">Target Hapalan Baru</div>
                <div class="card-body">
                    Saya berhasil menghapal 5 kosakata baru tentang lingkungan sekolah. Susah tapi menyenangkan.
                </div>
            </div>

        </div>

    </div>

</body>
</html>