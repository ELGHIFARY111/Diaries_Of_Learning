<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Detail - <?= htmlspecialchars($info_sekolah['nama_sekolah']) ?></title>
    <link rel="stylesheet" href="./views/css/guru.css">
    
</head>
<body>
    <div class="container">
        <div class="content">
            
            <a href="index.php?page=guru/monitoring&active=siswa&aktif=true" style="display:inline-block; margin-bottom:20px; text-decoration:none; color:var(--color-text-secondary);">
                &larr; Back to School
            </a>

            <div class="detail-header">
                <div class="school-avatar">🏫</div>
                <div class="detail-info">
                    <h2><?= htmlspecialchars($info_sekolah['nama_sekolah']) ?></h2>
                    <p><?= htmlspecialchars($info_sekolah['alamat']) ?></p>
                    
                    <div class="code-badge" onclick="copyCode('<?= $info_sekolah['kode_sekolah'] ?>')" title="Click to copy">
                        CODE: <?= htmlspecialchars($info_sekolah['kode_sekolah']) ?> 📋
                    </div>
                </div>
            </div>

            <div class="grid-2">
                
                <div class="info-card">
                    <h3 style="margin-bottom:20px;">School Statistics</h3>
                    <div style="display:flex; gap:30px;">
                        <div>
                            <p style="color:#888; margin-bottom:5px;">Total Students</p>
                            <h2 style="color:var(--color-primary);"><?= $total_siswa ?></h2>
                        </div>
                        <div>
                            <p style="color:#888; margin-bottom:5px;">Total Teachers</p>
                            <h2 style="color:var(--color-success);"><?= mysqli_num_rows($list_guru) ?></h2>
                        </div>
                    </div>
                    <div style="margin-top:30px;">
                        <a href="index.php?page=guru/edit_sekolah&active=siswa&aktif=true" class="btn-action btn-primary" style="text-decoration:none; display:inline-block;">
                             Edit School Data
                        </a>
                    </div>
                </div>

                <div class="info-card">
                    <h3 style="margin-bottom:15px;">Teaching Colleagues</h3>
                    <?php if (mysqli_num_rows($list_guru) > 0): ?>
                        <div style="max-height: 300px; overflow-y: auto;">
                            <?php while($guru = mysqli_fetch_assoc($list_guru)): ?>
                                <div class="rekan-item">
                                    <div>
                                        <b style="display:block;"><?= htmlspecialchars($guru['nama_lengkap']) ?></b>
                                        <small style="color:#888;"><?= htmlspecialchars($guru['email']) ?></small>
                                    </div>
                                    <?php if($guru['email'] == $data_guru['email']): ?>
                                        <span class="badge badge-success" style="font-size:0.7em;">You</span>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <p style="color:#888;">No other teachers have joined yet.</p>
                    <?php endif; ?>
                </div>

            </div>

        </div>
    </div>

    <script>
        function copyCode(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('School Code (' + text + ') successfully copied!');
            }, function(err) {
                console.error('Failed to copy: ', err);
            });
        }
    </script>
</body>
</html>