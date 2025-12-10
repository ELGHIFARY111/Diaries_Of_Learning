<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Write New Note</title>
    <link rel="stylesheet" href="views/css/catatanMuridStyle.css">
</head>
<body>

    <div class="container">
        <div class="content">

            <div style="margin-bottom: 20px;">
                <a href="index.php?page=murid/catatanMurid" style="text-decoration: none; color: #555; font-weight: bold;">
                    ← Back to My Notes
                </a>
            </div>

            <div class="header">
                <h2>Write New Note</h2>
                <p>Record your learning journey today.</p>
            </div>

            <form action="" method="POST" class="note-form" enctype="multipart/form-data">
                
                <div class="word-sheet">
                    <input type="text" name="judul" class="input-title" placeholder="Title..." required>
                    <hr class="separator">
                    <textarea name="isi" class="input-body" placeholder="Start writing..." required></textarea>
                </div>

                <div style="margin-top: 20px; padding: 15px; background: #f9f9f9; border-radius: 8px;">
                    <h4 style="margin-bottom: 10px; color: #555;">Attach Media (Optional)</h4>
                    
                    <div style="margin-bottom: 10px;">
                        <label>📸 Photo:</label><br>
                        <input type="file" name="foto" accept="image/*">
                    </div>

                    <div style="margin-bottom: 10px;">
                        <label>🎤 Voice Note:</label><br>
                        <input type="file" name="audio" accept="audio/*">
                    </div>

                    <div style="margin-bottom: 10px;">
                        <label>🎥 Video:</label><br>
                        <input type="file" name="video" accept="video/*">
                    </div>
                </div>
                <div class="action-bar">
                    <button type="submit" name="simpan_catatan" class="btn-simpan">Save Note</button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>