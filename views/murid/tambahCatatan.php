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

            <form action="" method="POST" class="note-form">
                
                <div class="word-sheet">
                    <input type="text" name="judul" class="input-title" placeholder="Title: Learning Simple Present Tense..." required autocomplete="off">
                    
                    <hr class="separator">

                    <textarea name="isi" class="input-body" placeholder="Start writing your story here..." required></textarea>
                </div>

                <div class="action-bar">
                    <button type="submit" name="simpan_catatan" class="btn-simpan">Save Note</button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>