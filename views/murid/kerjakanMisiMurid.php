<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Mission - School Diary</title>
    <link rel="stylesheet" href="./views/css/kerjakanMisiMuridStyle.css">
</head>

<body>

    <div class="container">

        <div class="content">

            <a href="misi.php" class="btn-back">Back to Mission List</a>

            <div class="header-misi">
                <span class="badge badge-school">School Mission</span>
                <h1>Adjective Challenge</h1>
                <p class="deskripsi">
                    Instruction: Find the meaning of the 5 adjectives below, then create one simple sentence using each word.
                </p>
                
                <div class="progress-container">
                    <span>Progress: 0/5 Words Completed</span>
                    <div class="progress-track">
                        <div class="progress-fill" style="width: 0%;"></div>
                    </div>
                </div>
            </div>

            <form action="" method="POST">
                
                <div class="task-card">
                    <div class="word-target">1. Brave</div>
                    
                    <div class="input-group">
                        <label>Meaning (Indonesian):</label>
                        <input type="text" name="arti_1" class="input-field" placeholder="Example: Berani" required>
                    </div>

                    <div class="input-group">
                        <label>Example Sentence:</label>
                        <input type="text" name="kalimat_1" class="input-field" placeholder="Example: He is brave enough to speak up." required>
                    </div>
                </div>

                <div class="task-card">
                    <div class="word-target">2. Generous</div>
                    
                    <div class="input-group">
                        <label>Meaning (Indonesian):</label>
                        <input type="text" name="arti_2" class="input-field" placeholder="Enter meaning..." required>
                    </div>

                    <div class="input-group">
                        <label>Example Sentence:</label>
                        <input type="text" name="kalimat_2" class="input-field" placeholder="Create a sentence..." required>
                    </div>
                </div>

                <div class="task-card">
                    <div class="word-target">3. Honest</div>
                    
                    <div class="input-group">
                        <label>Meaning (Indonesian):</label>
                        <input type="text" name="arti_3" class="input-field" placeholder="Enter meaning..." required>
                    </div>

                    <div class="input-group">
                        <label>Example Sentence:</label>
                        <input type="text" name="kalimat_3" class="input-field" placeholder="Create a sentence..." required>
                    </div>
                </div>

                <div class="action-area">
                    <button type="submit" class="btn-submit" onclick="window.location.href='misiMurid.php'">✅ Submit Mission Answers</button>
                </div>

            </form>

        </div>

    </div>

</body>
</html>
