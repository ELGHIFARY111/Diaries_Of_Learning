<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
    <link rel="stylesheet" href="views/css/catatanMuridStyle.css">
</head>
<body>

    <div class="container">
        <div class="content">

            <div style="margin-bottom: 20px;">
                <a href="index.php?page=murid/catatanMurid" style="text-decoration: none; color: #555; font-weight: bold;">
                    ← Cancel Edit
                </a>
            </div>

            <div class="header">
                <h2>Edit Note</h2>
                <p>Update your story.</p>
            </div>

            <form action="" method="POST" class="note-form" enctype="multipart/form-data">
                
                <div class="word-sheet">
                    <input type="text" name="judul" class="input-title" value="<?= htmlspecialchars($catatan['judul']) ?>" required>
                    <hr class="separator">
                    <textarea name="isi" class="input-body" required><?= htmlspecialchars($catatan['konten_path']) ?></textarea>
                </div>

                <div style="margin-top: 20px; padding: 20px; background: #f9f9f9; border-radius: 10px; border: 1px solid #eee;">
                    <h4 style="margin-bottom: 15px; color: #555;">Update Media Files</h4>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="font-weight: bold;">📸 Photo:</label><br>
                        <?php if(!empty($catatan['file_foto'])): ?>
                            <div style="margin: 5px 0;">
                                <img src="uploads/<?= $catatan['file_foto'] ?>" style="height: 80px; border-radius: 5px;">
                                <br><small style="color: #888;">Current file (Upload new to replace)</small>
                            </div>
                        <?php endif; ?>
                        <input type="file" name="foto" accept="image/*">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="font-weight: bold;">🎤 Voice Note:</label><br>
                        <?php if(!empty($catatan['file_audio'])): ?>
                            <div style="margin: 5px 0;">
                                <audio controls style="height: 30px;">
                                    <source src="uploads/<?= $catatan['file_audio'] ?>">
                                </audio>
                                <br><small style="color: #888;">Current file exists</small>
                            </div>
                        <?php endif; ?>
                        <input type="file" name="audio" accept="audio/*">
                    </div>

                    <div style="margin-bottom: 10px;">
                        <label style="font-weight: bold;">🎥 Video:</label><br>
                        <?php if(!empty($catatan['file_video'])): ?>
                            <div style="margin: 5px 0; color: #3498db; font-size: 14px;">
                                ▶ Current video attached
                            </div>
                        <?php endif; ?>
                        <input type="file" name="video" accept="video/*">
                    </div>

                </div>
                <div class="action-bar">
                    <button type="submit" name="update_catatan" class="btn-simpan">Update Changes</button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>