<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary of Learning</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/guru.css">

    </style>
</head>

<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <div class="header-text">
                    <h2>School Vocabulary Missions</h2>
                    <p>Manage and monitor the vocabulary missions you create specifically for students in this institution.</p>
                </div>
                <a href="#" class="btn-success">Create New Mission</a>
            </div>
            

            <div class="data-table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Mission Name</th>
                            <th>Short Description</th>
                            <th>Duration</th>
                            <th>Vocabulary Target</th>
                            <th style="min-width: 150px;">Student Progress</th>
                            <th>Status</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10 Adjectives Challenge (B1)</td>
                            <td>Find 10 unique adjectives from a news article.</td>
                            <td>Oct 12 - Oct 25, 2025</td>
                            <td>10 Words</td>
                            <td class="progress-indicator">
                                <div class="progress-percentage">85% Complete</div>
                                <div class="progress-bar-container">
                                    <div class="progress-bar" style="width: 85%;"></div>
                                </div>
                                <div class="progress-text">42 out of 50 Students Passed</div>
                            </td>
                            <td><span class="badge badge-active">ACTIVE</span></td>
                            <td>
                                <div class="aksi-group">
                                    <button class="btn-aksi">Detail</button>
                                    <button class="btn-aksi">Edit</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>5 Food Idioms</td>
                            <td>Learn 5 common idioms related to food.</td>
                            <td>Sep 1 - Sep 30, 2025</td>
                            <td>5 Idioms</td>
                            <td class="progress-indicator">
                                <div class="progress-percentage">98% Complete</div>
                                <div class="progress-bar-container">
                                    <div class="progress-bar progress-bar-complete" style="width: 98%;"></div>
                                </div>
                                <div class="progress-text">49 out of 50 Students Passed</div>
                            </td>
                            <td><span class="badge badge-expired">COMPLETED</span></td>
                            <td>
                                <div class="aksi-group">
                                    <button class="btn-aksi" style="background-color: var(--color-secondary);">Report</button>
                                    <button class="btn-delete">Delete</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>November Mission: Transitive Verbs</td>
                            <td>A preparation mission that will start next month.</td>
                            <td>Nov 1 - Nov 30, 2025</td>
                            <td>15 Words</td>
                            <td class="progress-indicator">
                                <div class="progress-percentage">0% Complete</div>
                                <div class="progress-bar-container">
                                    <div class="progress-bar" style="width: 0%; background-color: #adb5bd;"></div>
                                </div>
                                <div class="progress-text">0 out of 50 Students Passed</div>
                            </td>
                            <td><span class="badge badge-upcoming">UPCOMING</span></td>
                            <td>
                                <div class="aksi-group">
                                    <button class="btn-aksi">Edit</button>
                                    <button class="btn-delete">Cancel</button>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            
            <div class="footer-link">
                <a href="#">View Global Missions</a>
            </div>

        </div>

    </div>

</body>

</html>