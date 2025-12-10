<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Misi Baru</title>
    <link rel="stylesheet" href="./views/css/guru.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="header"><h2>Buat Misi Hafalan Baru</h2></div>
            
            <div class="box form-container">
                <form action="index.php?page=guru/proses_tambah_misi" method="POST">
                    
                    <div class="form-group">
                        <label>Judul Misi</label>
                        <input type="text" name="judul" placeholder="Contoh: Vocabulary Animals" required>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Singkat</label>
                        <textarea name="deskripsi" rows="3" placeholder="Jelaskan tujuan misi ini..."></textarea>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Berakhir</label>
                            <input type="date" name="tanggal_akhir" required>
                        </div>
                    </div>

                    <div class="form-group" style="background: #f0f8ff; padding: 15px; border-radius: 8px; border: 1px solid #bde0fe;">
                        <label style="color: #0056b3;">📝 Daftar Kata Target (Wajib)</label>
                        <p style="font-size: 12px; margin-bottom: 5px; color: #666;">
                            Masukkan kata bahasa Inggris yang harus dicatat siswa. Pisahkan dengan tanda koma (<b>,</b>).
                        </p>
                        <textarea name="kata_target" rows="4" placeholder="Contoh: Apple, Banana, Orange, Grape" required></textarea>
                    </div>

                    <div class="action-buttons" style="margin-top:20px; display:flex; justify-content:space-between;">
                        <a href="index.php?page=guru/misi_kosakata" class="btn-action" style="background:#ddd; color:#333; text-decoration:none;">Batal</a>
                        <button type="submit" class="btn-action btn-success">Simpan Misi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>