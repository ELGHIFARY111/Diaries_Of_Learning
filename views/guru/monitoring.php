
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary of Learning</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/guru.css">
    
</head>

<body>

    <div class="container">
        <div class="content">
            <div class="stats-box">
                <?php if ($id_sekolah == 0 || empty($nama_sekolah) || $nama_sekolah == 'Belum ada sekolah'): ?>
                    <div class="card school-card empty-state">
                        <!-- <div class="card-icon">🏫</div> -->
                        <h3>Belum Ada Sekolah</h3>
                        <p>Anda belum terhubung dengan sekolah manapun.</p>
                        <div class="mt-15">
                            <a href="index.php?page=guru/tambah_sekolah&active=siswa&aktif=true" class="btn-action btn-success">
                                + Buat Sekolah Baru
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="card school-card active-state">
                        <div class="card-header-flex">
                            <div>
                                <p>Sekolah Anda</p>
                                <h3><?= $nama_sekolah ?></h3>
                                <p class="school-id">Status: Terverifikasi</p>
                            </div>
                            <div class="school-icon-bg">🎓</div>
                        </div>
                        <div class="mt-15">
                            <a href="index.php?page=guru/detail_sekolah&active=siswa&aktif=true" class="btn-action btn-primary">
                                Lihat Detail Sekolah
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <p>Total Siswa</p>
                    <h3><?= $total_siswa ?></h3>
                </div>
                <div class="card">
                    <p>Catatan Pending</p>
                    <h3><?= $total_pending ?></h3>
                </div>
            </div>
            <div class="header">
                <h2>Student List of Bintang Timur High School</h2>
                <p>A summary of the progress and account details of the students you supervise.</p>
            </div>
            
            <div class="search-area">
                <form action="index.php" method="GET" style="display: flex; gap: 10px; width: 100%;">
                    
                    <input type="hidden" name="page" value="guru/monitoring">
                    <input type="hidden" name="active" value="siswa">

                    <input type="text" name="cari" 
                        placeholder="Cari Nama Siswa atau Email..." 
                        value="<?= isset($keyword) ? htmlspecialchars($keyword) : '' ?>"
                        style="flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    
                    <button type="submit" class="btn-action btn-primary" style="padding: 0 20px;">
                        🔍 Cari
                    </button>
                    
                    <?php if(!empty($keyword)): ?>
                        <a href="index.php?page=guru/monitoring&active=siswa&aktif=true" class="btn-action" style="background:#ddd; color:#333; text-decoration:none; display:flex; align-items:center;">
                            Reset
                        </a>
                    <?php endif; ?>

                </form>
            </div>

            <div class="data-table-wrapper">
                <div class="data-table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Full Name</th>
                                <th>Email</th> <th>Join Date</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if ($id_sekolah != 0 && mysqli_num_rows($daftar_siswa) > 0):
                                while ($siswa = mysqli_fetch_assoc($daftar_siswa)):
                                    $no=1;
                            ?>
                                <tr>
                                    <td>
                                        <span style="font-weight:bold; color:#6c5ce7;"><?=$no?></span>
                                    </td>
                                    <td>
                                        <div style="display:flex; align-items:center; gap:10px;">
                                            <div style="width:30px; height:30px; background:#eee; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:bold;">
                                                <?= strtoupper(substr($siswa['nama_lengkap'], 0, 1)) ?>
                                            </div>
                                            <?= htmlspecialchars($siswa['nama_lengkap']) ?>
                                        </div>
                                    </td>
                                    <td>
                                    <?= htmlspecialchars($siswa['email']) ?>
                                    </td>
                                    <td>
                                    <?= date('d M Y', strtotime($siswa['created_at'] ?? 'now')) ?>
                                    </td>
                                    <td>
                                        <a href="index.php?page=guru/detail_siswa&id=<?= $siswa['id_user'] ?>&active=siswa" class="btn-action btn-primary" style="text-decoration:none; font-size:12px; padding: 5px 10px;">
                                            Lihat Profil
                                        </a>
                                    </td>
                                </tr>

                            <?php endwhile; ?>

                            <?php else: ?>
                                
                                <tr>
                                    <td colspan="5" style="text-align:center; padding: 40px; color: #888;">
                                        <div style="font-size: 3em; margin-bottom: 10px;">📭</div>
                                        <p>Belum ada siswa yang terdaftar di sekolah ini.</p>
                                        <small>Minta siswa untuk mendaftar menggunakan Kode Sekolah: <b><?= $kode_sekolah ?></b></small>
                                    </td>
                                </tr>

                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>

                <p class="table-footer-info">
                    Showing <?= isset($daftar_siswa) ? mysqli_num_rows($daftar_siswa) : 0 ?> student(s).
                </p>

        </div>

    </div>

</body>

</html>