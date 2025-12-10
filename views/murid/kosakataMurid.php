<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocabulary Bank - School Diary</title>
    <link rel="stylesheet" href="./views/css/kosakataMuridStyle.css">
</head>

<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <h2>Vocabulary Bank</h2>
            </div>

            <div class="form-box">
                <h3>Add New Word</h3>
                <form action="" method="POST" style="margin-top: 15px;">
                    
                    <div class="form-row">
                        <div class="form-group half">
                            <label>Word (English)</label>
                            <input type="text" name="kata_inggris" class="input-field" placeholder="Ex: Eager" required>
                        </div>
                        <div class="form-group half">
                            <label>Meaning (Indonesian)</label>
                            <input type="text" name="arti" class="input-field" placeholder="Ex: Bersemangat" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Example Sentence</label>
                        <input type="text" name="contoh" class="input-field" placeholder="Ex: He is eager to learn English.">
                    </div>

                    <button type="submit" class="btn-simpan">Save Word</button>
                </form>
            </div>

            <div class="list-section">
                <div class="list-header">
                    <h3>Your Collection (5 Words)</h3>
                    <input type="text" class="search-box" placeholder="Search word...">
                </div>

                <div class="vocab-grid">
                    
                    <div class="vocab-card">
                        <div class="word-en">Determined</div>
                        <div class="word-id">Bertekad / Persistent</div>
                        <div class="word-example">"She is determined to pass the exam."</div>
                    </div>

                    <div class="vocab-card">
                        <div class="word-en">Curious</div>
                        <div class="word-id">Curious</div>
                        <div class="word-example">"I am curious about the ending of the movie."</div>
                    </div>

                    <div class="vocab-card">
                        <div class="word-en">Achieve</div>
                        <div class="word-id">Achieve</div>
                        <div class="word-example">"Work hard to achieve your goals."</div>
                    </div>

                    <div class="vocab-card">
                        <div class="word-en">Improve</div>
                        <div class="word-id">Improve</div>
                        <div class="word-example">"I want to improve my speaking skills."</div>
                    </div>

                    <div class="vocab-card">
                        <div class="word-en">Library</div>
                        <div class="word-id">Library</div>
                        <div class="word-example">"We study in the library."</div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</body>
</html>
