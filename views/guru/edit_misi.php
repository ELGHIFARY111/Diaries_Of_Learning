<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mission</title>
    <link rel="stylesheet" href="./views/css/guru.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="header"><h2>Edit Mission</h2></div>
            
            <div class="box form-container">
                <form action="index.php?page=guru/proses_edit_misi" method="POST">
                    <input type="hidden" name="id_misi" value="<?= $misi['id_misi'] ?>">

                    <div class="form-group">
                        <label>Mission Title</label>
                        <input type="text" name="judul" value="<?= htmlspecialchars($misi['judul']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="deskripsi" rows="3"><?= htmlspecialchars($misi['deskripsi']) ?></textarea>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="date" name="tanggal_mulai" value="<?= $misi['tanggal_mulai'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="date" name="tanggal_akhir" value="<?= $misi['tanggal_akhir'] ?>" required>
                        </div>
                    </div>

                    <div class="form-group" style="background: #fff3cd; padding: 15px; border-radius: 8px; border: 1px solid #ffeeba;">
                        <label style="color: #856404;">📝 Edit Word List</label>
                        <p style="font-size: 12px; margin-bottom: 5px;">Separate with commas.</p>
                        <textarea name="kata_target" rows="4" required><?= htmlspecialchars($kata_kata_string ?? '') ?></textarea>
                    </div>

                    <div class="action-buttons" style="margin-top:20px; display:flex; justify-content:space-between;">
                        <a href="index.php?page=guru/misi_kosakata" class="btn-action" style="background:#ddd; color:#333; text-decoration:none;">Cancel</a>
                        <button type="submit" class="btn-action btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>