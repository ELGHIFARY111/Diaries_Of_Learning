<?php
// Pastikan data sekolah valid
if (!isset($data_sekolah) || !is_array($data_sekolah)) {
    echo "<div class='container'><h3>Data sekolah tidak ditemukan!</h3>
          <a href='index.php?page=institusi/sekolah' class='edit'>Kembali</a></div>";
    return;
}

// Pastikan data guru valid
if (!isset($data_guru) || !is_array($data_guru)) {
    $data_guru = [];
}
?>

<link rel="stylesheet" href="./views/css/datamaster.css">

<div class="container" style="max-width:700px; margin:auto; margin-top:25px;">
    <h2>Edit Data Sekolah</h2>
    <p>Perbarui informasi sekolah di bawah ini.</p>

    <div class="form-container" style="
        background:white; 
        padding:20px; 
        border-radius:10px;
        box-shadow:0 3px 10px rgba(0,0,0,0.1);
        margin-top:20px;
    ">

        <form action="index.php?page=institusi/sekolah/proses_edit" method="POST">

            <input type="hidden" name="id_sekolah" 
                   value="<?= htmlspecialchars($data_sekolah['id_sekolah']) ?>">

            <label>Nama Sekolah</label>
            <input type="text" name="nama_sekolah" 
                   value="<?= htmlspecialchars($data_sekolah['nama_sekolah']) ?>" required>

            <label>Alamat</label>
            <input type="text" name="alamat" 
                   value="<?= htmlspecialchars($data_sekolah['alamat']) ?>" required>

            <label>Guru Penanggung Jawab</label>
            <select name="id_guru" required>
                <option value="">-- Pilih Guru --</option>
                <?php foreach ($data_guru as $g): ?>
                    <option value="<?= $g['id_user'] ?>"
                        <?= $g['id_user'] == $data_sekolah['id_guru'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($g['nama_lengkap']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Kode Sekolah</label>
            <input type="text" name="kode_sekolah" 
                   value="<?= htmlspecialchars($data_sekolah['kode_sekolah']) ?>" required>

            <button type="submit" class="edit" style="margin-top:15px;">Simpan Perubahan</button>
            <a href="index.php?page=institusi/sekolah" class="hapus" style="margin-left:10px;">Batal</a>
        </form>

    </div>
</div>
