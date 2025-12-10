<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Notes - School Diary</title>
    <link rel="stylesheet" href="views/css/catatanMuridStyle.css">
</head>

<body>

    <div class="container">

        <div class="content">

            <div class="header">
                <h2>Daily Notes</h2>
                <p>Record your learning journey today.</p>
            </div>

            <form action="" method="POST" class="note-form">
                
                <div class="word-sheet">
                    
                    <input type="text" name="judul" class="input-title" placeholder="Title: Learning Simple Present Tense..." required autocomplete="off">
                    
                    <hr class="separator">

                    <textarea name="isi" class="input-body" placeholder="Start writing your story here..." required></textarea>

                </div>

                <div class="action-bar">
                    <button type="submit" class="btn-simpan">Save Note</button>
                </div>

            </form>

            <h3 style="margin: 40px 0 15px 0; color: #555;">Your Note History</h3>
            
            <div class="history-list">
                
                <div class="history-card">
                    <div class="card-meta">
                        <span>Nov 27, 2025</span>
                    </div>
                    <div class="card-title">Last Week Lesson Review</div>
                    <div class="card-body">
                        Today I reviewed the material about adjectives. I learned that adjectives are usually placed before nouns.
                    </div>
                </div>

                 <div class="history-card">
                    <div class="card-meta">
                        <span>Nov 26, 2025</span>
                    </div>
                    <div class="card-title">Speaking Practice</div>
                    <div class="card-body">
                        I tried to speak with my friend using full English sentences today. It was hard but fun.
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>
</html>