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
                <h2>Welcome, <?= htmlspecialchars($nama_lengkap) ?>!</h2>
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
                    <h3><?= floatval($total_poin) ?></h3>
                </div>
            </div>

            <h3 style="margin-bottom: 10px;">What Do You Want To Do?</h3>
            <div class="action-area">
                <a href="index.php?page=murid/catatanMurid&active=catatan&aktif=true" style="text-decoration:none; flex:1;">
                    <div class="btn">✏️ Write Text / Note</div>
                </a>
                <a href="index.php?page=murid/kosakataMurid&active=kosakata&aktif=true" style="text-decoration:none; flex:1;">
                    <div class="btn">📖 Add Vocabulary</div>
                </a>
            </div>

            <div class="bottom-section">

                <div class="box">
                    <h3>🎯 Active Mission</h3>
                    <?php if ($misi_aktif): ?>
                        <div class="list-item">
                            <b><?= htmlspecialchars($misi_aktif['nama_misi']) ?></b>
                            <p><?= htmlspecialchars($misi_aktif['deskripsi']) ?></p>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: <?= $progres_misi ?>%;"></div>
                            </div>
                            <small>Progres: <?= $progres_misi ?>%</small>
                            <br>
                            <a href="index.php?page=murid/misiMurid" style="font-size:12px; color:#2980b9;">View Details</a>
                        </div>
                    <?php else: ?>
                        <div class="list-item">
                            <p style="color: grey;">No active mission right now.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="box">
                    <h3>Recent Activity</h3>
                    
                    <?php if (count($recent_activities) > 0): ?>
                        <?php foreach($recent_activities as $act): ?>
                            <div class="list-item">
                                <b><?= htmlspecialchars($act['judul']) ?></b> <br>
                                <span style="color: grey;">
                                    <?= date('d M Y', strtotime($act['tanggal_catatan'])) ?> - <?= ucfirst($act['tipe']) ?>
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