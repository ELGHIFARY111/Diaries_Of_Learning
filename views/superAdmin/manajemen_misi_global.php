<link rel="stylesheet" href="./views/css/navigasiAtas.css">
<link rel="stylesheet" href="./views/css/misi_global.css">

<div class="container">
    <div class="content">
    <div class="header-action">
        <h2>Manajemen Misi Global</h2>
        <a href="index.php?page=tambah_misi_global" class="btn-tambah">+ Tambah Misi</a>
    </div>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr class="thead">
            <th>No</th>
            <th>Judul & Deskripsi</th>
            <th>Target</th>
            <th>Deadline</th>
            <th>Aksi</th>
        </tr>

        <?php if (empty($daftar_misi_global)): ?>
            <tr><td colspan="5" style="text-align:center;">Belum ada misi global</td></tr>
        <?php else: ?>
            <?php $no = 1; foreach ($daftar_misi_global as $m): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>
                    <b><?= htmlspecialchars($m['judul']) ?></b><br>
                    <small><?= htmlspecialchars($m['deskripsi']) ?></small>
                </td>
                <td><?= $m['target_jumlah_kata'] ?> kata</td>
                <td><?= $m['tanggal_akhir'] ?></td>
                <td>
                <a href="index.php?page=edit_misi_global&id=<?= $m['id_misi'] ?>">Edit</a>
                <a href="index.php?page=hapus_misi_global&id=<?= $m['id_misi'] ?>">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>
    </div>
</div>
