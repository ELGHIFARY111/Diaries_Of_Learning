<link rel="stylesheet" href="./views/css/novigasi_guru.css">
<div class="sidebar">
      <div class="logo">📘 Diary of Learning</div>
      <div class="menu">
         <a href="index.php?page=guru&active=dashboard&aktif=true" 
            class="<?= ($active == 'dashboard') ? 'aktif' : '' ?>">
            🏠 Dashboard
         </a>

         <a href="index.php?page=guru/monitoring&active=siswa&aktif=true" 
            class="<?= ($active == 'siswa') ? 'aktif' : '' ?>">
            🧑‍🎓 Daftar Siswa
         </a>

         <a href="index.php?page=guru/misi_kosakata&active=misi&aktif=true" 
            class="<?= ($active == 'misi') ? 'aktif' : '' ?>">
            🎯 Misi Kosa Kata Sekolah
         </a>

         <a href="index.php?page=guru/review_catatan&active=review&aktif=true" 
            class="<?= ($active == 'review') ? 'aktif' : '' ?>">
            📝 Review Catatan Siswa
         </a>

         <a href="index.php?page=guru/laporan_progres&active=laporan&aktif=true" 
            class="<?= ($active == 'laporan') ? 'aktif' : '' ?>">
            📊 Laporan Progres
         </a>

         <a href="index.php?page=guru/profil&active=profil&aktif=true" 
            class="<?= ($active == 'profil') ? 'aktif' : '' ?>">
            👤 Profil Guru
         </a>

         <a href="index.php?page=logout">🚪 Logout</a>
      </div>

      <div class="user-info">
         Login sebagai:<br>
         <b>Bapak Andi (Guru)</b>
         <br>SMA Bintang Timur
      </div>
</div>