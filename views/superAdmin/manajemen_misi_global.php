<link rel="stylesheet" href="./views/css/navigasiAtas.css">
<link rel="stylesheet" href="./views/css/misi_global.css">

<div class="container">
    <div class="content">
        <div class="header-action">
            <h2>Manajemen Misi Global</h2>
            <a href="index.php?page=tambah_misi_global" class="btn-tambah">+ Tambah Misi</a>
        </div>

        <div class="table-responsive">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul & Deskripsi</th>
                        <th>Target</th>
                        <th>Deadline</th>
                        <th>Progres</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (empty($daftar_misi_global)): ?>
                    <tr>
                        <td colspan="7" class="text-center">Belum ada misi global</td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($daftar_misi_global as $m): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <b><?= htmlspecialchars($m['judul']) ?></b><br>
                            <small><?= htmlspecialchars($m['deskripsi']) ?></small>
                        </td>
                        <td><?= $m['target_jumlah_kata'] ?> kata</td>
                        <td>
                            <?= $m['tanggal_akhir'] ?>
                            <?php 
                            $today = date('Y-m-d');
                            if ($m['tanggal_akhir'] < $today) {
                                echo '<span class="badge badge-late">Lewat Deadline</span>';
                            } elseif (strtotime($m['tanggal_akhir']) - strtotime($today) <= 3*24*60*60) {
                                echo '<span class="badge badge-soon">Dekat Deadline</span>';
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            $progres = isset($m['progres']) ? $m['progres'] : 0; 
                            ?>
                            <div class="progress-bar">
                                <div class="progress" style="width: <?= $progres ?>%;"></div>
                            </div>
                            <small><?= $progres ?>%</small>
                        </td>
                        <td>
                            <?= $progres == 100 ? '<span class="badge badge-complete">Selesai</span>' : '<span class="badge badge-pending">Berjalan</span>' ?>
                        </td>
                        <td class="action-buttons">
                            <a href="index.php?page=edit_misi_global&id=<?= $m['id_misi'] ?>" class="btn-edit">Edit</a>
                            <a href="index.php?page=hapus_misi_global&id=<?= $m['id_misi'] ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus misi ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
