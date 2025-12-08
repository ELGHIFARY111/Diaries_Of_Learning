<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Sekolah - <?= htmlspecialchars($info_sekolah['nama_sekolah']) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/guru.css">
    <style>
        /* CSS Khusus Halaman Detail */
        .detail-header {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: var(--box-shadow-subtle);
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .school-avatar {
            width: 80px; height: 80px;
            background: var(--color-background-light);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 40px;
        }
        .detail-info h2 { margin: 0 0 5px 0; color: var(--color-text-primary); }
        .detail-info p { margin: 0; color: var(--color-text-secondary); }
        
        .code-badge {
            background: #e1f5fe; color: #0288d1;
            padding: 5px 12px; border-radius: 6px;
            font-weight: bold; font-family: monospace; font-size: 1.1em;
            cursor: pointer; display: inline-block; margin-top: 10px;
        }

        .grid-2 {
            display: grid; grid-template-columns: 2fr 1fr; gap: 25px;
        }
        @media (max-width: 768px) { .grid-2 { grid-template-columns: 1fr; } }

        .info-card {
            background: #fff; padding: 25px;
            border-radius: 12px; box-shadow: var(--box-shadow-subtle);
        }
        .rekan-item {
            display: flex; justify-content: space-between; align-items: center;
            padding: 12px 0; border-bottom: 1px solid #eee;
        }
        .rekan-item:last-child { border-bottom: none; }
    </style>
</head>
<body>
    <div class="container">
        
        <?php include "./views/guru/navigasiGuru.php"; ?>

        <div class="content">
            
            <a href="index.php?page=guru/monitoring" style="display:inline-block; margin-bottom:20px; text-decoration:none; color:var(--color-text-secondary);">
                &larr; Kembali ke Monitoring
            </a>

            <div class="detail-header">
                <div class="school-avatar">🏫</div>
                <div class="detail-info">
                    <h2><?= htmlspecialchars($info_sekolah['nama_sekolah']) ?></h2>
                    <p><?= htmlspecialchars($info_sekolah['alamat']) ?></p>
                    
                    <div class="code-badge" onclick="copyCode('<?= $info_sekolah['kode_sekolah'] ?>')" title="Klik untuk menyalin">
                        KODE: <?= htmlspecialchars($info_sekolah['kode_sekolah']) ?> 📋
                    </div>
                </div>
            </div>

            <div class="grid-2">
                
                <div class="info-card">
                    <h3 style="margin-bottom:20px;">Statistik Sekolah</h3>
                    <div style="display:flex; gap:30px;">
                        <div>
                            <p style="color:#888; margin-bottom:5px;">Total Siswa</p>
                            <h2 style="color:var(--color-primary);"><?= $total_siswa ?></h2>
                        </div>
                        <div>
                            <p style="color:#888; margin-bottom:5px;">Total Guru</p>
                            <h2 style="color:var(--color-success);"><?= mysqli_num_rows($list_guru) ?></h2>
                        </div>
                    </div>
                    <div style="margin-top:30px;">
                        <a href="index.php?page=guru/edit_sekolah&active=siswa&aktif=true" class="btn-action btn-primary" style="text-decoration:none; display:inline-block;">
                            ✏️ Edit Data Sekolah
                        </a>
                    </div>
                </div>

                <div class="info-card">
                    <h3 style="margin-bottom:15px;">Rekan Pengajar</h3>
                    <?php if (mysqli_num_rows($list_guru) > 0): ?>
                        <div style="max-height: 300px; overflow-y: auto;">
                            <?php while($guru = mysqli_fetch_assoc($list_guru)): ?>
                                <div class="rekan-item">
                                    <div>
                                        <b style="display:block;"><?= htmlspecialchars($guru['nama_lengkap']) ?></b>
                                        <small style="color:#888;"><?= htmlspecialchars($guru['email']) ?></small>
                                    </div>
                                    <?php if($guru['email'] == $data_guru['email']): ?>
                                        <span class="badge badge-success" style="font-size:0.7em;">Anda</span>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <p style="color:#888;">Belum ada guru lain yang bergabung.</p>
                    <?php endif; ?>
                </div>

            </div>

        </div>
    </div>

    <script>
        // Fitur Salin Kode
        function copyCode(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Kode Sekolah (' + text + ') berhasil disalin!');
            }, function(err) {
                console.error('Gagal menyalin: ', err);
            });
        }
    </script>
</body>
</html>