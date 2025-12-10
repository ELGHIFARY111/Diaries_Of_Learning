<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary of Learning</title>
    <link rel="stylesheet" href="./views/css/guru.css">

    </style>
</head>

<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <div class="header-text">
                    <h2>School Vocabulary Missions</h2>
                </div>
                <a href="index.php?page=guru/tambah_misi&active=misi&aktif=true" class="btn-action btn-success">
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
                        <?php if (mysqli_num_rows($daftar_misi) > 0): ?>
                            <?php while ($misi = mysqli_fetch_assoc($daftar_misi)):
                                $today = date('Y-m-d');
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
                                <td><?= $misi['target_jumlah_kata'] ?> Words</td>
                                <td><?= $status_badge ?></td>
                                <td>
                                    <div class="aksi-group" style="display:flex; gap:5px;">
                                        
                                        <a href="index.php?page=guru/detail_progres_misi&active=misi&aktif=true&id=<?= $misi['id_misi'] ?>" 
                                            class="btn-aksi" 
                                            style="text-decoration:none; background:#6c5ce7; color:white; padding:5px 10px; border-radius:4px; font-size:0.8em;" 
                                            title="Lihat Siswa">
                                            Detail
                                        </a>

                                        <a href="index.php?page=guru/edit_misi&active=misi&aktif=true&id=<?= $misi['id_misi'] ?>" 
                                            class="btn-aksi" 
                                            style="text-decoration:none; background:#0984e3; color:white; padding:5px 10px; border-radius:4px; font-size:0.8em;">
                                            Edit
                                        </a>

                                        <a href="index.php?page=guru/hapus_misi&active=misi&aktif=true&id=<?= $misi['id_misi'] ?>" 
                                            onclick="return confirm('Yakin ingin menghapus misi ini?')" 
                                            class="btn-delete" 
                                            style="text-decoration:none; background:#d63031; color:white; padding:5px 10px; border-radius:4px; font-size:0.8em;">
                                            Del
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="text-align:center; padding:20px;">Belum ada misi yang dibuat.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</body>

</html>