<?php
// ----------- HANDLE TAMBAH ------------
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_sekolah'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "INSERT INTO sekolah (nama_sekolah, alamat) 
                            VALUES ('$nama', '$alamat')");
    header("Location: index.php?page=institusi/sekolah");
    exit;
}

// ----------- HANDLE EDIT ------------
if (isset($_POST['edit'])) {
    $id = $_POST['id_sekolah'];
    $nama = $_POST['nama_sekolah'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi,
        "UPDATE sekolah 
         SET nama_sekolah='$nama', alamat='$alamat' 
         WHERE id_sekolah='$id'"
    );

    header("Location: index.php?page=institusi/sekolah");
    exit;
}

// ----------- HANDLE HAPUS ------------
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM sekolah WHERE id_sekolah='$id'");
    header("Location: index.php?page=institusi/sekolah");
    exit;
}

// ----------- AMBIL DATA ----------- 
$q = mysqli_query($koneksi, "SELECT * FROM sekolah ORDER BY id_sekolah DESC");
$sekolah = [];
while ($row = mysqli_fetch_assoc($q)) {
    $sekolah[] = $row;
}
?>

<div style="margin-left:260px; padding:20px;">

    <h2>Manajemen Sekolah</h2>

    <!-- ========== FORM TAMBAH / EDIT DALAM SATU TEMPAT ========== -->
    <div style="margin-bottom:20px; padding:15px; border:1px solid #ccc;">

        <?php if (isset($_GET['edit'])): 
            $id = $_GET['edit'];
            $data = mysqli_fetch_assoc(mysqli_query($koneksi, 
                     "SELECT * FROM sekolah WHERE id_sekolah='$id'"));
        ?>
        
        <!-- ================= FORM EDIT ================= -->
        <h3>Edit Sekolah</h3>
        <form method="POST">
            <input type="hidden" name="id_sekolah" value="<?= $data['id_sekolah'] ?>">

            Nama Sekolah:<br>
            <input type="text" name="nama_sekolah" value="<?= $data['nama_sekolah'] ?>"><br><br>

            Alamat:<br>
            <textarea name="alamat"><?= $data['alamat'] ?></textarea><br><br>

            <button type="submit" name="edit">Update</button>
            <a href="index.php?page=institusi/sekolah">Batal</a>
        </form>

        <?php else: ?>

        <!-- ================= FORM TAMBAH ================= -->
        <h3>Tambah Sekolah</h3>
        <form method="POST">
            Nama Sekolah:<br>
            <input type="text" name="nama_sekolah"><br><br>

            Alamat:<br>
            <textarea name="alamat"></textarea><br><br>

            <button type="submit" name="tambah">Simpan</button>
        </form>

        <?php endif; ?>

    </div>

    <!-- ========== TABEL DATA SEKOLAH ========== -->
    <table border="1" cellpadding="10" cellspacing="0">
        <tr style="background:#003366; color:white;">
            <th>ID</th>
            <th>Nama Sekolah</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php if (empty($sekolah)): ?>
            <tr><td colspan="4" style="text-align:center;">Belum ada data sekolah</td></tr>

        <?php else: ?>
            <?php foreach ($sekolah as $s): ?>
            <tr>
                <td><?= $s['id_sekolah'] ?></td>
                <td><?= $s['nama_sekolah'] ?></td>
                <td><?= $s['alamat'] ?></td>
                <td>
                    <a href="index.php?page=institusi/sekolah&edit=<?= $s['id_sekolah'] ?>">Edit</a> |
                    <a href="index.php?page=institusi/sekolah&hapus=<?= $s['id_sekolah'] ?>" 
                       onclick="return confirm('Hapus sekolah?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>

</div>
