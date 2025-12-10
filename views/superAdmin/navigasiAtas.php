<link rel="stylesheet" href="./views/css/guru.css">
<link rel="stylesheet" href="./views/css/navigasi_murid.css">

<div class="sidebar">
    <div class="menu">
    <div class="logo">Diary of Learning</div>
    <ul class="menu">
        <a href="index.php?page=dashboard">Dashboard</a>
            <div class="dropdown-container">
                <a href="index.php?page=institusi/sekolah"> Database Sekolah</a>
                <a href="index.php?page=institusi/user">Database User</a>
            </div>
            <a href="index.php?page=profil">profil</a>
            <a href="index.php?page=manajemen_misi_global">Misi global</a>
    </div>
    <div class="user-info">
        Logged in as:<br>
        <b><?= $_SESSION['user_nama'] ?></b>
    </div>
</div>