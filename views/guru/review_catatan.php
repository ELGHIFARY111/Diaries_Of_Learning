<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Catatan Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/guru.css">
    <style>
        .badge-review-pending { background: #fff3cd; color: #856404; border: 1px solid #ffeeba; }
        .badge-review-reviewed { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        
        .btn-check {
            background: #27ae60; color: white; border: none; padding: 6px 12px;
            border-radius: 6px; cursor: pointer; text-decoration: none; font-size: 12px;
            display: inline-flex; align-items: center; gap: 5px;
        }
        .btn-check:hover { background: #2ecc71; }
        
        .btn-disabled {
            background: #dfe6e9; color: #b2bec3; cursor: not-allowed; pointer-events: none;
        }

        .filter-form { display: flex; gap: 15px; align-items: flex-end; }
    </style>
</head>

<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <div class="header-text">
                    <h2>Review Jurnal Harian Siswa</h2>
                    <p>Periksa dan beri umpan balik pada aktivitas belajar bahasa Inggris siswa.</p>
                </div>
            </div>
            
            <div class="filter-area" style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                <form method="GET" action="index.php" class="filter-form">
                    <input type="hidden" name="page" value="guru/review_catatan">
                    
                    <div style="display: flex; flex-direction: column; gap: 5px;">
                        <label for="filterStatus" style="font-size: 12px; font-weight: bold; color: #666;">Status Review:</label>
                        <select id="filterStatus" name="status" style="padding: 8px; border-radius: 5px; border: 1px solid #ddd;">
                            <option value="all" <?= $filter_status == 'all' ? 'selected' : '' ?>>Semua Status</option>
                            <option value="pending" <?= $filter_status == 'pending' ? 'selected' : '' ?>>Pending (Belum Dicek)</option>
                            <option value="reviewed" <?= $filter_status == 'reviewed' ? 'selected' : '' ?>>Selesai (Sudah Dicek)</option>
                        </select>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 5px;">
                        <label for="filterTipe" style="font-size: 12px; font-weight: bold; color: #666;">Tipe Catatan:</label>
                        <select id="filterTipe" name="tipe" style="padding: 8px; border-radius: 5px; border: 1px solid #ddd;">
                            <option value="all" <?= $filter_tipe == 'all' ? 'selected' : '' ?>>Semua Tipe</option>
                            <option value="teks" <?= $filter_tipe == 'teks' ? 'selected' : '' ?>>Teks</option>
                            <option value="audio" <?= $filter_tipe == 'audio' ? 'selected' : '' ?>>Audio</option>
                            <option value="gambar" <?= $filter_tipe == 'gambar' ? 'selected' : '' ?>>Gambar</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-action btn-primary" style="height: 38px;">Terapkan Filter</button>
                </form>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Siswa</th>
                            <th>Konten Jurnal</th>
                            <th>Tipe</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($daftar_catatan) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($daftar_catatan)): ?>
                                <tr>
                                    <td><?= date('d M Y', strtotime($row['tanggal_catatan'])) ?></td>
                                    <td>
                                        <strong><?= htmlspecialchars($row['nama_lengkap']) ?></strong><br>
                                        <small style="color: #888;">NIS: <?= $row['nis'] ?></small>
                                    </td>
                                    <td style="max-width: 300px;">
                                        <strong><?= htmlspecialchars($row['judul']) ?></strong><br>
                                        
                                        <?php if ($row['tipe'] == 'teks'): ?>
                                            <span style="color: #555; font-size: 13px;">
                                                <?= substr(strip_tags($row['konten_path']), 0, 80) ?>...
                                            </span>
                                        <?php elseif ($row['tipe'] == 'audio'): ?>
                                            <audio controls style="height: 30px; width: 200px; margin-top:5px;">
                                                <source src="<?= $row['konten_path'] ?>" type="audio/mpeg">
                                                Browser tidak support audio.
                                            </audio>
                                        <?php elseif ($row['tipe'] == 'gambar'): ?>
                                            <a href="<?= $row['konten_path'] ?>" target="_blank" style="color: #0984e3; font-size: 12px;">
                                                📷 Lihat Gambar
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge badge-<?= $row['tipe'] ?>">
                                            <?= ucfirst($row['tipe']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ($row['status_review'] == 'pending'): ?>
                                            <span class="badge badge-review-pending">PENDING</span>
                                        <?php else: ?>
                                            <span class="badge badge-review-reviewed">COMPLETED</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="aksi-group">
                                            <?php if ($row['status_review'] == 'pending'): ?>
                                                <a href="index.php?page=guru/proses_review&id=<?= $row['id_catatan'] ?>" 
                                                    class="btn-check" 
                                                    onclick="return confirm('Tandai catatan ini sudah direview?')">
                                                    ✅ Mark as Checked
                                                </a>
                                            <?php else: ?>
                                                <button class="btn-check btn-disabled">
                                                    ✔ Done
                                                </button>
                                            <?php endif; ?>
                                            
                                            </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 40px; color: #999;">
                                    Tidak ada catatan ditemukan dengan filter ini.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <p style="text-align: center; margin-top: 25px; font-size: 0.9em; color: #7f8c8d;">
                Menampilkan <?= $total_data ?> catatan siswa.
            </p>

        </div>
    </div>

</body>
</html>