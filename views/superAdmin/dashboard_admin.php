<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="./views/css/guru.css">
</head>
<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <h2>System Overview</h2>
                <p>Panel kontrol utama Diary of Learning.</p>
            </div>

            <!-- STATISTIK -->
            <div class="stats-box">
                <div class="card" style="border-left: 5px solid #6c5ce7;">
                    <p>Total User</p>
                    <h3><?= $total_user ?></h3>
                </div>

                <div class="card" style="border-left: 5px solid #00b894;">
                    <p>Total Catatan</p>
                    <h3><?= $total_catatan ?></h3>
                </div>

                <div class="card" style="border-left: 5px solid #fdcb6e;">
                    <p>Event Global Aktif</p>
                    <h3><?= $event_aktif ?></h3>
                </div>
            </div>

            <div class="layout-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-top: 20px;">
                
                <!-- EVENT GLOBAL -->
                <div class="box">
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <h3>🏆 Event Global Sedang Berjalan</h3>
                        <a href="index.php?page=tambah_misi_global" style="font-size:12px; text-decoration:none; color:#0984e3;">+ Buat Baru</a>
                    </div>

                    <?php if (empty($event_global)): ?>
                        <p style="font-size:13px; color:#aaa;">Tidak ada event aktif.</p>
                    <?php else: ?>
                        <?php foreach ($event_global as $e): ?>
                            <div class="list-item" style="border-left: 3px solid #f1c40f;">
                                <b><?= $e['judul'] ?></b>
                                <span style="float:right; color:#d35400; font-weight:bold;">
                                    +<?= $e['target_jumlah_kata'] ?> XP
                                </span>
                                <p style="font-size:12px; color:#aaa;">
                                    Target: <?= $e['target_jumlah_kata'] ?> kata • Berakhir: <?= $e['tanggal_akhir'] ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- USER TERBARU -->
                <div class="box">
                    <h3>👥 Registrasi Terbaru</h3>

                    <?php if (empty($user_baru)): ?>
                        <p style="font-size:13px; color:#aaa;">Belum ada registrasi baru.</p>
                    <?php else: ?>
                        <?php foreach ($user_baru as $u): ?>
                            <div class="list-item">
                                <b><?= $u['nama_lengkap'] ?></b><br>
                                <span style="font-size:11px; background:#dfe6e9; padding:2px 5px; border-radius:4px;">
                                    <?= ucfirst($u['role']) ?>
                                </span>
                                <span style="font-size:11px; color:#aaa; float:right;">
                                    <?php 
                                    if (isset($u['created_at'])) {
                                        echo date("d M", strtotime($u['created_at']));
                                    } else {
                                        echo "ID #" . $u['id_user'];  // fallback aman
                                    }
                                    ?>
                                </span>

                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

            </div>

        </div>
    </div>

</body>
</html>
