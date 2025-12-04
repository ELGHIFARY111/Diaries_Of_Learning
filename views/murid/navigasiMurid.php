<link rel="stylesheet" href="./views/css/navigasiMurid.css">
<div class="sidebar">
    <div class="logo">📘 Diary Sekolah</div>
    
    <div class="menu">
        <a href="index.php?page=murid&active=dashboard&aktif=true" 
        class="<?= ($active == 'dashboard') ? 'aktif' : '' ?>">
        🏠 Dashboard
        </a>

        <a href="index.php?page=murid/catatanMurid&active=catatan&aktif=true" 
        class="<?= ($active == 'catatan') ? 'aktif' : '' ?>">
        📝 Catatan Harian
        </a>

        <a href="index.php?page=murid/kosakataMurid&active=kosakata&aktif=true" 
        class="<?= ($active == 'kosakata') ? 'aktif' : '' ?>">
        📖 Kosakata
        </a>

        <a href="index.php?page=murid/misiMurid&active=misi&aktif=true" 
        class="<?= ($active == 'misi') ? 'aktif' : '' ?>">
        🎯 Misi Saya
        </a>

        <a href="index.php?page=logout">🚪 Logout</a>
    </div>

    <div class="user-info">
        Login sebagai:<br>
        <b>Dian Anggraini (Siswa)</b>
    </div>
</div>