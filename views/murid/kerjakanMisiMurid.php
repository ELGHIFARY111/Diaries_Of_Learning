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

            <a href="index.php?page=murid/misiMurid&active=misi&aktif=true" class="btn-back" style="text-decoration:none; color:#666;">&larr; Back to Mission List</a>

            <div class="header-misi" style="margin-top: 20px;">
                <span class="badge badge-school" style="background:#e3f2fd; color:#0984e3; padding:5px 10px; border-radius:5px;">School Mission</span>
                <h1 style="margin: 10px 0;"><?= htmlspecialchars($info_misi['judul']) ?></h1>
                <p class="deskripsi" style="color:#666;">
                    <?= htmlspecialchars($info_misi['deskripsi']) ?>
                </p>
                
                <div class="progress-container" style="margin-top: 20px;">
                    <span>Progress: <b><?= $sudah ?>/<?= $total ?></b> Words Collected</span>
                    <div class="progress-track" style="height:10px; background:#eee; border-radius:5px; margin-top:5px;">
                        <div class="progress-fill" style="width: <?= $persen ?>%; height:100%; background:#00b894; border-radius:5px; transition: 0.3s;"></div>
                    </div>
                </div>
            </div>

            <h3 style="margin: 30px 0 15px 0;">📋 Vocabulary Checklist</h3>

            <div class="checklist-box">
                <?php if (empty($checklist)): ?>
                    <p style="text-align:center; color:grey;">No specific words required. Just keep learning!</p>
                <?php else: ?>
                    <?php foreach($checklist as $item): ?>
                        <div class="check-item">
                            <div class="word-text"><?= htmlspecialchars($item['kata']) ?></div>
                            
                            <?php if($item['status']): ?>
                                <span class="status-badge status-done">✅ Collected</span>
                            <?php else: ?>
                                <span class="status-badge status-pending">❌ Missing</span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <?php if($persen < 100): ?>
                <div style="margin-top: 20px;">
                    <p style="text-align: center; color: #666; font-size: 14px; margin-bottom: 10px;">
                        To complete this mission, create a <b>Diary Note</b> containing the missing words above.
                        <br>
                        (The words can be in the Title or the Content of your note)
                    </p>
                    <a href="index.php?page=murid/catatanMurid&active=catatan&aktif=true" class="btn-add-vocab">
                        Write a Note Now
                    </a>
                </div>
            <?php else: ?>
                <div style="margin-top: 30px; text-align: center; background: #d4edda; padding: 20px; border-radius: 10px; color: #155724;">
                    <h2>🎉 Mission Completed!</h2>
                    <p>Great job! You have used all the target words in your notes.</p>
                </div>
            <?php endif; ?>

        </div>
    </div>

</body>
</html>