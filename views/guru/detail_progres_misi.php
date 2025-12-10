<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Progres Misi - <?= htmlspecialchars($misi['judul']) ?></title>
    <link rel="stylesheet" href="./views/css/guru.css">
    <style>
        /* CSS Tambahan untuk Daftar Kata */
        .kata-container {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px dashed #ccc;
        }
        .kata-badge {
            display: inline-block;
            background-color: #e3f2fd;
            color: #1565c0;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.9em;
            margin-right: 8px;
            margin-bottom: 8px;
            border: 1px solid #90caf9;
            font-weight: bold;
        }
        .kata-title {
            font-size: 14px; 
            font-weight: bold; 
            color: #ffffffff; 
            margin-bottom: 10px; 
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            
            <a href="index.php?page=guru/misi_kosakata" style="display:inline-block; margin-bottom:20px; text-decoration:none; color:#555;">
                &larr; Kembali ke Daftar Misi
            </a>

            <div class="mission-summary">
                <h2><?= htmlspecialchars($misi['judul']) ?></h2>
                <p><?= htmlspecialchars($misi['deskripsi']) ?></p>
                
                <div style="margin-top: 15px; font-size: 0.9em; opacity: 0.9;">
                    <span>📅 <?= date('d M', strtotime($misi['tanggal_mulai'])) ?> - <?= date('d M Y', strtotime($misi['tanggal_akhir'])) ?></span>
                    <span style="margin-left: 20px;">🎯 Target: <b><?= count($list_kata_target) ?> Kata</b></span>
                </div>

                <div class="kata-container">
                    <span class="kata-title">📝 Daftar Kata yang Harus Dicari:</span>
                    
                    <?php if (!empty($list_kata_target)): ?>
                        <?php foreach($list_kata_target as $kata): ?>
                            <span class="kata-badge"><?= htmlspecialchars($kata) ?></span>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <span style="color: grey; font-style: italic;">Tidak ada kata spesifik.</span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="header" style="margin-top: 30px;">
                <h3>Progres Siswa</h3>
                <p>Memantau ketercapaian target hafalan siswa.</p>
            </div>

            <div class="data-table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Email</th>
                            <th>Progres</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($daftar_siswa) > 0): ?>
                            <?php while ($siswa = mysqli_fetch_assoc($daftar_siswa)): 
                                $persen = $siswa['progres_nilai'] ?? $siswa['nilai'] ?? 0;
                                $jumlah_target = count($list_kata_target);
                                $jumlah_didapat = ($jumlah_target > 0) ? round(($persen / 100) * $jumlah_target) : 0;
                                
                                $status_text = ($persen >= 100) ? 'Selesai' : 'Proses';
                                $badge_class = ($persen >= 100) ? 'badge-success' : 'badge-warning';
                            ?>
                            <tr>
                                <td>
                                    <b><?= htmlspecialchars($siswa['nama_lengkap']) ?></b>
                                </td>
                                <td><?= htmlspecialchars($siswa['email']) ?></td>
                                <td>
                                    <div style="display:flex; align-items:center;">
                                        <div class="progress-track" style="flex:1; margin-right:10px;">
                                            <div class="progress-fill" style="width: <?= $persen ?>%;"></div>
                                        </div>
                                        <span style="font-size:0.9em; white-space:nowrap;">
                                            <?= $jumlah_didapat ?> / <?= $jumlah_target ?> Kata (<?= $persen ?>%)
                                        </span>
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