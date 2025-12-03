<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Kosakata - Diary Sekolah</title>
    <link rel="stylesheet" href="../css/kosakataMuridStyle.css">
</head>

<body>

    <div class="container">

        <div class="sidebar">
            <div class="logo">📘 Diary Sekolah</div>
            <div class="menu">
                <a href="homeMurid.php">🏠 Dashboard</a>
                <a href="catatan.php">📝 Catatan Harian</a>
                <a href="#" class="aktif">📖 Kosakata</a>
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
                <h2>Bank Kosakata</h2>
                <p>Kumpulkan kata-kata baru dan perkaya bahasamu.</p>
            </div>

            <div class="form-box">
                <h3>➕ Tambah Kata Baru</h3>
                <form action="" method="POST" style="margin-top: 15px;">
                    
                    <div class="form-row">
                        <div class="form-group half">
                            <label>Kata (Inggris)</label>
                            <input type="text" name="kata_inggris" class="input-field" placeholder="Ex: Eager" required>
                        </div>
                        <div class="form-group half">
                            <label>Arti (Indonesia)</label>
                            <input type="text" name="arti" class="input-field" placeholder="Ex: Bersemangat" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Contoh Penggunaan (Kalimat)</label>
                        <input type="text" name="contoh" class="input-field" placeholder="Ex: He is eager to learn English.">
                    </div>

                    <button type="submit" class="btn-simpan">Simpan Kata</button>
                </form>
            </div>

            <div class="list-section">
                <div class="list-header">
                    <h3>📚 Koleksi Katamu (5 Kata)</h3>
                    <input type="text" class="search-box" placeholder="Cari kata...">
                </div>

                <div class="vocab-grid">
                    
                    <div class="vocab-card">
                        <div class="word-en">Determined</div>
                        <div class="word-id">Bertekad / Gigih</div>
                        <div class="word-example">"She is determined to pass the exam."</div>
                    </div>

                    <div class="vocab-card">
                        <div class="word-en">Curious</div>
                        <div class="word-id">Penasaran</div>
                        <div class="word-example">"I am curious about the ending of the movie."</div>
                    </div>

                    <div class="vocab-card">
                        <div class="word-en">Achieve</div>
                        <div class="word-id">Mencapai</div>
                        <div class="word-example">"Work hard to achieve your goals."</div>
                    </div>

                    <div class="vocab-card">
                        <div class="word-en">Improve</div>
                        <div class="word-id">Meningkatkan</div>
                        <div class="word-example">"I want to improve my speaking skills."</div>
                    </div>

                     <div class="vocab-card">
                        <div class="word-en">Library</div>
                        <div class="word-id">Perpustakaan</div>
                        <div class="word-example">"We study in the library."</div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</body>
</html>