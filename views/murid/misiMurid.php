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
                            // Hitung sisa hari untuk display
                            $sisa = $misi['sisa_hari'] ?? null;
                            $deadline_text = ($sisa !== null) ? "$sisa Days Left" : "∞ No Deadline";
                            
                            // Tentukan Badge Kategori
                            if (isset($misi['kategori']) && $misi['kategori'] == 'global') {
                                // Style inline untuk membedakan Global (Ungu)
                                $badge_html = '<span class="badge" style="background-color: #6c5ce7; color: white;">Global Mission</span>';
                            } else {
                                // Default class badge-school
                                $badge_html = '<span class="badge badge-school">School Mission</span>';
                            }
                        ?>

                        <div class="mission-card active-card">
                            <div class="card-top">
                                <?= $badge_html ?>
                                
                                <span class="deadline" style="<?= ($sisa !== null && $sisa < 3) ? 'color: red;' : 'color: green;' ?>">
                                    <?= $deadline_text ?>
                                </span>
                            </div>

                            <div class="mission-title">
                                <?= htmlspecialchars($misi['judul'] ?? 'Misi Tanpa Judul') ?>
                            </div>
                            
                            <p class="mission-desc">
                                <?= htmlspecialchars($misi['deskripsi'] ?? 'Tidak ada deskripsi.') ?>
                            </p>

                            <div class="progress-area">
                                <div class="progress-info">
                                    <span>Your Progress</span>
                                    <span><?= $misi['persentase_saya'] ?>% Completed</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: <?= $misi['persentase_saya'] ?>%;"></div>
                                </div>
                            </div>

                            <a href="index.php?page=murid/kerjakanMisiMurid&active=misi&aktif=true&id=<?= $misi['id_misi'] ?>" class="btn-action">
                                <?= ($misi['persentase_saya'] >= 100) ? 'Review Mission' : 'Continue Mission' ?>
                            </a>
                        </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    
                    <div class="mission-card" style="text-align:center; color:grey;">
                        <h3>No Active Missions</h3>
                        <p>You have completed all missions or none are assigned yet.</p>
                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</body>
</html>