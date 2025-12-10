<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Leaderboard</title>
    <link rel="stylesheet" href="./views/css/guru.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
    
    <div class="container">
        <div class="content">
            <div class="header">
                <div class="header-text">
                    <h2>Leaderboard Siswa</h2>
                </div>
            </div>
            
            <div class="leaderboard-section" style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                
                <div class="leaderboard-controls" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; margin-bottom: 20px;">
                    
                    <div class="leaderboard-type-filters" style="background: #f1f2f6; padding: 5px; border-radius: 25px;">
                        <a href="index.php?page=guru/leaderboard_guru&active=leaderboard&aktif=true&scope=global&time=<?= $time ?>&search=<?= $search ?>" 
                            class="filter-link <?= $scope == 'global' ? 'active' : '' ?>">
                            Global
                        </a>
                        <a href="index.php?page=guru/leaderboard_guru&active=leaderboard&aktif=true&scope=school&time=<?= $time ?>&search=<?= $search ?>" 
                           class="filter-link <?= $scope == 'school' ? 'active' : '' ?>">
                           Sekolah Saya
                        </a>
                    </div>
                    
                    <div class="time-filters">
                        <a href="index.php?page=guru/leaderboard_guru&active=leaderboard&aktif=true&scope=<?= $scope ?>&time=all&search=<?= $search ?>" 
                            class="filter-link <?= $time == 'all' ? 'active' : '' ?>">All time</a>
                        
                        <a href="index.php?page=guru/leaderboard_guru&active=leaderboard&aktif=true&scope=<?= $scope ?>&time=month&search=<?= $search ?>" 
                            class="filter-link <?= $time == 'month' ? 'active' : '' ?>">This Month</a>
                        
                        <a href="index.php?page=guru/leaderboard_guru&active=leaderboard&aktif=true&scope=<?= $scope ?>&time=week&search=<?= $search ?>" 
                            class="filter-link <?= $time == 'week' ? 'active' : '' ?>">This Week</a>
                    </div>

                    <div class="search-area">
                        <form action="index.php" method="GET" style="display: flex; gap: 5px;">
                            <input type="hidden" name="page" value="guru/leaderboard_guru">
                            <input type="hidden" name="active" value="leaderboard">
                            <input type="hidden" name="aktif" value="true">
                            <input type="hidden" name="scope" value="<?= $scope ?>">
                            <input type="hidden" name="time" value="<?= $time ?>">
                            
                            <input type="text" name="search" placeholder="Cari nama siswa..." value="<?= htmlspecialchars($search) ?>" 
                                   style="padding: 8px 15px; border-radius: 20px; border: 1px solid #dfe6e9; outline: none;">
                            <button type="submit" class="btn-action btn-primary" style="padding: 8px 15px; border-radius: 20px;">🔍</button>
                        </form>
                    </div>
                </div>

                <div class="table-container">
                    <table class="leaderboard-table" style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="text-align: left; color: #b2bec3; font-size: 12px; text-transform: uppercase;">
                                <th style="padding: 15px;">Rank</th>
                                <th style="padding: 15px;">Siswa</th>
                                <th style="padding: 15px;">Asal Sekolah</th>
                                <th style="padding: 15px;">Total Poin XP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (mysqli_num_rows($leaderboard_data) > 0): 
                                $rank = 1;
                                $found_data = false;

                                while ($row = mysqli_fetch_assoc($leaderboard_data)): 
                                    if (!empty($search) && stripos($row['nama_lengkap'], $search) === false) {
                                        $rank++; 
                                        continue; 
                                    }
                                    
                                    $found_data = true;
                                    $row_class = "";
                                    if ($rank == 1) $row_class = "background: #fffdf0;"; 
                                    elseif ($rank == 2) $row_class = "background: #f7f9fa;"; 
                                    elseif ($rank == 3) $row_class = "background: #fff5eb;"; 
                            ?>
                                    <tr style="border-bottom: 1px solid #f1f2f6; <?= $row_class ?>">
                                        <td style="padding: 15px;">
                                            <?php if ($rank == 1): ?>
                                                <span class="rank-badge gold">1</span> 👑
                                            <?php elseif ($rank == 2): ?>
                                                <span class="rank-badge silver">2</span>
                                            <?php elseif ($rank == 3): ?>
                                                <span class="rank-badge bronze">3</span>
                                            <?php else: ?>
                                                <span class="default-rank"><?= $rank ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="padding: 15px;">
                                            <div style="font-weight: bold; color: #2d3436; font-size: 15px;">
                                                <?= htmlspecialchars($row['nama_lengkap']) ?>
                                            </div>
                                        </td>
                                        <td style="padding: 15px; color: #636e72;">
                                            <?= htmlspecialchars($row['nama_sekolah'] ?? 'Tanpa Sekolah') ?>
                                        </td>
                                        <td style="padding: 15px;">
                                            <div style="font-weight: bold; color: #6c5ce7; display: flex; align-items: center; gap: 5px;">
                                                <i class="fas fa-bolt" style="color: #f1c40f;"></i> 
                                                <?= number_format($row['total_poin']) ?> XP
                                            </div>
                                        </td>
                                    </tr>
                            <?php 
                                    $rank++;
                                endwhile; 
                                
                                if (!$found_data):
                            ?>
                                <tr>
                                    <td colspan="4" style="text-align: center; padding: 40px; color: #b2bec3;">
                                        Tidak ditemukan siswa dengan nama "<b><?= htmlspecialchars($search) ?></b>".
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php else: ?>
                                <tr>
                                    <td colspan="4" style="text-align: center; padding: 40px; color: #b2bec3;">
                                        <div style="font-size: 40px; margin-bottom: 10px;">🏆</div>
                                        Belum ada data aktivitas siswa.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <p style="margin-top: 20px; font-size: 13px; color: #999; text-align: center; background: #f9f9f9; padding: 10px; border-radius: 8px;">
                    <strong>Aturan Poin:</strong> 
                    1 Catatan = 10 XP | 
                    1 Misi Selesai = 5 XP | 
                    1 Kosakata = 2 XP
                </p>

            </div>
        </div>
    </div>
    
</body>
</html>