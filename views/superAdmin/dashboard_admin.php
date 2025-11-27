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
                <?php $no=1; while ($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['id_user'] ?></td>
                    <td><?= $row['id_sekolah'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['role'] ?></td>
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
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>