<div class="sidebar">
    <div class="logo">📘 Diary Sekolah</div>
    
    <div class="menu">
        <a href="index.php?page=murid" 
        class="<?= ($active == 'dashboard') ? 'aktif' : '' ?>">
        🏠 Dashboard
        </a>

        <a href="index.php?page=murid/catatanMurid" 
        class="<?= ($active == 'catatan') ? 'aktif' : '' ?>">
        📝 Catatan Harian
        </a>

        <a href="index.php?page=murid/kosakataMurid" 
        class="<?= ($active == 'kosakata') ? 'aktif' : '' ?>">
        📖 Kosakata
        </a>

        <a href="index.php?page=murid/misiMurid" 
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