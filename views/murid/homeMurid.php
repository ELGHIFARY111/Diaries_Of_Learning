<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Diary of Learning</title>
    <link rel="stylesheet" href="./views/css/homeMuridStyle.css">
</head>

<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <h2>Welcome, <?= htmlspecialchars($nama_lengkap ?? 'Murid') ?>!</h2>
            </div>

            <div class="stats-box">
                <div class="card">
                    <p>Total Notes</p>
                    <h3><?= $total_catatan ?></h3>
                </div>
                <div class="card">
                    <p>New Vocabulary</p>
                    <h3><?= $total_kosakata ?></h3>
                </div>
                <div class="card">
                    <p>Total Points</p>
                    <h3><?= number_format($total_poin) ?></h3>
                </div>
            </div>

            <h3 style="margin-bottom: 10px;">What Do You Want To Do?</h3>
            <div class="action-area">
                <a href="index.php?page=murid/catatanMurid&active=catatan&aktif=true" style="text-decoration:none; flex:1;">
                    <div class="btn">Write Text / Note</div>
                </a>
                <a href="index.php?page=murid/kosakataMurid&active=kosakata" style="text-decoration:none; flex:1;">
                    <div class="btn">Add Vocabulary</div>
                </a>
            </div>

            <div class="dashboard-grid">
                
                <div class="box">
                    <h3>Active Mission</h3>
                    <?php if ($misi_aktif): ?>
                        <div class="mission-card">
                            <h4><?= htmlspecialchars($misi_aktif['judul'] ?? 'Misi Tanpa Judul') ?></h4>
                            
                            <p style="font-size: 13px; color: #636e72; margin-bottom: 10px;">
                                <?= htmlspecialchars($misi_aktif['deskripsi'] ?? '-') ?>
                            </p>
                            
                            <div class="progress-bar-container">
                                <div class="progress-bar" style="width: <?= $progres_misi ?>%;"></div>
                            </div>

                            <div style="display: flex; justify-content: space-between; font-size: 12px; color: #7f8c8d; margin-top: 5px;">
                                <span>Progress</span>
                                <span><?= $progres_misi ?>% Completed</span>
                            </div>
                            
                            <br>
                            <a href="index.php?page=murid/misiMurid" style="font-size:12px; color:#2980b9; text-decoration: none; font-weight: bold;">
                                View Details &rarr;
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="list-item">
                            <p style="color: grey;">No active mission right now.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="box">
                    <h3>Recent Activity</h3>
                    
                    <?php if (isset($recent_activities) && mysqli_num_rows($recent_activities) > 0): ?>
                        <?php foreach($recent_activities as $act): ?>
                            <div class="list-item">
                                <b><?= htmlspecialchars($act['judul'] ?? 'Aktivitas Baru') ?></b> <br>
                                <span style="color: grey;">
                                    <?= date('d M Y', strtotime($act['tanggal_catatan'] ?? 'now')) ?> 
                                    - 
                                    <?= ucfirst($act['tipe'] ?? 'General') ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="list-item">
                            <span style="color: grey;">No activities yet. Start writing!</span>
                        </div>
                    <?php endif; ?>
                    
                </div>

            </div>

        </div>

    </div>

</body>
</html>