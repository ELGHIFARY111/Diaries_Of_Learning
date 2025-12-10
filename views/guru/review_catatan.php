<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Note Review</title>
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
                    <h2>Student Daily Journal Review</h2>
                    <p>Review and provide feedback on students' English learning activities.</p>
                </div>
            </div>
            
            <div class="filter-area" style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                <form method="GET" action="index.php" class="filter-form">
                    <input type="hidden" name="page" value="guru/review_catatan">
                    <input type="hidden" name="active" value="review">
                    <input type="hidden" name="aktif" value="true">
                    
                    <div style="display: flex; flex-direction: column; gap: 5px;">
                        <label for="filterStatus" style="font-size: 12px; font-weight: bold; color: #666;">Review Status:</label>
                        <select id="filterStatus" name="status" style="padding: 8px; border-radius: 5px; border: 1px solid #ddd;">
                            <option value="all" <?= $filter_status == 'all' ? 'selected' : '' ?>>All Statuses</option>
                            <option value="pending" <?= $filter_status == 'pending' ? 'selected' : '' ?>>Pending (Unchecked)</option>
                            <option value="reviewed" <?= $filter_status == 'reviewed' ? 'selected' : '' ?>>Completed (Checked)</option>
                        </select>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 5px;">
                        <label for="filterTipe" style="font-size: 12px; font-weight: bold; color: #666;">Note Type:</label>
                        <select id="filterTipe" name="tipe" style="padding: 8px; border-radius: 5px; border: 1px solid #ddd;">
                            <option value="all" <?= $filter_tipe == 'all' ? 'selected' : '' ?>>All Types</option>
                            <option value="teks" <?= $filter_tipe == 'teks' ? 'selected' : '' ?>>Text</option>
                            <option value="audio" <?= $filter_tipe == 'audio' ? 'selected' : '' ?>>Audio</option>
                            <option value="gambar" <?= $filter_tipe == 'gambar' ? 'selected' : '' ?>>Image</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-action btn-primary" style="height: 38px;">Apply Filter</button>
                </form>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Student Name</th>
                            <th>Journal Content</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($daftar_catatan) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($daftar_catatan)): ?>
                                <tr>
                                    <td><?= date('d M Y', strtotime($row['tanggal_catatan'])) ?></td>
                                    <td>
                                        <strong><?= htmlspecialchars($row['nama_lengkap']) ?></strong>
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
                                                Browser does not support audio.
                                            </audio>
                                        <?php elseif ($row['tipe'] == 'gambar'): ?>
                                            <a href="<?= $row['konten_path'] ?>" target="_blank" style="color: #0984e3; font-size: 12px;">
                                                View Image
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
                                        <a href="index.php?page=guru/baca_catatan&active=review&aktif=true&id=<?= $row['id_catatan'] ?>" class="btn-read">
                                            Read
                                        </a>
                                        <div class="aksi-group">
                                            <?php if ($row['status_review'] == 'pending'): ?>
                                                <a href="index.php?page=guru/proses_review&active=review&aktif=true&id=<?= $row['id_catatan'] ?>" 
                                                    class="btn-check" 
                                                    onclick="return confirm('Mark this note as reviewed?')">
                                                    Checked
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
                                    No notes found with this filter.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <p style="text-align: center; margin-top: 25px; font-size: 0.9em; color: #7f8c8d;">
                Displaying <?= $total_data ?> student notes.
            </p>

        </div>
    </div>

</body>
</html>