<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Progres Misi - <?= htmlspecialchars($misi['judul']) ?></title>
    <link rel="stylesheet" href="./views/css/guru.css">
    <style>

    </style>
</head>
<body>
    <div class="container">
        
        <?php include "./views/guru/navigasiGuru.php"; ?>

        <div class="content">
            
            <a href="index.php?page=guru/misi_kosakata" style="display:inline-block; margin-bottom:20px; text-decoration:none; color:var(--color-text-secondary);">
                &larr; Kembali ke Daftar Misi
            </a>

            <div class="mission-summary">
                <h2><?= htmlspecialchars($misi['judul']) ?></h2>
                <p><?= htmlspecialchars($misi['deskripsi']) ?></p>
                <div style="margin-top: 15px; font-size: 0.9em; opacity: 0.9;">
                    <span>📅 <?= date('d M', strtotime($misi['tanggal_mulai'])) ?> - <?= date('d M Y', strtotime($misi['tanggal_akhir'])) ?></span>
                    <span style="margin-left: 20px;">🎯 Target: <b><?= $target_misi ?> Kata</b></span>
                </div>
            </div>

            <div class="header">
                <h3>Progres Siswa</h3>
                <p>Memantau ketercapaian target hafalan siswa.</p>
            </div>

            <div class="data-table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Email</th>
                            <th>Pencapaian</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($daftar_siswa) > 0): ?>
                            <?php while ($siswa = mysqli_fetch_assoc($daftar_siswa)): 
                                
                                $target_safe = ($target_misi > 0) ? $target_misi : 1;
                                $capaian = $siswa['kata_dikuasai'];
                                
                                $persen = round(($capaian / $target_safe) * 100);
                                if ($persen > 100) $persen = 100;
                                $status_text = "In Progress";
                                $badge_class = "badge-warning";
                                
                                if ($persen >= 100) {
                                    $status_text = "Completed";
                                    $badge_class = "badge-success";
                                } elseif ($persen == 0) {
                                    $status_text = "Not Started";
                                    $badge_class = "badge-danger";
                                }
                            ?>
                            <tr>
                                <td>
                                    <b><?= htmlspecialchars($siswa['nama_lengkap']) ?></b>
                                </td>
                                <td><?= htmlspecialchars($siswa['email']) ?></td>
                                <td>
                                    <div style="display:flex; align-items:center;">
                                        <div class="progress-track">
                                            <div class="progress-fill" style="width: <?= $persen ?>%;"></div>
                                        </div>
                                        <span><?= $capaian ?> / <?= $target_misi ?> (<?= $persen ?>%)</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge <?= $badge_class ?>"><?= $status_text ?></span>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" style="text-align:center; padding:30px;">Belum ada siswa di sekolah ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>