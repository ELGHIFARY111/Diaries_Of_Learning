<link rel="stylesheet" href="./views/css/navigasiAtas.css">
<link rel="stylesheet" href="./views/css/misi_global.css">

<div class="container">
    <div class="content">
        <div class="header-action">
            <h2>Edit Misi Global</h2>
            <a href="index.php?page=manajemen_misi_global" class="btn-back">← Kembali</a>
        </div>

        <div class="box form-container" style="background: white; padding: 25px; border-radius: 8px; margin-top: 20px;">
            
            <form action="index.php?page=proses_edit_misi_global" method="POST">
                <input type="hidden" name="id_misi" value="<?= $data['id_misi'] ?>">

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display:block; font-weight:bold; margin-bottom:5px;">Judul Misi</label>
                    <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" required 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display:block; font-weight:bold; margin-bottom:5px;">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" required 
                              style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"><?= htmlspecialchars($data['deskripsi']) ?></textarea>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 15px;">
                    <div class="form-group">
                        <label style="display:block; font-weight:bold; margin-bottom:5px;">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" value="<?= $data['tanggal_mulai'] ?>" required
                               style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    </div>
                    <div class="form-group">
                        <label style="display:block; font-weight:bold; margin-bottom:5px;">Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" value="<?= $data['tanggal_akhir'] ?>" required
                               style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    </div>
                </div>

                <div class="form-group" style="background: #f0f8ff; padding: 15px; border-radius: 8px; border: 1px solid #bde0fe; margin-bottom: 20px;">
                    <label style="color: #0056b3; font-weight:bold;">📝 Daftar Kata Target (Pisahkan dengan koma)</label>
                    <p style="font-size: 12px; margin-bottom: 8px; color: #666;">
                        Contoh: Apple, Banana, Orange
                    </p>
                    <textarea name="kata_target" rows="5" required
                              style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"><?= htmlspecialchars($kata_kata_string ?? '') ?></textarea>
                </div>

                <div class="action-buttons" style="display:flex; justify-content: flex-end; gap: 10px;">
                    <button type="submit" class="btn-action" 
                            style="background: #2ecc71; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>