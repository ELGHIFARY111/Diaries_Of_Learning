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
                    <input type="text" name="judul" class="input-title" value="<?= htmlspecialchars($catatan['judul']) ?>" required placeholder="Enter Title Here...">
                    <hr class="separator">
                    <textarea name="isi" class="input-body" required placeholder="Start typing here"><?= htmlspecialchars($catatan['konten_path']) ?></textarea>
                </div>

                <div class="attachment-sheet">
                    <h4 class="attachment-title">📎 Media Attachments</h4>
                    
                    <div class="media-grid">
                        <div class="media-item">
                            <label class="media-label">📸 Photo</label>
                            <?php if(!empty($catatan['file_foto'])): ?>
                                <div class="media-preview">
                                    <img src="uploads/<?= $catatan['file_foto'] ?>" alt="Current Photo">
                                    <span>Current file</span>
                                </div>
                            <?php endif; ?>
                            <input type="file" name="foto" accept="image/*" class="input-file">
                        </div>

                        <div class="media-item">
                            <label class="media-label">🎤 Voice Note</label>
                            <?php if(!empty($catatan['file_audio'])): ?>
                                <div class="media-preview-audio">
                                    <audio controls>
                                        <source src="uploads/<?= $catatan['file_audio'] ?>">
                                    </audio>
                                    <span>Current audio attached</span>
                                </div>
                            <?php endif; ?>
                            <input type="file" name="audio" accept="audio/*" class="input-file">
                        </div>

                        <div class="media-item">
                            <label class="media-label">🎥 Video</label>
                            <?php if(!empty($catatan['file_video'])): ?>
                                <div class="media-preview-text">
                                    <span>▶ Current video attached</span>
                                </div>
                            <?php endif; ?>
                            <input type="file" name="video" accept="video/*" class="input-file">
                        </div>
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