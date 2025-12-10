<link rel="stylesheet" href="./views/css/navigasi_murid.css">

<div class="sidebar">
    <div class="logo">Diary of Learning</div>
    
    <div class="menu">
        <a href="index.php?page=murid&active=dashboard&aktif=true" 
        class="<?= ($active == 'dashboard') ? 'aktif' : '' ?>">
        Dashboard
        </a>

        <a href="index.php?page=murid/catatanMurid&active=catatan&aktif=true" 
        class="<?= ($active == 'catatan') ? 'aktif' : '' ?>">
        Daily Notes
        </a>

        <a href="index.php?page=murid/kosakataMurid&active=kosakata&aktif=true" 
        class="<?= ($active == 'kosakata') ? 'aktif' : '' ?>">
        Vocabulary
        </a>

        <a href="index.php?page=murid/misiMurid&active=misi&aktif=true" 
        class="<?= ($active == 'misi') ? 'aktif' : '' ?>">
        My Missions
        </a>

        <a href="index.php?page=murid/profilMurid&active=profil&aktif=true" 
        class="<?= ($active == 'profil') ? 'aktif' : '' ?>">
        My Profil
        </a>

        <a href="index.php?page=murid/leaderboard_murid&active=leaderboard&aktif=true" 
        class="<?= ($active == 'leaderboard') ? 'aktif' : '' ?>">
        Leaderboard
        </a>

    </div>

    <div class="user-info">
        Logged in as:<br>
        <b>Dian Anggraini (Student)</b>
    </div>
</div>