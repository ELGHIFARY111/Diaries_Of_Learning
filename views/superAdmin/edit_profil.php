<link rel="stylesheet" href="./views/css/guru.css">

<div class="container">
    <div class="content">

        <div class="header">
            <h2>Edit Profil Administrator</h2>
            <p>Perbarui informasi akun Anda agar tetap mutakhir.</p>
        </div>

        <div class="profile-card">
            <div class="profile-layout">
                
                <div class="profile-sidebar">
                    <div class="profile-photo">
                        <?= strtoupper(substr($data_user['nama_lengkap'], 0, 1)); ?>
                    </div>
                    
                    <div class="profile-name">
                        <?= $data_user['nama_lengkap']; ?>
                    </div>
                    
                    <div class="profile-role">
                        Super Admin
                    </div>

                    <div style="margin-top: 20px; padding: 15px; background: #fff; border-radius: 8px; font-size: 12px; color: #7f8c8d; text-align: left;">
                        <b>Tips:</b> Kosongkan kolom <i>Password Baru</i> jika tidak ingin mengganti kata sandi.
                    </div>
                </div>

                <div class="profile-details-area">
                    <form action="index.php?page=proses_edit_profil" method="POST">
                        <h3 class="info-title">Pengaturan Akun</h3>
                        
                        <div class="detail-grid">
                            <div class="detail-item">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" 
                                       value="<?= $data_user['nama_lengkap']; ?>" 
                                       style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px;" required>
                            </div>
                            
                            <div class="detail-item">
                                <label>Username</label>
                                <input type="text" name="username" 
                                       value="<?= $data_user['username']; ?>" 
                                       style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px;" required>
                            </div>
                            
                            <div class="detail-item">
                                <label>Email</label>
                                <input type="email" name="email" 
                                       value="<?= $data_user['email']; ?>" 
                                       style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px;" required>
                            </div>
                            
                            <div class="detail-item">
                                <label>Password Baru</label>
                                <input type="password" name="password_baru" 
                                       placeholder="Isi hanya jika ingin ganti"
                                       style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 5px;">
                            </div>
                        </div>

                        <div class="action-buttons-sidebar" style="flex-direction: row; justify-content: flex-end; margin-top: 30px; gap: 10px; border-top: 1px solid #eee; padding-top: 20px;">
                            <a href="index.php?page=profil" class="btn-action btn-logout" 
                               style="background-color: #eee; color: #333; border: 1px solid #ccc; max-width: 120px;">
                               Batal
                            </a>
                            <button type="submit" class="btn-action btn-edit" 
                                    style="max-width: 180px; border: none; cursor: pointer;">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>