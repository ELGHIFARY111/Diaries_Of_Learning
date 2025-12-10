<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Notes</title>
    <link rel="stylesheet" href="views/css/catatanMuridStyle.css">
    <link rel="stylesheet" href="views/css/murid.css">
</head>
<body>

    <div class="container">
        <div class="content">

            <div class="header-actions">
                <div>
                    <h2>My Notes</h2>
                    <p style="color: #7f8c8d;">Your learning history gallery.</p>
                </div>
                
                <a href="index.php?page=murid/tambah_catatan&active=catatan&aktif=true" class="btn-add-new">
                    + Write New Note
                </a>
            </div>

            <div class="history-list">
                <?php if (!empty($daftar_catatan)): ?>
                    <?php foreach ($daftar_catatan as $row): ?>
                        
                        <div class="history-card" style="margin-bottom: 20px; padding: 20px; background: white; border-radius: 10px; border: 1px solid #eee; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                            
                            <div class="card-meta" style="color: #999; font-size: 12px; margin-bottom: 8px;">
                                <?= date('d M Y, H:i', strtotime($row['tanggal_catatan'])) ?>
                            </div>
                            
                            <div class="card-title" style="font-size: 18px; font-weight: bold; color: #333; margin-bottom: 10px;">
                                <?= htmlspecialchars($row['judul']) ?>
                            </div>
                            
                            <div class="card-body" style="color: #555; margin-bottom: 15px;">
                                <?= htmlspecialchars(substr($row['konten_path'], 0, 100)) ?>...
                            </div>

                            <div class="card-actions" style="display: flex; gap: 10px;">
                                <a href="index.php?page=murid/baca&active=catatan&aktif=true&id=<?= $row['id_catatan'] ?>" style="background: #eccc68; color: white; padding: 5px 12px; border-radius: 5px; text-decoration: none; font-size: 13px;">Read</a>
                                <a href="index.php?page=murid/edit&active=catatan&aktif=true&id=<?= $row['id_catatan'] ?>" style="background: #3498db; color: white; padding: 5px 12px; border-radius: 5px; text-decoration: none; font-size: 13px;">Edit</a>
                                <a href="index.php?page=murid/hapu&active=catatan&aktif=trues&id=<?= $row['id_catatan'] ?>" onclick="return confirm('Hapus?')" style="background: #ff6b6b; color: white; padding: 5px 12px; border-radius: 5px; text-decoration: none; font-size: 13px;">Delete</a>
                            </div>

                        </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="text-align: center; padding: 50px; color: #aaa;">
                        <p>Belum ada catatan.</p>
                        <a href="index.php?page=murid/tambah_catatan" style="color: #3498db; font-weight: bold;">Mulai menulis sekarang!</a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</body>
</html>