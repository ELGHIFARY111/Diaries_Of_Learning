<link rel="stylesheet" href="./views/css/datamaster.css"> 

<div class="container">
    <h2>Akun User</h2>
    <div class="header-container">
        </div>
    <div class="container-user">
        <table border="0" cellpadding="8" cellspacing="0"> <thead>
                <tr>
                    <th>No</th>
                    <th>ID User</th>
                    <th>ID Sekolah</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data_sekolah)): ?>
                    <tr><td colspan="4" style="text-align:center;">Belum ada data sekolah</td></tr>
                <?php else: ?>
                    <?php foreach ($data_user as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['id_user'] ?></td>
                            <td><?= $row['id_sekolah'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td>
                                <?php
                                if($row['role']==1){
                                    echo 'admin';
                                }elseif($row['role']==2){
                                    echo 'guru';
                                }else{
                                    echo 'user';
                                }
                                ?>
                            </td>
                            <td><?= $row['email'] ?></td>
                            <td class="form_action">
                                <form class="detail" action="detail_transaksi.php" method="get" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $row['id_user'] ?>">
                                    <button class="edit" type="submit">Detail</button>
                                </form>
                                <form action="hapus.php" method="get" onsubmit="return confirm('Hapus?')" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $row['id_user'] ?>">
                                    <button class="hapus" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>