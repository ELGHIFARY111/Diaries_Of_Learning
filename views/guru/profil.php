<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/guru.css">
</head>

<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <h2>User Profile</h2>
                <p>Manage your account information and personal data.</p>
            </div>

            <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
                <div class="alert-box alert-success">
                    Profile data successfully updated!
                </div>
            <?php elseif (isset($_GET['status']) && $_GET['status'] == 'gagal'): ?>
                <div class="alert-box alert-danger">
                    Failed to update. Username or Email may already be in use.
                </div>
            <?php endif; ?>
            
            <div class="profile-card">
    
                <div class="profile-layout">
                    
                    <div class="profile-sidebar">
                        <div class="profile-photo" style="width: 120px; height: 120px; margin: 0 auto 20px auto; background: #6c5ce7; color: white; font-size: 48px; display: flex; justify-content: center; align-items: center; border-radius: 50%;">
                            <?= strtoupper(substr($data_guru['nama_lengkap'], 0, 1)) ?>
                        </div>
                        
                        <div class="profile-name" style="font-size: 24px; font-weight: bold; margin-bottom: 5px;">
                            <?= htmlspecialchars($data_guru['nama_lengkap']) ?>
                        </div>
                        <div class="profile-role" style="color: #636e72; margin-bottom: 30px;">
                            Teacher | <?= htmlspecialchars($nama_sekolah) ?>
                        </div>

                        <div class="action-buttons-sidebar">
                            <?php if (!$is_edit_mode): ?>
                                <a href="index.php?page=guru/profil&mode=edit&active=profil&aktif=true" class="btn-action btn-edit" style="width: 100%; text-decoration: none; display: block; text-align: center; margin-bottom: 10px; background-color: #0984e3; color: white; padding: 12px; border-radius: 8px;">
                                    Edit Profile
                                </a>
                                
                                <a href="index.php?page=logout&active=profil&aktif=true" onclick="return confirm('Are you sure you want to log out?')" class="btn-action btn-logout" style="width: 100%; text-decoration: none; display: block; text-align: center; background-color: #d63031; color: white; padding: 12px; border-radius: 8px;">
                                    Logout
                                </a>
                            <?php else: ?>
                                <div style="margin-top: 20px; padding: 15px; background: #f1f2f6; border-radius: 8px; font-size: 13px; color: #636e72;">
                                    <p>You are in profile edit mode. Please update the data on the right.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="profile-details">
                        
                        <?php if ($is_edit_mode): ?>
                            <h3 style="color: #0984e3; margin-top: 0; border-bottom: 2px solid #f1f2f6; padding-bottom: 20px; font-size: 22px;">
                                Edit Personal Data
                            </h3>
                            
                            <form action="index.php?page=guru/proses_edit_profil&active=profil&aktif=true" method="POST" class="form-edit-wrapper" style="margin-top: 25px;">
                                
                                <label class="label-edit">Full Name</label>
                                <input type="text" name="nama_lengkap" class="edit-input" value="<?= htmlspecialchars($data_guru['nama_lengkap']) ?>" required>
                                
                                <label class="label-edit">Username</label>
                                <input type="text" name="username" class="edit-input" value="<?= htmlspecialchars($data_guru['username']) ?>" required>
                                
                                <label class="label-edit">Contact Email</label>
                                <input type="email" name="email" class="edit-input" value="<?= htmlspecialchars($data_guru['email']) ?>" required>
                                
                                <label class="label-edit">New Password (Optional)</label>
                                <input type="password" name="password" class="edit-input" placeholder="Leave blank if not changing">

                                <div style="margin-top: 30px;">
                                    <button type="submit" class="btn-action btn-success" style="cursor: pointer; border: none; padding: 12px 30px; font-size: 14px; background-color: #00b894; color: white; border-radius: 8px; font-weight: bold;">
                                        Save Changes
                                    </button>
                                    
                                    <a href="index.php?page=guru/profil&active=profil&aktif=true" class="btn-cancel">
                                        Cancel
                                    </a>
                                </div>
                            </form>

                        <?php else: ?>
                            <h3 style="color: #6c5ce7; margin-top: 0; border-bottom: 2px solid #f1f2f6; padding-bottom: 20px; font-size: 22px;">
                                Personal Information
                            </h3>
                            
                            <div class="detail-grid">
                                <div class="detail-item">
                                    <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Full Name</label>
                                    <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">
                                        <?= htmlspecialchars($data_guru['nama_lengkap']) ?>
                                    </p>
                                </div>
                                
                                <div class="detail-item">
                                    <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Username</label>
                                    <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">
                                        @<?= htmlspecialchars($data_guru['username']) ?>
                                    </p>
                                </div>
                                
                                <div class="detail-item">
                                    <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Email</label>
                                    <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">
                                        <?= htmlspecialchars($data_guru['email']) ?>
                                    </p>
                                </div>
                                
                                <div class="detail-item">
                                    <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Position</label>
                                    <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">
                                        Teaching Staff (Teacher)
                                    </p>
                                </div>

                                <div class="detail-item">
                                    <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">School Name</label>
                                    <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">
                                        <?= htmlspecialchars($nama_sekolah) ?>
                                    </p>
                                </div>
                                
                                <div class="detail-item">
                                    <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">School Code</label>
                                    <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px; letter-spacing: 1px;">
                                        <?= htmlspecialchars($kode_sekolah) ?>
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