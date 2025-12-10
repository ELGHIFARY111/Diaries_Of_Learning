<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Note</title>
    <link rel="stylesheet" href="views/css/catatanMuridStyle.css">
</head>
<body>

    <div class="container">
        <div class="content">

            <div style="margin-bottom: 20px;">
                <a href="index.php?page=murid/catatanMurid&active=catatan&aktif=true" style="text-decoration: none; color: #555; font-weight: bold;">
                    ← Cancel Add
                </a>
            </div>

            <div class="header">
                <h2>Add Note</h2>
                <p>Update your story.</p>
            </div>

            <form action="index.php?page=murid/tambah_catatan" method="POST" class="note-form" enctype="multipart/form-data">
                
                <div class="word-sheet">
                    <input type="text" name="judul" class="input-title" required placeholder="Enter Title Here...">
                    
                    <hr class="separator">
                    
                    <textarea name="isi" class="input-body" required placeholder="Start typing here"></textarea>
                </div>

                <div class="attachment-sheet">
                    <h4 class="attachment-title">Media Attachments</h4>
                    
                    <div class="media-grid">
                        <div class="media-item">
                            <label class="media-label">Photo</label>
                            <input type="file" name="foto" accept="image/*" class="input-file">
                        </div>

                        <div class="media-item">
                            <label class="media-label">Voice Note</label>
                            <input type="file" name="audio" accept="audio/*" class="input-file">
                        </div>

                        <div class="media-item">
                            <label class="media-label">Video</label>
                            <input type="file" name="video" accept="video/*" class="input-file">
                        </div>
                    </div>
                </div>

                <div class="action-bar">
                    <button type="submit" name="simpan_catatan" class="btn-simpan">Add Notes</button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>