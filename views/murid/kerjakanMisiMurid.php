<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mengerjakan Misi - Diary Sekolah</title>
    <link rel="stylesheet" href="../css/kerjakanMisiMuridStyle.css">
</head>

<body>

    <div class="container">

        <div class="sidebar">
            <div class="logo">📘 Diary Sekolah</div>
            <div class="menu">
                <a href="homeMurid.php">🏠 Dashboard</a>
                <a href="catatanMurid.php">📝 Catatan Harian</a>
                <a href="kosakataMurid.php">📖 Kosakata</a>
                <a href="misiMurid.php" class="aktif">🎯 Misi Saya</a>
                <a href="#">🚪 Logout</a>
            </div>
            <div class="user-info">
                Login sebagai:<br>
                <b>Dian Anggraini <?= "(siswa)" ?></b>
            </div>
        </div>

        <div class="content">

            <a href="misi.php" class="btn-back">⬅ Kembali ke Daftar Misi</a>

            <div class="header-misi">
                <span class="badge badge-school">🏫 Misi Sekolah</span>
                <h1>Tantangan Adjective (Kata Sifat)</h1>
                <p class="deskripsi">
                    Instruksi: Cari arti dari 5 kata sifat di bawah ini, lalu buatlah satu contoh kalimat sederhana menggunakan kata tersebut.
                </p>
                
                <div class="progress-container">
                    <span>Progress: 0/5 Kata Selesai</span>
                    <div class="progress-track">
                        <div class="progress-fill" style="width: 0%;"></div>
                    </div>
                </div>
            </div>

            <form action="" method="POST">
                
                <div class="task-card">
                    <div class="word-target">1. Brave</div>
                    
                    <div class="input-group">
                        <label>Arti (Indonesia):</label>
                        <input type="text" name="arti_1" class="input-field" placeholder="Contoh: Berani" required>
                    </div>

                    <div class="input-group">
                        <label>Contoh Kalimat:</label>
                        <input type="text" name="kalimat_1" class="input-field" placeholder="Contoh: He is brave enough to speak up." required>
                    </div>
                </div>

                <div class="task-card">
                    <div class="word-target">2. Generous</div>
                    
                    <div class="input-group">
                        <label>Arti (Indonesia):</label>
                        <input type="text" name="arti_2" class="input-field" placeholder="Masukan arti..." required>
                    </div>

                    <div class="input-group">
                        <label>Contoh Kalimat:</label>
                        <input type="text" name="kalimat_2" class="input-field" placeholder="Buat kalimat..." required>
                    </div>
                </div>

                <div class="task-card">
                    <div class="word-target">3. Honest</div>
                    
                    <div class="input-group">
                        <label>Arti (Indonesia):</label>
                        <input type="text" name="arti_3" class="input-field" required>
                    </div>

                    <div class="input-group">
                        <label>Contoh Kalimat:</label>
                        <input type="text" name="kalimat_3" class="input-field" required>
                    </div>
                </div>

                <div class="action-area">
                    <button type="submit" class="btn-submit" onclick="window.location.href='misiMurid.php'">✅ Kirim Jawaban Misi</button>
                </div>

            </form>

        </div>

    </div>

</body>
</html>