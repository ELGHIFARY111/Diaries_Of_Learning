<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit School</title>
    <link rel="stylesheet" href="./views/css/guru.css">
    
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="header" style="text-align: center;">
                <h2>Edit School Data</h2>
                <p>Update your school information.</p>
            </div>

            <div class="box form-container">
                <form action="index.php?page=guru/proses_edit_sekolah" method="POST">
                    
                    <div class="form-group">
                        <label>School Name</label>
                        <input type="text" name="nama_sekolah" 
                                 value="<?= htmlspecialchars($info_sekolah['nama_sekolah']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Full Address</label>
                        <textarea name="alamat" rows="4" required><?= htmlspecialchars($info_sekolah['alamat']) ?></textarea>
                    </div>

                    <div class="form-group">
                            <label>School Code (Cannot be changed)</label>
                            <input type="text" value="<?= $info_sekolah['kode_sekolah'] ?>" disabled 
                                style="background: #f0f0f0; color: #888;">
                    </div>

                    <div class="action-buttons" style="display:flex; justify-content:space-between; margin-top:30px;">
                        <a href="index.php?page=guru/detail_sekolah&active=siswa&aktif=true" class="btn-action" style="background:#ddd; color:#333; text-decoration:none;">
                            Cancel
                        </a>
                        <button type="submit" class="btn-action btn-primary">Save Changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>