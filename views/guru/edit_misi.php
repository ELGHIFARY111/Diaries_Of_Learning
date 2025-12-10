
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Misi</title>
    <link rel="stylesheet" href="./views/css/guru.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="header"><h2>Edit Misi</h2></div>
            
            <div class="box form-container">
                <form action="index.php?page=guru/proses_edit_misi" method="POST">
                    <input type="hidden" name="id_misi" value="<?= $misi['id_misi'] ?>">

                    <div class="form-group">
                        <label>Judul Misi</label>
                        <input type="text" name="judul" value="<?= htmlspecialchars($misi['judul']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Singkat</label>
                        <textarea name="deskripsi" rows="3"><?= htmlspecialchars($misi['deskripsi']) ?></textarea>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" value="<?= $misi['tanggal_mulai'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Berakhir</label>
                            <input type="date" name="tanggal_akhir" value="<?= $misi['tanggal_akhir'] ?>" required>
                        </div>
                    </div>

                    <div class="form-group" style="background: #fff3cd; padding: 15px; border-radius: 8px; border: 1px solid #ffeeba;">
                        <label style="color: #856404;">📝 Edit Daftar Kata</label>
                        <p style="font-size: 12px; margin-bottom: 5px;">Pisahkan dengan koma.</p>
                        <textarea name="kata_target" rows="4" required><?= htmlspecialchars($kata_kata_string ?? '') ?></textarea>
                    </div>

                    <div class="action-buttons" style="margin-top:20px; display:flex; justify-content:space-between;">
                        <a href="index.php?page=guru/misi_kosakata" class="btn-action" style="background:#ddd; color:#333; text-decoration:none;">Batal</a>
                        <button type="submit" class="btn-action btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>