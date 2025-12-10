<link rel="stylesheet" href="./views/css/navigasiAtas.css">
<link rel="stylesheet" href="./views/css/misi_global.css">

<div class="container">
        <div class="content">
    <h2>Edit Misi Global</h2>

    <form method="POST">

        Judul: <br>
        <input type="text" name="judul" value="<?= $data['judul'] ?>" required><br><br>

        Deskripsi: <br>
        <textarea name="deskripsi" required><?= $data['deskripsi'] ?></textarea><br><br>

        Target Jumlah Kata: <br>
        <input type="number" name="target" value="<?= $data['target_jumlah_kata'] ?>" required><br><br>

        Tanggal Mulai: <br>
        <input type="date" name="mulai" value="<?= $data['tanggal_mulai'] ?>" required><br><br>

        Tanggal Akhir: <br>
        <input type="date" name="akhir" value="<?= $data['tanggal_akhir'] ?>" required><br><br>

        <button type="submit">Update</button>
    </form>
        </div>
</div>
