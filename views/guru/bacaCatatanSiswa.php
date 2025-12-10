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
        <div class="media-section" style="margin-top: 30px; border-top: 1px dashed #ccc; padding-top: 20px;">
            
            <?php if (!empty($catatan['file_foto'])): ?>
                <div style="margin-bottom: 25px;">
                    <h4 style="margin-bottom: 10px; color: #555; font-size: 14px;">Lampiran Foto:</h4>
                    <div style="background: #fdfdfd; padding: 10px; border: 1px solid #eee; border-radius: 8px; display: inline-block;">
                        <img src="uploads/<?= $catatan['file_foto'] ?>" style="max-width: 100%; max-height: 400px; border-radius: 5px;">
                        <br>
                        <a href="uploads/<?= $catatan['file_foto'] ?>" target="_blank" style="display:inline-block; margin-top:5px; font-size:12px; color:#3498db; text-decoration:none;">
                            🔍 Lihat Ukuran Penuh
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($catatan['file_audio'])): ?>
                <div style="margin-bottom: 25px;">
                    <h4 style="margin-bottom: 10px; color: #555; font-size: 14px;">Rekaman Suara:</h4>
                    <audio controls style="width: 100%; max-width: 500px;">
                        <source src="uploads/<?= $catatan['file_audio'] ?>">
                        Browser Anda tidak mendukung elemen audio.
                    </audio>
                </div>
            <?php endif; ?>

            <?php if (!empty($catatan['file_video'])): ?>
                <div style="margin-bottom: 25px;">
                    <h4 style="margin-bottom: 10px; color: #555; font-size: 14px;">Video:</h4>
                    <video controls style="max-width: 100%; max-height: 400px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        <source src="uploads/<?= $catatan['file_video'] ?>">
                        Browser Anda tidak mendukung elemen video.
                    </video>
                </div>
            <?php endif; ?>

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