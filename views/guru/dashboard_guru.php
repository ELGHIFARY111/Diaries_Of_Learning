<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="./views/css/guru.css">
</head>

<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <h2>Welcome, <?= htmlspecialchars($nama_guru) ?>! </h2>
                <p>Institution Supervision Dashboard: <b><?= htmlspecialchars($nama_sekolah) ?></b>. Monitor your students' learning activities.</p>
            </div>

            <div class="stats-box">
                <div class="card">
                    <p>Total Students Supervised</p>
                    <h3><?= $total_siswa ?></h3>
                </div>
                <div class="card">
                    <p>Notes Awaiting Review</p>
                    <h3><?= $total_pending ?></h3>
                </div>
                <div class="card">
                    <p>Active School Missions</p>
                    <h3><?= $total_misi ?></h3>
                </div>
            </div>

            <h3 style="margin-bottom: 15px; font-size: 1.5em; color: #2c3e50;">Supervisor Quick Actions</h3>
            <div class="action-area">
                <a href="index.php?page=guru/misi_kosakata" class="btn-action btn-success"> Create New Institution Mission</a>
                <a href="index.php?page=guru/review_catatan" class="btn-action btn-primary"> Review Incoming Notes (<?= $total_pending ?>)</a>
            </div>

            <div class="bottom-section">

                <div class="box">
                    <h3>Latest Student Progress</h3>
                    <?php 
                    if (mysqli_num_rows($list_progres) > 0) {
                        while ($row = mysqli_fetch_assoc($list_progres)) { 
                    ?>
                        <div class="list-item">
                            <b><?= htmlspecialchars($row['nama_lengkap']) ?></b>
                            <p>Activity: <?= ucfirst($row['jenis_progres']) ?> | Score: <?= $row['nilai'] ?>%</p>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: <?= $row['nilai'] ?>%;"></div>
                            </div>
                        </div>
                    <?php 
                        }
                    } else {
                        echo "<p style='color:#aaa; padding:10px;'>No progress updates yet.</p>";
                    }
                    ?>
                </div>

                <div class="box">
                    <h3> Latest Daily Notes</h3>
                    <?php 
                    if (mysqli_num_rows($list_catatan) > 0) {
                        while ($note = mysqli_fetch_assoc($list_catatan)) {
                            $is_pending = ($note['status_review'] == 'pending');
                            $color = $is_pending ? '#e67e22' : '#27ae60';
                            $status_text = $is_pending ? 'Awaiting Review' : 'Review Complete';
                    ?>
                        <div class="list-item">
                            <b><?= htmlspecialchars($note['nama_lengkap']) ?></b>
                            <span style="color: <?= $color ?>;">'<?= htmlspecialchars($note['judul']) ?>'</span>
                            <p style="margin-top: 5px; color: #aaa;">
                                <?= $note['tanggal_catatan'] ?> (<?= $status_text ?>)
                            </p>
                        </div>
                    <?php 
                        }
                    } else {
                        echo "<p style='color:#aaa; padding:10px;'>No daily notes found.</p>";
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>

</body>
</html>