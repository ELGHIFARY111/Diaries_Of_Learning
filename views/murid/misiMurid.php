<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Missions - School Diary</title>
    <link rel="stylesheet" href="./views/css/misiMuridStyle.css">
</head>

<body>

    <div class="container">

        <div class="content">

            <div class="header">
                <h2>Missions</h2>
            </div>

            <h3 class="section-title">🔥 Ongoing Missions</h3>
            
            <div class="mission-list">
                
                <div class="mission-card active-card">
                    <div class="card-top">
                        <span class="badge badge-school">🏫 School Mission</span>
                        <span class="deadline">⏳ 2 Days Left</span>
                    </div>
                    
                    <div class="mission-title">Adjective Challenge</div>
                    <p class="mission-desc">
                        Find 5 unique adjectives to describe your classmates.
                    </p>

                    <div class="progress-area">
                        <div class="progress-info">
                            <span>Your Progress</span>
                            <span>3/5 Words</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 60%;"></div>
                        </div>
                    </div>

                    <button class="btn-action" onclick="window.location.href='views/murid/kerjakanMisiMurid.php'">Continue Mission</button>
                </div>

                <div class="mission-card active-card">
                    <div class="card-top">
                        <span class="badge badge-global">🌍 Global Mission</span>
                        <span class="deadline">⏳ 5 Days Left</span>
                    </div>
                    
                    <div class="mission-title">Daily Verbs Mastery</div>
                    <p class="mission-desc">
                        Learn and use 10 daily verbs in sentences (Eat, Drink, Sleep, etc).
                    </p>

                    <div class="progress-area">
                        <div class="progress-info">
                            <span>Your Progress</span>
                            <span>1/10 Words</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 10%;"></div>
                        </div>
                    </div>

                    <button class="btn-action" onclick="window.location.href='index.php?page=murid/kerjakanMisiMurid'">Continue Mission</button>
                </div>

            </div>

        </div>

    </div>

</body>
</html>
