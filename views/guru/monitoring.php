<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary of Learning</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/guru.css">
    
</head>

<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <h2>Student List of Bintang Timur High School</h2>
                <p>A summary of the progress and account details of the students you supervise.</p>
            </div>
            
            <div class="search-area">
                <input type="text" placeholder="Search Student Name or ID..." id="searchSiswa">
                <button onclick="alert('Simulation of search function...')">Search</button>
            </div>

            <div class="data-table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Full Name</th>
                            <th>Writing Progress (%)</th>
                            <th>Vocabulary Mastered</th>
                            <th>School Mission Status</th>
                            <th style="width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1005</td>
                            <td>Dian Anggraini</td>
                            <td>
                                <div class="progress-bar-container">
                                    <div class="progress-fill" style="width: 80.5%;"></div>
                                </div>
                                <div class="progress-text">80.5%</div>
                            </td>
                            <td>
                                <div class="progress-text">124 Words</div>
                            </td>
                            <td><span class="badge badge-warning">In Progress</span></td>
                            <td><button class="btn-detail">Profile</button></td>
                        </tr>

                        <tr>
                            <td>1006</td>
                            <td>Edo Firmansyah</td>
                            <td>
                                <div class="progress-bar-container">
                                    <div class="progress-fill progress-fill-success" style="width: 95%;"></div>
                                </div>
                                <div class="progress-text">95.0%</div>
                            </td>
                            <td>
                                <div class="progress-text">90 Words</div>
                            </td>
                            <td><span class="badge badge-danger">Not Started</span></td>
                            <td><button class="btn-detail">Profile</button></td>
                        </tr>

                        <tr>
                            <td>1007</td>
                            <td>Fiona Cahyadi</td>
                            <td>
                                <div class="progress-bar-container">
                                    <div class="progress-fill" style="width: 45%;"></div>
                                </div>
                                <div class="progress-text">45.0%</div>
                            </td>
                            <td>
                                <div class="progress-text">201 Words</div>
                            </td>
                            <td><span class="badge badge-success">Passed</span></td>
                            <td><button class="btn-detail">Profile</button></td>
                        </tr>
                        
                        <tr>
                            <td>1008</td>
                            <td>Gilang Pratama</td>
                            <td>
                                <div class="progress-bar-container">
                                    <div class="progress-fill" style="width: 62%;"></div>
                                </div>
                                <div class="progress-text">62.0%</div>
                            </td>
                            <td>
                                <div class="progress-text">155 Words</div>
                            </td>
                            <td><span class="badge badge-warning">In Progress</span></td>
                            <td><button class="btn-detail">Profile</button></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            
            <p class="table-footer-info">Showing 4 out of 50 total students.</p>

        </div>

    </div>

</body>

</html>