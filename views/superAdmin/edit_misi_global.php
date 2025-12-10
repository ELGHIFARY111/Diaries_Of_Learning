<link rel="stylesheet" href="./views/css/navigasiAtas.css">
<link rel="stylesheet" href="./views/css/misi_global.css">

<div class="container">
    <div class="content">
        <div class="header-action">
            <h2>Edit Misi Global</h2>
            <a href="index.php?page=manajemen_misi_global" class="btn-back">← Kembali</a>
        </div>

        <!-- PREVIEW MISI SAAT INI -->
        <div class="misi-preview">
            <h3>Preview Misi</h3>
            <div class="misi-card">
                <b><?= htmlspecialchars($data['judul']) ?></b>
                <p><?= htmlspecialchars($data['deskripsi']) ?></p>
                <p><b>Target:</b> <?= $data['target_jumlah_kata'] ?> kata</p>
                <p><b>Tanggal Mulai:</b> <?= $data['tanggal_mulai'] ?></p>
                <p><b>Tanggal Akhir:</b> <?= $data['tanggal_akhir'] ?>
                    <?php
                    $today = date('Y-m-d');
                    if ($data['tanggal_akhir'] < $today) {
                        echo '<span class="badge badge-late">Lewat Deadline</span>';
                    } elseif (strtotime($data['tanggal_akhir']) - strtotime($today) <= 3*24*60*60) {
                        echo '<span class="badge badge-soon">Dekat Deadline</span>';
                    }
                    ?>
                </p>
                <p><b>Progres:</b></p>
                <div class="progress-bar">
                    <div class="progress" style="width: <?= $data['progres'] ?? 0 ?>%;"></div>
                </div>
                <small><?= $data['progres'] ?? 0 ?>%</small>
                <p>
                    <b>Status:</b>
                    <?= ($data['progres'] ?? 0) == 100 ? '<span class="badge badge-complete">Selesai</span>' : '<span class="badge badge-pending">Berjalan</span>' ?>
                </p>
            </div>
        </div>

        <!-- FORM EDIT -->
        <form method="POST" class="form-misi">
            <label>Judul:</label>
            <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" required>

            <label>Deskripsi:</label>
            <textarea name="deskripsi" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>

            <label>Target Jumlah Kata:</label>
            <input type="number" name="target" value="<?= $data['target_jumlah_kata'] ?>" required min="1">

            <label>Tanggal Mulai:</label>
            <input type="date" name="mulai" value="<?= $data['tanggal_mulai'] ?>" required>

            <label>Tanggal Akhir:</label>
            <input type="date" name="akhir" value="<?= $data['tanggal_akhir'] ?>" required>

            <button type="submit" class="btn-submit">Update</button>
        </form>
    </div>
</div>
