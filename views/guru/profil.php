<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Guru - Diary of Learning</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/profil.css">
</head>

<body>

    <div class="container">

        <div class="sidebar">
            <div class="logo">📘 Diary of Learning</div>
            <div class="menu">
                <a href="#">🏠 Dashboard</a>
                <a href="#">🧑‍🎓 Daftar Siswa</a>
                <a href="#">🎯 Misi Kosa Kata Sekolah</a>
                <a href="#">📝 Review Catatan Siswa</a>
                <a href="#">📊 Laporan Progres</a>
                <a href="#" class="aktif">👤 Profil Guru</a>
                <a href="#">🚪 Logout</a>
            </div>
            <div class="user-info">
                Login sebagai:<br>
                <b>Bapak Arik (Guru)</b>
                <br>SMA Bintang Timur
            </div>
        </div>

        <div class="content">

            <div class="header">
                <h2>👤 Profil Guru</h2>
                <p>Informasi akun dan data institusi Anda saat ini.</p>
            </div>
            
            <div class="profile-card">
                
                <div class="profile-photo">
                    A
                </div>

                <div class="profile-name">Bapak Arik</div>
                <div class="profile-role">Guru Pengajar | SMA Bintang Timur</div>
                
                <hr style="border: 0; border-top: 1px solid #eee; margin: 30px 0;">

                <div class="detail-grid">
                    
                    <div class="detail-item">
                        <label>Nama Lengkap</label>
                        <p>Bapak Arik</p>
                    </div>
                    
                    <div class="detail-item">
                        <label>Username/ID Login</label>
                        <p>gurua</p>
                    </div>
                    
                    <div class="detail-item">
                        <label>Email Kontak</label>
                        <p>arik.g@bt.com</p>
                    </div>
                    
                    <div class="detail-item">
                        <label>Jabatan</label>
                        <p>Guru Pengajar</p>
                    </div>
                    
                    <div class="detail-item">
                        <label>Nama Sekolah</label>
                        <p>SMA Bintang Timur</p>
                    </div>
                    
                    <div class="detail-item">
                        <label>ID Sekolah</label>
                        <p>100</p>
                    </div>
                    
                </div>
                
                <div class="action-buttons">
                    <button class="btn-action btn-edit">
                        📝 Edit Data Profil
                    </button>
                    <button class="btn-action btn-password">
                        🔑 Ubah Kata Sandi
                    </button>
                </div>
                <p class="footer-info">*Tombol di atas hanya simulasi navigasi ke halaman edit.</p>
            </div>

        </div>

    </div>

</body>

</html>