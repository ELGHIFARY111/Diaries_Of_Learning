<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="./views/css/guru.css">
</head>

<body>

    <div class="container">
                <div class="content">

            <div class="header">
                <h2>Welcome, Mr. Arik! </h2>
                <p>Institution Supervision Dashboard: Bintang Timur High School. Monitor your students' learning activities.</p>
            </div>

            <div class="stats-box">
                <div class="card">
                    <p>Total Students Supervised</p>
                    <h3>50</h3>
                </div>
                <div class="card">
                    <p>Notes Awaiting Review</p>
                    <h3>12</h3>
                </div>
                <div class="card">
                    <p>Active School Missions</p>
                    <h3>1</h3>
                </div>
            </div>

            <h3 style="margin-bottom: 15px; font-size: 1.5em; color: #2c3e50;">Supervisor Quick Actions</h3>
            <div class="action-area">
                <a href="#" class="btn-action btn-success"> Create New Institution Mission</a>
                <a href="#" class="btn-action btn-primary"> Review Incoming Notes (12)</a>
            </div>

            <div class="bottom-section">

                <div class="box">
                    <h3>Latest Student Progress</h3>
                    <div class="list-item">
                        <b>Dian Anggraini</b>
                        <p>Activity: Writing Reflection | Score: 80.50%</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 80.5%;"></div>
                        </div>
                    </div>
                    <div class="list-item">
                        <b>Edo Firmansyah</b>
                        <p>Activity: Writing Reflection | Score: 95.00%</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 95%;"></div>
                        </div>
                    </div>
                    <div class="list-item">
                        <b>Fiona Cahyadi</b>
                        <p>Activity: Vocabulary Mission | Progress: 5/10 Units</p>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 50%;"></div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <h3> Latest Daily Notes</h3>
                    <div class="list-item">
                        <b>Edo Firmansyah</b>
                        <span style="color: #27ae60;">'History Lesson Reflection'</span>
                        <p style="margin-top: 5px; color: #aaa;">2025-10-01 (Awaiting Review)</p>
                    </div>
                    <div class="list-item">
                        <b>Dian Anggraini</b>
                        <span style="color: #2980b9;">'Vocabulary: Ambiguous'</span>
                        <p style="margin-top: 5px; color: #aaa;">2025-10-05 (Review Complete)</p>
                    </div>
                    <div class="list-item">
                        <b>Fiona Cahyadi</b>
                        <span style="color: #27ae60;">'Group Assignment Report'</span>
                        <p style="margin-top: 5px; color: #aaa;">2025-10-07 (Awaiting Review)</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>