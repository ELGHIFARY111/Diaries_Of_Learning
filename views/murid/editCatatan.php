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

            <form action="" method="POST" class="note-form">
                
                <div class="word-sheet">
                    
                    <input type="text" name="judul" class="input-title" 
                           value="<?= htmlspecialchars($catatan['judul']) ?>" 
                           required autocomplete="off">
                    
                    <hr class="separator">

                    <textarea name="isi" class="input-body" required><?= htmlspecialchars($catatan['konten_path']) ?></textarea>

                </div>

                <div class="action-bar">
                    <button type="submit" name="update_catatan" class="btn-simpan">Update Note</button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>