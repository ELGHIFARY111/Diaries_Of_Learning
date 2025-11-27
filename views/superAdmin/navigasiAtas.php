<link rel="stylesheet" href="./views/css/navigasiAtas.css">

<div class="sidebar">

    <div class="brand">Diary of Learning</div>
    <div class="username_admin">Superadmin</div>

    <ul>

        <!-- Dashboard -->
        <li>
            <a href="index.php?page=dashboard">Dashboard</a>


        </li>

        <!-- Manajemen Institusi -->
        <li>
            <a class="dropdown-btn">Manajemen Institusi</a>
            <div class="dropdown-container">
                <a href="index.php?page=institusi/sekolah">Sekolah</a>
                <a href="index.php?page=institusi/guru">Guru</a>
                <a href="index.php?page=institusi/siswa">Siswa</a>
            </div>
        </li>

        <!-- Misi Global -->
        <li>
            <a class="dropdown-btn">Misi Global</a>
            <div class="dropdown-container">
                <a href="index.php?page=misi/daftar">Daftar Misi Global</a>
                <a href="index.php?page=misi/tambah">Tambah Misi</a>
                <a href="index.php?page=misi/kosakata">Kelola Kosakata Misi</a>
            </div>
        </li>

        <!-- Monitoring & Analitik -->
        <li>
            <a class="dropdown-btn">Monitoring</a>
            <div class="dropdown-container">
                <a href="index.php?page=monitoring/catatan">monitoring Catatan</a>
                <a href="index.php?page=monitoring/progres">monitoring Progres</a>
                <a href="index.php?page=monitoring/sekolah">monitoring per Sekolah</a>
            </div>
        </li>

        <!-- Pengaturan Sistem -->
        <li>
            <a class="dropdown-btn">Pengaturan Sistem</a>
            <div class="dropdown-container">
                <a href="index.php?page=pengaturan/profi">Profil Superadmin</a>
                <a href="index.php?page=pengaturan/log">Log Aktivitas</a>
                <a href="index.php?page=pengaturan/konfigurasi">Konfigurasi Aplikasi</a>
            </div>
        </li>

        <!-- Bantuan -->
        <li>
            <a href="index.php?page=bantuan">Bantuan</a>
        </li>

    </ul>

</div>

