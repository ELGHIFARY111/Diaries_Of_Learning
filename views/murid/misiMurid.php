<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misi Saya - Diary Sekolah</title>
    <link rel="stylesheet" href="../css/misiMuridStyle.css">
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

            <div class="header">
                <h2>Misi</h2>
                <p>Selesaikan misi dari gurumu dan kumpulkan poin!</p>
            </div>

            <h3 class="section-title">🔥 Misi Sedang Berjalan</h3>
            
            <div class="mission-list">
                
                <div class="mission-card active-card">
                    <div class="card-top">
                        <span class="badge badge-school">🏫 Misi Sekolah</span>
                        <span class="deadline">⏳ Sisa 2 Hari</span>
                    </div>
                    
                    <div class="mission-title">Tantangan Adjective (Kata Sifat)</div>
                    <p class="mission-desc">
                        Cari 5 kata sifat yang unik untuk mendeskripsikan teman sekelasmu.
                    </p>

                    <div class="progress-area">
                        <div class="progress-info">
                            <span>Progres Kamu</span>
                            <span>3/5 Kata</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 60%;"></div>
                        </div>
                    </div>

                    <button class="btn-action" onclick="window.location.href='kerjakanMisiMurid.php'">Lanjutkan Misi</button>
                </div>

                <div class="mission-card active-card">
                    <div class="card-top">
                        <span class="badge badge-global">🌍 Misi Global</span>
                        <span class="deadline">⏳ Sisa 5 Hari</span>
                    </div>
                    
                    <div class="mission-title">Daily Verbs Mastery</div>
                    <p class="mission-desc">
                        Pelajari dan gunakan 10 kata kerja sehari-hari dalam kalimat (Makan, Minum, Tidur, dll).
                    </p>

                    <div class="progress-area">
                        <div class="progress-info">
                            <span>Progres Kamu</span>
                            <span>1/10 Kata</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 10%;"></div>
                        </div>
                    </div>

                    <button class="btn-action" onclick="window.location.href='kerjakanMisiMurid.php'">Lanjutkan Misi</button>
                </div>

            </div>

        </div>

    </div>

</body>
</html>