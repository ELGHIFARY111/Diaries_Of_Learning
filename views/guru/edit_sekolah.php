<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Sekolah</title>
    <link rel="stylesheet" href="./views/css/guru.css">
    <style>
        .form-container { max-width: 600px; margin: 40px auto; padding: 30px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; }
        .form-group input, .form-group textarea { 
            width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; 
        }
    </style>
</head>
<body>
    <div class="container">
        
        <?php include "./views/guru/navigasiGuru.php"; ?>

        <div class="content">
            <div class="header" style="text-align: center;">
                <h2>Edit Data Sekolah</h2>
                <p>Perbarui informasi sekolah Anda.</p>
            </div>

            <div class="box form-container">
                <form action="index.php?page=guru/proses_edit_sekolah" method="POST">
                    
                    <div class="form-group">
                        <label>Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" 
                                value="<?= htmlspecialchars($info_sekolah['nama_sekolah']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea name="alamat" rows="4" required><?= htmlspecialchars($info_sekolah['alamat']) ?></textarea>
                    </div>

                    <div class="form-group">
                            <label>Kode Sekolah (Tidak dapat diubah)</label>
                            <input type="text" value="<?= $info_sekolah['kode_sekolah'] ?>" disabled 
                                style="background: #f0f0f0; color: #888;">
                    </div>

                    <div class="action-buttons" style="display:flex; justify-content:space-between; margin-top:30px;">
                        <a href="index.php?page=guru/detail_sekolah" class="btn-action" style="background:#ddd; color:#333; text-decoration:none;">
                            Batal
                        </a>
                        <button type="submit" class="btn-action btn-primary">Simpan Perubahan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>