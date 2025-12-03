<link rel="stylesheet" href="./views/css/pengaturan.css">

<div class="content">
    <h2 class="section-title">Konfigurasi Aplikasi</h2>

    <div class="panel">
        <h3>Pengaturan Umum</h3>

        <label>Nama Aplikasi</label>
        <input type="text" placeholder="Diary Of Learning">

        <label>Theme Warna</label>
        <select>
            <option>Biru (Default)</option>
            <option>Hijau</option>
            <option>Merah</option>
            <option>Dark Mode</option>
        </select>

        <label>Mode Maintenance</label>
        <select>
            <option>Nonaktif</option>
            <option>Aktif</option>
        </select>

        <button class="save-btn">Simpan Konfigurasi</button>
    </div>

    <div class="panel">
        <h3>Informasi Server</h3>

        <label>Versi Aplikasi</label>
        <input type="text" value="v1.0" readonly>

        <label>Database Host</label>
        <input type="text" value="localhost" readonly>

        <label>PHP Version</label>
        <input type="text" value="8.2.x" readonly>
    </div>
</div>
