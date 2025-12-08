<link rel="stylesheet" href="./views/css/navigasi_guru.css">
<div class="sidebar">
      <div class="logo">Diary of Learning</div>
      <div class="menu">
         <a href="index.php?page=guru&active=dashboard&aktif=true" 
            class="<?= ($active == 'dashboard') ? 'aktif' : '' ?>">
            Dashboard
         </a>

         <a href="index.php?page=guru/monitoring&active=siswa&aktif=true" 
            class="<?= ($active == 'siswa') ? 'aktif' : '' ?>">
            School
         </a>

         <a href="index.php?page=guru/misi_kosakata&active=misi&aktif=true" 
            class="<?= ($active == 'misi') ? 'aktif' : '' ?>">
            School Vocabulary Missions
         </a>

         <a href="index.php?page=guru/review_catatan&active=review&aktif=true" 
            class="<?= ($active == 'review') ? 'aktif' : '' ?>">
            Review Student Notes
         </a>

         <a href="index.php?page=guru/laporan_progres&active=laporan&aktif=true" 
            class="<?= ($active == 'laporan') ? 'aktif' : '' ?>">
            Progress Report
         </a>

         <a href="index.php?page=guru/profil&active=profil&aktif=true" 
            class="<?= ($active == 'profil') ? 'aktif' : '' ?>">
            Teacher Profile
         </a>
         <a href="index.php?page=guru/leaderboard_guru&active=leaderboard&aktif=true" 
            class="<?= ($active == 'leaderboard') ? 'aktif' : '' ?>">
            Leaderboard
         </a>

         <a href="index.php?page=logout">Logout</a>
      </div>

      <div class="user-info">
         Logged in as:<br>
         <b>Mr. Arik</b>
         <br>Bintang Timur High School
      </div>
</div>