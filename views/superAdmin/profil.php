<link rel="stylesheet" href="./views/css/guru.css">
<div class="container">
    <div class="content">
        <div class="header">
            <h2>Profil Pengguna</h2>
            <p>Informasi akun dan data pribadi Anda.</p>
        </div>

        <?php if(isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
            <div class="alert-box alert-success" style="display:block; background:#d4edda; color:#155724; padding:10px; border-radius:5px; margin-bottom:15px;">
                Profil berhasil diperbarui!
            </div>
        <?php endif; ?>

        <div class="profile-card">
            <div class="profile-layout">
                <div class="profile-sidebar">
                    <div class="profile-photo" style="width: 120px; height: 120px; margin: 0 auto 20px auto; background: #6c5ce7; color: white; font-size: 48px; display: flex; justify-content: center; align-items: center; border-radius: 50%;">
                        <?= strtoupper(substr($data_user['nama_lengkap'], 0, 1)); ?>
                    </div>
                    
                    <div class="profile-name" style="font-size: 24px; font-weight: bold; margin-bottom: 5px;">
                        <?= $data_user['nama_lengkap']; ?>
                    </div>

                    <div class="profile-role" style="color: #636e72; margin-bottom: 30px;">
                        <?= ucfirst($data_user['role']); ?> | <?= $data_user['nama_sekolah'] ?? 'Superadmin'; ?>
                    </div>

                    <div class="action-buttons-sidebar">
                        <a href="index.php?page=edit_profil" class="btn-action btn-edit" style="width: 100%; text-decoration: none; display: block; text-align: center; margin-bottom: 10px; background-color: #0984e3; color: white; padding: 12px; border-radius: 8px;">
                            Edit Profil
                        </a>

                        <a href="index.php?page=logout" onclick="return confirm('Yakin ingin keluar?')" class="btn-action btn-logout" style="width: 100%; text-decoration: none; display: block; text-align: center; background-color: #d63031; color: white; padding: 12px; border-radius: 8px;">
                            Logout
                        </a>
                    </div>
                </div>

                <div class="profile-details">
                    <h3 style="color: #6c5ce7; margin-top: 0; border-bottom: 2px solid #f1f2f6; padding-bottom: 20px; font-size: 22px;">
                        Informasi Pribadi
                    </h3>
                    
                    <div class="detail-grid">
                        <div class="detail-item">
                            <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Nama Lengkap</label>
                            <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;"><?= $data_user['nama_lengkap']; ?></p>
                        </div>
                        <div class="detail-item">
                            <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Username</label>
                            <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">@<?= $data_user['username']; ?></p>
                        </div>
                        <div class="detail-item">
                            <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Email</label>
                            <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;"><?= $data_user['email']; ?></p>
                        </div>
                        <div class="detail-item">
                            <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Role</label>
                            <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;"><?= ucfirst($data_user['role']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>