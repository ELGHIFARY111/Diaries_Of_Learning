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
                <a href="index.php?page=murid/catatanMurid" style="text-decoration: none; color: #555; font-weight: bold;">
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

            <div style="margin-top: 30px; text-align: right;">
                <a href="index.php?page=murid/hapus&id=<?= $catatan['id_catatan'] ?>" 
                   onclick="return confirm('Delete this note?')"
                   style="background: #ff6b6b; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                   Delete Note
                </a>
            </div>

        </div>
    </div>

</body>
</html>