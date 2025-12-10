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

            <h3 class="section-title">Ongoing Missions</h3>
            
            <div class="mission-list">
                
                <?php if (!empty($daftar_misi)): ?>
                    <?php foreach ($daftar_misi as $misi): ?>
                        <?php 
                            $sisa = $misi['sisa_hari'];
                            $deadline_text = ($sisa !== null) ? "$sisa Days Left" : "∞ No Deadline";
                            $nilai = $misi['progres_nilai'];
                            
                            $link_kerjakan = "index.php?page=murid/kerjakanMisiMurid&id=" . $misi['id_misi'];
                        ?>

                        <div class="mission-card active-card">
                            <div class="card-top">
                                <span class="badge badge-school">School Mission</span>
                                <span class="deadline" style="<?= ($sisa < 3) ? 'color:red;' : '' ?>">
                                    <?= $deadline_text ?>
                                </span>
                            </div>
                            
                            <div class="mission-title"><?= htmlspecialchars($misi['nama_misi']) ?></div>
                            <p class="mission-desc">
                                <?= htmlspecialchars($misi['deskripsi']) ?>
                            </p>

                            <div class="progress-area">
                                <div class="progress-info">
                                    <span>Your Progress</span>
                                    <span><?= $nilai ?>% Completed</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: <?= $nilai ?>%;"></div>
                                </div>
                            </div>

                            <a href="<?= $link_kerjakan ?>" class="btn-action" style="text-decoration:none; display:inline-block; text-align:center;">
                                <?= ($nilai >= 100) ? 'Review Mission' : 'Continue Mission' ?>
                            </a>
                        </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    
                    <div class="mission-card" style="text-align:center; color:grey;">
                        <h3>🎉 No Active Missions</h3>
                        <p>You have completed all missions or none are assigned yet.</p>
                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</body>
</html>