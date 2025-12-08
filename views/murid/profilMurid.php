<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Diary Sekolah</title>
    <link rel="stylesheet" href="./views/css/profilMuridStyle.css">
</head>

<body>

    <div class="container">

        <div class="content">

            <div class="header">
                <h2>Profil Pengguna</h2>
                <p>Kelola informasi akun dan data pribadimu.</p>
            </div>

            <div class="profile-card">
                
                <div class="profile-left">
                    <div class="avatar-box">
                        <span class="avatar-text">DA</span>
                        </div>

                    <h3 class="profile-name">Dian Anggraini</h3>
                    <span class="profile-role">Siswa • Level 1</span>

                    <div class="profile-actions">
                        <button class="btn btn-edit">✏️ Edit Profil</button>
                        <button class="btn btn-logout" onclick="window.location.href='index.php?page=logout'">🚪 Logout</button>
                    </div>
                </div>

                <div class="profile-right">
                    <h3 class="info-title">Informasi Pribadi</h3>
                    
                    <div class="info-grid">
                        
                        <div class="info-group">
                            <label>Nama Lengkap</label>
                            <div class="info-value">Dian Anggraini Putri</div>
                        </div>

                        <div class="info-group">
                            <label>Username</label>
                            <div class="info-value">@siswa01</div>
                        </div>

                        <div class="info-group">
                            <label>Email</label>
                            <div class="info-value">dian@mail.com</div>
                        </div>

                        <div class="info-group">
                            <label>Sekolah</label>
                            <div class="info-value">SMA Bintang Timur</div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>