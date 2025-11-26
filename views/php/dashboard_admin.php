
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./views/css/dashboard_admin.css">
</head>
<body>
    <div class="container">
        <h2>akun user</h2>
        <div class="header-container">
            <!-- <div class="button-group">
                <a href="report_transaksi.php" class="btn-laporan">Lihat Laporan Penjualan</a>
                <a href="form_transaksi.php" class="btn-tambah">Tambah Transaksi</a>
            </div> -->
        </div>
        <div class="container-user">
            <table border="1" cellpadding="8" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>ID User</th>
                    <th>ID Sekolah</th>
                    <th>username</th>
                    <th>password hash</th>
                    <th>Nama Lengkap</th>
                    <th>Role</th>
                    <th>email</th>
                    <th>Tindakan</th>
                </tr>
                <?php $no=1; while ($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <?php
                        echo "<td>$no</td>";
                        $no+=1;
                    ?>
                    <td><?= $row['id_user'] ?></td>
                    <td><?= $row['id_sekolah'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['password_hash'] ?></td>
                    <td><?= $row['nama_lengkap'] ?></td>
                    <td><?= $row['role'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td class="form_action">
                        <form class="detail" action="detail_transaksi.php" method="get">
                            <input type="hidden" name="id" value="<?= $row['id_user'] ?>">
                            <button class="btn-detail" type="submit">Lihat Detail</button>
                        </form>
                        <form action="hapus.php" method="get" onsubmit="return confirm('Anda yakin akan menghapus transaksi ini?')">
                            <input type="hidden" name="id" value="<?= $row['id_user'] ?>">
                            <button class="btn-hapus" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
