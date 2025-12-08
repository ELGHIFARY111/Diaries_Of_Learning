<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Leaderboard</title>
    <link rel="stylesheet" href="./views/css/guru.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    
    <div class="content">
        <div class="header">
            <div class="header-text">
                <h2>Good Morning, Mr. Arik</h2>
            </div>
            <div class="header-actions">
                </div>
        </div>
        
        <div class="leaderboard-section">
            <h3>Student Leaderboard</h3>
            
            <div class="leaderboard-controls">
                
                <div class="leaderboard-type-filters">
                    <a href="#" class="filter-link active" id="filter-global">Global</a>
                    <a href="#" class="filter-link" id="filter-school">School</a>
                </div>
                
                <div class="time-filters">
                    <a href="#" class="filter-link">All time</a>
                    <a href="#" class="filter-link active">This month</a>
                    <a href="#" class="filter-link">This week</a>
                </div>

                <div class="search-area">
                    <input type="text" placeholder="Search Student..." class="leaderboard-search-input">
                </div>
            </div>
            
            <div class="data-table-wrapper">
                <table class="data-table leaderboard-table">
                    <thead>
                        <tr>
                            <th class="col-rank">#</th>
                            <th class="col-name">Student Name</th>
                            <th class="col-school">School Name</th>
                            <th class="col-point">Total Points</th>
                            <th class="col-action"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="rank-one">
                            <td><span class="rank-badge gold">1</span></td>
                            <td>
                                <div class="user-cell">
                                    El debugging
                                </div>
                            </td>
                            <td>SMA Negeri 1 Jakarta</td>
                            <td class="point-cell stat-cell"><i class="fas fa-medal"></i> 1215</td>
                        </tr>
                        
                        <tr class="rank-two">
                            <td><span class="rank-badge silver">2</span></td>
                            <td>
                                <div class="user-cell">
                                    Ravi neko
                                </div>
                            </td>
                            <td>SMP Cahaya Asia</td>
                            <td class="point-cell stat-cell"><i class="fas fa-medal"></i> 1190</td>
                            
                        </tr>
                        
                        <tr class="rank-three">
                            <td><span class="rank-badge bronze">3</span></td>
                            <td>
                                <div class="user-cell">
                                    Arik setiawan
                                </div>
                            </td>
                            <td>SMA Negeri 1 Jakarta</td>
                            <td class="point-cell stat-cell"><i class="fas fa-medal"></i> 1080</td>
                        </tr>
                        
                        <tr>
                            <td>4</td>
                            <td>
                                <div class="user-cell">
                                    Omen
                                </div>
                            </td>
                            <td>SMK Harapan Bangsa</td>
                            <td class="point-cell stat-cell"><i class="fas fa-medal"></i> 980</td>
                        </tr>

                        </tbody>
                </table>
            </div>
        </div>
    </div>
    
    </body>
</html>