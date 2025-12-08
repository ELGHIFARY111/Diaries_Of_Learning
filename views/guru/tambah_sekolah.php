<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Sekolah Baru</title>
    <link rel="stylesheet" href="./views/css/guru.css">
    <style>

    </style>
</head>
<body>
    <div class="container">
        <div class="content" style="">
            <div class="header" style="text-align: center;">
                <h2>Registrasi Sekolah</h2>
                <p>Mulai perjalanan digital sekolah Anda di sini.</p>
            </div>

            <div class="box form-container">
                <form action="index.php?page=guru/proses_tambah_sekolah" method="POST">
                    
                    <div class="form-group">
                        <label>Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" placeholder="Contoh: SMA Bintang Timur" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea name="alamat" rows="4" placeholder="Jalan Raya No..." required></textarea>
                    </div>

                    <div class="action-buttons" style="display:flex; justify-content:space-between;">
                        <a href="index.php?page=guru/monitoring" class="btn-action" style="background:#e0e0e0; color:#333; text-decoration:none; text-align:center;">Batal</a>
                        <button type="submit" class="btn-action btn-success">Simpan Sekolah</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>