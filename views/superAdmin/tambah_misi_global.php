<link rel="stylesheet" href="./views/css/navigasiAtas.css">
<link rel="stylesheet" href="./views/css/misi_global.css">



<div class="container">
    <div class="content">
    <h2>Tambah Misi Global</h2>

    <form method="POST">
        Judul: <br>
        <input type="text" name="judul" required><br><br>

        Deskripsi: <br>
        <textarea name="deskripsi" required></textarea><br><br>

        Target Jumlah Kata: <br>
        <input type="number" name="target" required><br><br>

        Tanggal Mulai: <br>
        <input type="date" name="mulai" required><br><br>

        Tanggal Akhir: <br>
        <input type="date" name="akhir" required><br><br>

        <button type="submit">Simpan</button>
    </form>
    </div>
</div>
