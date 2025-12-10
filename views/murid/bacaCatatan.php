<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($catatan['judul']) ?> - Read Note</title>
    <link rel="stylesheet" href="views/css/catatanMuridStyle.css">
    <link rel="stylesheet" href="views/css/murid.css">
    <style>
        /* Override sedikit untuk mode baca */

    </style>
</head>
<body>

    <div class="container">
        <div class="content">

            <div style="margin-bottom: 20px;">
                <a href="index.php?page=murid/catatanMurid&active=catatan&aktif=true" style="text-decoration: none; color: #555; font-weight: bold;">
                    ← Back to List
                </a>
            </div>

            <div class="header">
                <h2><?= htmlspecialchars($catatan['judul']) ?></h2>
                <div class="meta-info">
                    Created on: <?= date('l, d F Y - H:i', strtotime($catatan['tanggal_catatan'])) ?>
                </div>
            </div>

            <div class="read-content">
                <?= htmlspecialchars($catatan['konten_path']) ?>
            </div>
            <div class="media-gallery" style="margin-top: 30px;">

            <?php if (!empty($catatan['file_foto'])): ?>
                <div style="margin-bottom: 20px;">
                    <h4>Attached Photo:</h4>
                    <img src="uploads/<?= $catatan['file_foto'] ?>" style="max-width: 100%; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                </div>
            <?php endif; ?>

            <?php if (!empty($catatan['file_audio'])): ?>
                <div style="margin-bottom: 20px;">
                    <h4>Voice Note:</h4>
                    <audio controls style="width: 100%;">
                        <source src="uploads/<?= $catatan['file_audio'] ?>">
                        Browser Anda tidak mendukung audio player.
                    </audio>
                </div>
            <?php endif; ?>

            <?php if (!empty($catatan['file_video'])): ?>
                <div style="margin-bottom: 20px;">
                    <h4>Video:</h4>
                    <video controls style="max-width: 100%; border-radius: 10px;">
                        <source src="uploads/<?= $catatan['file_video'] ?>">
                        Browser Anda tidak mendukung video player.
                    </video>
                </div>
            <?php endif; ?>

        </div>
            <div style="margin-top: 30px; text-align: right;">
                <a href="index.php?page=murid/hapus&active=catatan&aktif=true&id=<?= $catatan['id_catatan'] ?>" 
                   onclick="return confirm('Delete this note?')"
                   style="background: #ff6b6b; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                   Delete Note
                </a>
            </div>

        </div>
    </div>

</body>
</html>