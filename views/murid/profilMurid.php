<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Murid - Diary of Learning</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/murid.css">
</head>

<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <h2>Profil Pengguna</h2>
                <p>Kelola informasi akun dan data pribadi Anda.</p>
            </div>

            <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
                <div class="alert-box alert-success">
                    Data profil berhasil diperbarui!
                </div>
            <?php elseif (isset($_GET['status']) && $_GET['status'] == 'gagal'): ?>
                <div class="alert-box alert-danger">
                    Gagal memperbarui. Username atau Email mungkin sudah dipakai.
                </div>
            <?php endif; ?>
            
            <div class="profile-card">
    
                <div class="profile-layout">
                    
                    <div class="profile-sidebar">
                        <div class="profile-photo" style="width: 120px; height: 120px; margin: 0 auto 20px auto; background: #6c5ce7; color: white; font-size: 48px; display: flex; justify-content: center; align-items: center; border-radius: 50%;">
                            <?= strtoupper(substr($data_murid['nama_lengkap'], 0, 1)) ?>
                        </div>
                        
                        <div class="profile-name" style="font-size: 24px; font-weight: bold; margin-bottom: 5px;">
                            <?= htmlspecialchars($data_murid['nama_lengkap']) ?>
                        </div>
                        <div class="profile-role" style="color: #636e72; margin-bottom: 30px;">
                            Murid | <?= htmlspecialchars($nama_sekolah ?? '-') ?>
                        </div>

                        <div class="action-buttons-sidebar">
                            <?php if (!$is_edit_mode): ?>
                                <a href="index.php?page=murid/profilMurid&mode=edit" class="btn-action btn-edit" style="width: 100%; text-decoration: none; display: block; text-align: center; margin-bottom: 10px; background-color: #0984e3; color: white; padding: 12px; border-radius: 8px;">
                                    Edit Profil
                                </a>
                                
                                <a href="index.php?page=logout" onclick="return confirm('Yakin ingin keluar?')" class="btn-action btn-logout" style="width: 100%; text-decoration: none; display: block; text-align: center; background-color: #d63031; color: white; padding: 12px; border-radius: 8px;">
                                    Logout
                                </a>
                            <?php else: ?>
                                <div style="margin-top: 20px; padding: 15px; background: #f1f2f6; border-radius: 8px; font-size: 13px; color: #636e72;">
                                    <p>Anda sedang dalam mode edit profil. Silakan ubah data di sebelah kanan.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="profile-details">
                        
                        <?php if ($is_edit_mode): ?>
                            <h3 style="color: #0984e3; margin-top: 0; border-bottom: 2px solid #f1f2f6; padding-bottom: 20px; font-size: 22px;">
                                Edit Data Diri
                            </h3>
                            
                            <form action="index.php?page=murid/proses_edit_profil" method="POST" class="form-edit-wrapper" style="margin-top: 25px;">
                                
                                <label class="label-edit">Nama Lengkap</label>
                                <input type="text" name="nama" class="edit-input" value="<?= htmlspecialchars($data_murid['nama_lengkap']) ?>" required>
                                
                                <label class="label-edit">Username</label>
                                <input type="text" name="username" class="edit-input" value="<?= htmlspecialchars($data_murid['username']) ?>" required>
                                
                                <label class="label-edit">Email Kontak</label>
                                <input type="email" name="email" class="edit-input" value="<?= htmlspecialchars($data_murid['email']) ?>" required>
                                
                                <label class="label-edit">Password Baru (Opsional)</label>
                                <input type="password" name="password" class="edit-input" placeholder="Biarkan kosong jika tidak diubah">

                                <div style="margin-top: 30px;">
                                    <button type="submit" class="btn-action btn-success" style="cursor: pointer; border: none; padding: 12px 30px; font-size: 14px; background-color: #00b894; color: white; border-radius: 8px; font-weight: bold;">
                                        Simpan Perubahan
                                    </button>
                                    
                                    <a href="index.php?page=murid/profilMurid" class="btn-cancel">
                                        Batal
                                    </a>
                                </div>
                            </form>

                        <?php else: ?>
                            <h3 style="color: #6c5ce7; margin-top: 0; border-bottom: 2px solid #f1f2f6; padding-bottom: 20px; font-size: 22px;">
                                Informasi Pribadi
                            </h3>
                            
                            <div class="detail-grid">
                                <div class="detail-item">
                                    <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Nama Lengkap</label>
                                    <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">
                                        <?= htmlspecialchars($data_murid['nama_lengkap']) ?>
                                    </p>
                                </div>
                                
                                <div class="detail-item">
                                    <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Username</label>
                                    <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">
                                        @<?= htmlspecialchars($data_murid['username']) ?>
                                    </p>
                                </div>
                                
                                <div class="detail-item">
                                    <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Email</label>
                                    <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">
                                        <?= htmlspecialchars($data_murid['email']) ?>
                                    </p>
                                </div>
                                
                                <div class="detail-item">
                                    <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Jabatan</label>
                                    <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">
                                        Peserta Didik (Murid)
                                    </p>
                                </div>

                                <div class="detail-item">
                                    <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Nama Sekolah</label>
                                    <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">
                                        <?= htmlspecialchars($nama_sekolah ?? '-') ?>
                                    </p>
                                </div>
                                
                                <div class="detail-item">
                                    <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Kode Sekolah</label>
                                    <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px; letter-spacing: 1px;">
                                        <?= htmlspecialchars($kode_sekolah ?? '-') ?>
                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                    
                </div>
            </div>

        </div>
    </div>

</body>
</html>