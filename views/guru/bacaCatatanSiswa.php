<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Student Note</title>
    <link rel="stylesheet" href="./views/css/guru.css">

</head>
<body>

    <div class="container-baca">
        <a href="index.php?page=guru/review_catatan" class="btn-back">← Back to Review List</a>

        <div class="header-note">
            <div class="note-title"><?= htmlspecialchars($catatan['judul']) ?></div>
            <div class="note-meta">
                Author: <b><?= htmlspecialchars($catatan['nama_lengkap']) ?></b> | 
                Date: <?= date('d F Y - H:i', strtotime($catatan['tanggal_catatan'])) ?>
            </div>
        </div>

        <div class="note-content">
            <?= htmlspecialchars($catatan['konten_path']) ?>
        </div>
        <div class="media-section" style="margin-top: 30px; border-top: 1px dashed #ccc; padding-top: 20px;">
            
            <?php if (!empty($catatan['file_foto'])): ?>
                <div style="margin-bottom: 25px;">
                    <h4 style="margin-bottom: 10px; color: #555; font-size: 14px;">Photo Attachment:</h4>
                    <div style="background: #fdfdfd; padding: 10px; border: 1px solid #eee; border-radius: 8px; display: inline-block;">
                        <img src="uploads/<?= $catatan['file_foto'] ?>" style="max-width: 100%; max-height: 400px; border-radius: 5px;">
                        <br>
                        <a href="uploads/<?= $catatan['file_foto'] ?>" target="_blank" style="display:inline-block; margin-top:5px; font-size:12px; color:#3498db; text-decoration:none;">
                            🔍 View Full Size
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($catatan['file_audio'])): ?>
                <div style="margin-bottom: 25px;">
                    <h4 style="margin-bottom: 10px; color: #555; font-size: 14px;">Voice Recording:</h4>
                    <audio controls style="width: 100%; max-width: 500px;">
                        <source src="uploads/<?= $catatan['file_audio'] ?>">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            <?php endif; ?>

            <?php if (!empty($catatan['file_video'])): ?>
                <div style="margin-bottom: 25px;">
                    <h4 style="margin-bottom: 10px; color: #555; font-size: 14px;">Video:</h4>
                    <video controls style="max-width: 100%; max-height: 400px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        <source src="uploads/<?= $catatan['file_video'] ?>">
                        Your browser does not support the video element.
                    </video>
                </div>
            <?php endif; ?>

        </div>
        <div class="action-area">
            <?php if ($catatan['status_review'] == 'pending'): ?>
                <span style="margin-right: 15px; color: #e67e22;">This note has not been reviewed yet.</span>
                <a href="index.php?page=guru/proses_review&id=<?= $catatan['id_catatan'] ?>" 
                   class="btn-approve" onclick="return confirm('Mark as read?')">
                    Mark as Reviewed
                </a>
            <?php else: ?>
                <span style="color: #27ae60; font-weight: bold;">✔ This note has been reviewed.</span>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>