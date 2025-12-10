<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Missions - School Diary</title>
    <link rel="stylesheet" href="./views/css/misiMuridStyle.css">
    
    <style>
        .mission-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            border: 1px solid #f1f2f6;
        }
        .mission-title {
            font-size: 18px;
            font-weight: bold;
            color: #2d3436;
            margin-bottom: 10px;
        }
        .mission-desc {
            color: #636e72;
            font-size: 14px;
            margin-bottom: 15px;
            line-height: 1.5;
        }
        .badge-school {
            background: #eccc68;
            color: #fff;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .progress-area {
            background: #f1f2f6;
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
        }
        .progress-info {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            color: #2d3436;
            margin-bottom: 8px;
            font-weight: 600;
        }
        .progress-bar {
            height: 10px;
            background: #dfe6e9;
            border-radius: 10px;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            background: #0984e3;
            transition: width 0.5s ease;
        }
        .btn-action {
            display: block;
            width: 100%;
            background: #0984e3;
            color: white;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            font-weight: 600;
            margin-top: 20px;
            transition: 0.2s;
        }
        .btn-action:hover {
            opacity: 0.9;
        }
    </style>
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
                            // Pastikan variabel ada isinya
                            $sisa = $misi['sisa_hari'] ?? null;
                            $deadline_text = ($sisa !== null) ? "$sisa Days Left" : "∞ No Deadline";
                            $nilai = $misi['progres_nilai'] ?? 0;
                            
                            $id_misi = $misi['id_misi'] ?? 0;
                            $link_kerjakan = "index.php?page=murid/kerjakanMisiMurid&id=" . $id_misi;
                        ?>

                        <div class="mission-card active-card">
                            <div class="card-top">
                                <span class="badge badge-school">School Mission</span>
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

                            <a href="index.php?page=murid/kerjakanMisiMurid&id=<?= $misi['id_misi'] ?>" class="btn-action">
                                <?= ($misi['persentase_saya'] >= 100) ? 'Review Mission' : 'Continue Mission' ?>
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