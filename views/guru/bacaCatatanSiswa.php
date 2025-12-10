<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca Catatan Siswa</title>
    <link rel="stylesheet" href="./views/css/guru.css">

</head>
<body>

    <div class="container-baca">
        <a href="index.php?page=guru/review_catatan" class="btn-back">← Kembali ke Daftar Review</a>

        <div class="header-note">
            <div class="note-title"><?= htmlspecialchars($catatan['judul']) ?></div>
            <div class="note-meta">
                Penulis: <b><?= htmlspecialchars($catatan['nama_lengkap']) ?></b> | 
                Tanggal: <?= date('d F Y - H:i', strtotime($catatan['tanggal_catatan'])) ?>
            </div>
        </div>

        <div class="note-content">
            <?= htmlspecialchars($catatan['konten_path']) ?>
        </div>

        <div class="action-area">
            <?php if ($catatan['status_review'] == 'pending'): ?>
                <span style="margin-right: 15px; color: #e67e22;">Catatan ini belum direview.</span>
                <a href="index.php?page=guru/proses_review&id=<?= $catatan['id_catatan'] ?>" 
                   class="btn-approve" onclick="return confirm('Tandai sudah dibaca?')">
                   Tandai Sudah Direview
                </a>
            <?php else: ?>
                <span style="color: #27ae60; font-weight: bold;">✔ Catatan ini sudah direview.</span>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>