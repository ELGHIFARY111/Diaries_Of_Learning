<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Notes - School Diary</title>
    <link rel="stylesheet" href="./views/css/catatanMuridStyle.css">
</head>

<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <h2>Daily Notes</h2>
            </div>

            <div class="form-box">
                <h3 style="margin-bottom: 15px;">✍️ Write a New Note</h3>
                
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Note Title</label>
                        <input type="text" name="judul" class="input-field" placeholder="Example: Learning Simple Present Tense" required>
                    </div>

                    <div class="form-group">
                        <label>Journal Content</label>
                        <textarea name="isi" class="input-field" rows="6" placeholder="Tell what you learned today..." required></textarea>
                    </div>

                    <button type="submit" class="btn-simpan">Save Note</button>
                </form>
            </div>

            <h3 style="margin: 30px 0 15px 0;">🕒 Your Note History</h3>
            
            <div class="history-card">
                <div class="card-meta">
                    <span>📅 Nov 27, 2025</span>
                </div>
                <div class="card-title">Last Week Lesson Review</div>
                <div class="card-body">
                    Today I reviewed the material about adjectives. I learned that adjectives are usually placed before nouns.
                </div>
            </div>

        </div>

    </div>

</body>
</html>
