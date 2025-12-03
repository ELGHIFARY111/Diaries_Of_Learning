<div class="sidebar">
      <div class="logo">📘 Diary of Learning</div>
      <div class="menu">
         <a href="index.php?page=guru" 
            class="<?= ($active == 'dashboard') ? 'aktif' : '' ?>">
            🏠 Dashboard
         </a>

         <a href="index.php?page=guru/laporan_progres" 
            class="<?= ($active == 'siswa') ? 'aktif' : '' ?>">
            🧑‍🎓 Daftar Siswa
         </a>

         <a href="index.php?page=guru/misi_kosakata" 
            class="<?= ($active == 'misi') ? 'aktif' : '' ?>">
            🎯 Misi Kosa Kata Sekolah
         </a>

         <a href="index.php?page=guru/monitoring" 
            class="<?= ($active == 'review') ? 'aktif' : '' ?>">
            📝 Review Catatan Siswa
         </a>

         <a href="index.php?page=guru/profil" 
            class="<?= ($active == 'laporan') ? 'aktif' : '' ?>">
            📊 Laporan Progres
         </a>

         <a href="index.php?page=guru/review_catatan" 
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