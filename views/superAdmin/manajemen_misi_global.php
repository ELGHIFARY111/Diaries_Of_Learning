<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Misi Global</title>
    <link rel="stylesheet" href="./views/css/guru.css">
</head>
<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <div class="header-text">
                    <h2>Global Vocabulary Missions</h2>
                </div>
                <a href="index.php?page=tambah_misi_global" class="btn-action btn-success">
                    + Create New Mission
                </a>
            </div>

            <div class="data-table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Mission Name</th>
                            <th>Description</th>
                            <th>Duration</th>
                            <th>Target</th>
                            <th>Status</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($daftar_misi_global)): ?>
                            <?php foreach ($daftar_misi_global as $misi): 
                                $today = date('Y-m-d');
                                
                                // Logika Status (Sama persis dengan guru)
                                if ($today < $misi['tanggal_mulai']) {
                                    $status_badge = '<span class="badge badge-warning">UPCOMING</span>';
                                } elseif ($today > $misi['tanggal_akhir']) {
                                    $status_badge = '<span class="badge" style="background:#b2bec3; color:#2d3436;">ENDED</span>';
                                } else {
                                    $status_badge = '<span class="badge badge-success">ACTIVE</span>';
                                }
                            ?>
                            <tr>
                                <td><b><?= htmlspecialchars($misi['judul']) ?></b></td>
                                <td><?= htmlspecialchars(substr($misi['deskripsi'], 0, 50)) ?>...</td>
                                <td>
                                    <small>
                                        <?= date('d M', strtotime($misi['tanggal_mulai'])) ?> - 
                                        <?= date('d M Y', strtotime($misi['tanggal_akhir'])) ?>
                                    </small>
                                </td>
                                <td style="padding: 12px; text-align: center;">
                                    <?= $misi['target_jumlah_kata'] ?? 'N/A' ?>
                                </td>
                                <td><?= $status_badge ?></td>
                                <td>
                                    <div class="aksi-group" style="display:flex; gap:5px;">
                                        
                                        <a href="index.php?page=edit_misi_global&id=<?= $misi['id_misi'] ?>" 
                                            class="btn-aksi" 
                                            style="text-decoration:none; background:#0984e3; color:white; padding:5px 10px; border-radius:4px; font-size:0.8em;">
                                            Edit
                                        </a>

                                        <a href="index.php?page=hapus_misi_global&id=<?= $misi['id_misi'] ?>" 
                                            onclick="return confirm('Yakin ingin menghapus misi ini?')" 
                                            class="btn-delete" 
                                            style="text-decoration:none; background:#d63031; color:white; padding:5px 10px; border-radius:4px; font-size:0.8em;">
                                            Del
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="text-align:center; padding:20px;">Belum ada misi global yang dibuat.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>
</html>