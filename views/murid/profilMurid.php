<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Guru - Diary of Learning</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/guru.css">
</head>

<body>
    <div class="container">
        <div class="content">

            <div class="header">
                <h2>Profil Pengguna</h2>
                <p>Kelola informasi akun dan data pribadi Anda.</p>
            </div>

            <!-- ALERT BOX (Static -> bebas ubah sesuai kebutuhan) -->
            <div class="alert-box alert-success" style="display:none;">
                Data profil berhasil diperbarui!
            </div>
            <div class="alert-box alert-danger" style="display:none;">
                Gagal memperbarui. Username atau Email mungkin sudah dipakai.
            </div>

            <div class="profile-card">
                <div class="profile-layout">
                    
                    <!-- SIDEBAR -->
                    <div class="profile-sidebar">
                        <div class="profile-photo" style="width: 120px; height: 120px; margin: 0 auto 20px auto; background: #6c5ce7; color: white; font-size: 48px; display: flex; justify-content: center; align-items: center; border-radius: 50%;">
                            A
                        </div>
                        
                        <div class="profile-name" style="font-size: 24px; font-weight: bold; margin-bottom: 5px;">
                            Nama Lengkap Siswa
                        </div>
                        <div class="profile-role" style="color: #636e72; margin-bottom: 30px;">
                            Siswa | Nama Sekolah
                        </div>

                        <div class="action-buttons-sidebar">
                            <a href="#" class="btn-action btn-edit" style="width: 100%; text-decoration: none; display: block; text-align: center; margin-bottom: 10px; background-color: #0984e3; color: white; padding: 12px; border-radius: 8px;">
                                Edit Profil
                            </a>
                            <a href="index.php?page=logout" onclick="return confirm('Yakin ingin keluar?')" class="btn-action btn-logout" style="width: 100%; text-decoration: none; display: block; text-align: center; background-color: #d63031; color: white; padding: 12px; border-radius: 8px;">
                                Logout
                            </a>
                        </div>
                    </div>

                    <!-- DETAIL PROFIL -->
                    <div class="profile-details">
                        <h3 style="color: #6c5ce7; margin-top: 0; border-bottom: 2px solid #f1f2f6; padding-bottom: 20px; font-size: 22px;">
                            Informasi Pribadi
                        </h3>
                        
                        <div class="detail-grid">
                            <div class="detail-item">
                                <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Nama Lengkap</label>
                                <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">Nama Lengkap</p>
                            </div>
                            
                            <div class="detail-item">
                                <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Username</label>
                                <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">@usernameguru</p>
                            </div>
                            
                            <div class="detail-item">
                                <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Email</label>
                                <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">emailguru@example.com</p>
                            </div>
                            
                            <div class="detail-item">
                                <label style="font-size: 11px; color: #b2bec3; font-weight: bold; text-transform: uppercase;">Sekolah</label>
                                <p style="margin: 8px 0; font-weight: 600; color: #2d3436; font-size: 18px;">Tenaga Pengajar (Guru)</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
