<link rel="stylesheet" href="./views/css/datamaster.css"> 
<div class="container">
    <h2>Manajemen Sekolah</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr style="background:#003366; color:white;">
            <th>ID</th>
            <th>Nama Sekolah</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php if (empty($data_sekolah)): ?>
            <tr><td colspan="4" style="text-align:center;">Belum ada data sekolah</td></tr>

        <?php else: ?>
            <?php foreach ($data_sekolah as $s): ?>
            <tr>
                <td><?= $s['id_sekolah'] ?></td>
                <td><?= $s['nama_sekolah'] ?></td>
                <td><?= $s['alamat'] ?></td>
                <td>
                    <a class="edit" href="index.php?page=institusi/sekolah&edit=<?= $s['id_sekolah'] ?>">Edit</a> |
                    <a class='hapus' href="index.php?page=institusi/sekolah&hapus=<?= $s['id_sekolah'] ?>" 
                            onclick="return confirm('Hapus sekolah?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>
</div>