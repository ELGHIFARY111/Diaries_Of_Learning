<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa - <?= htmlspecialchars($siswa['nama_lengkap']) ?></title>
    <link rel="stylesheet" href="./views/css/guru.css">
</head>
<body>

    <div class="container">
        <div class="content"> <div style="margin-bottom: 20px;">
                <a href="index.php?page=guru/monitoring&active=siswa" class="btn-action" style="background: #eee; color: #333; text-decoration:none;">
                    ← Kembali ke Daftar Siswa
                </a>
            </div>

            <div class="profile-header">
                <div class="avatar-large">
                    <?= strtoupper(substr($siswa['nama_lengkap'], 0, 1)) ?>
                </div>
                <div>
                    <h2 style="margin: 0; color: #2d3436;"><?= htmlspecialchars($siswa['nama_lengkap']) ?></h2>
                    <p style="margin: 5px 0; color: #636e72;">
                        <?= htmlspecialchars($siswa['email']) ?> | 
                        Bergabung: <?= date('d M Y', strtotime($siswa['created_at'] ?? 'now')) ?>
                    </p>
                    <span style="background: #dfe6e9; padding: 2px 8px; border-radius: 4px; font-size: 12px;">Siswa Aktif</span>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <p>Total Jurnal</p>
                    <h3><?= $total_catatan ?></h3>
                </div>
                <div class="stat-card">
                    <p>Koleksi Kosakata</p>
                    <h3><?= $total_kosakata ?></h3>
                </div>
                <div class="stat-card">
                    <p>Skor Menulis (Rata-rata)</p>
                    <h3><?= number_format($nilai_menulis, 1) ?></h3>
                </div>
            </div>

            <div class="card">
                <div class="header" style="margin-bottom: 15px;">
                    <h3>Riwayat Jurnal Pembelajaran</h3>
                    <p>10 entri jurnal terakhir yang dibuat siswa.</p>
                </div>
                
                <div class="data-table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Judul Jurnal</th>
                                <th>Tipe</th>
                                <th>Isi / Konten</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($riwayat_catatan) > 0): ?>
                                <?php while ($row = mysqli_fetch_assoc($riwayat_catatan)): ?>
                                    <tr>
                                        <td><?= date('d M Y', strtotime($row['tanggal_catatan'])) ?></td>
                                        <td>
                                            <strong><?= htmlspecialchars($row['judul']) ?></strong>
                                        </td>
                                        <td>
                                            <span class="badge badge-<?= $row['tipe'] ?>">
                                                <?= ucfirst($row['tipe']) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if ($row['tipe'] == 'teks'): ?>
                                                <span style="color: #555;">
                                                    <?= substr(htmlspecialchars($row['konten_path']), 0, 50) ?>...
                                                </span>
                                            <?php elseif ($row['tipe'] == 'audio'): ?>
                                                🔊 Audio File
                                            <?php else: ?>
                                                🖼️ Gambar
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" style="text-align:center; padding: 20px;">
                                        Siswa ini belum membuat jurnal apapun.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>
</html>