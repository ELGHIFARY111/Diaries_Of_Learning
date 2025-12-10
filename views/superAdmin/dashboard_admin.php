<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="./views/css/guru.css">
</head>
<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <h2>System Overview</h2>
                <p>Panel kontrol utama Diary of Learning.</p>
            </div>

            <div class="stats-box">
                <div class="card" style="border-left: 5px solid #6c5ce7;">
                    <p>Total User</p>
                    <h3>1,250</h3>
                </div>
                <div class="card" style="border-left: 5px solid #00b894;">
                    <p>Total Catatan</p>
                    <h3>5,430</h3>
                </div>
                <div class="card" style="border-left: 5px solid #fdcb6e;">
                    <p>Active Events</p>
                    <h3>2</h3>
                </div>
            </div>

            <div class="layout-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-top: 20px;">
                
                <div class="box">
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <h3>🏆 Event Global Sedang Berjalan</h3>
                        <a href="index.php?page=admin/tambah_event" style="font-size:12px; text-decoration:none; color:#0984e3;">+ Buat Baru</a>
                    </div>
                    
                    <div class="list-item" style="border-left: 3px solid #f1c40f;">
                        <b>National English Week Challenge</b>
                        <span style="float:right; color:#d35400; font-weight:bold;">+500 XP</span>
                        <p style="font-size:12px; color:#aaa;">
                            Target: 100 kata • Berakhir: 25 Dec
                        </p>
                    </div>

                    <div class="list-item" style="border-left: 3px solid #f1c40f;">
                        <b>Weekend Writing</b>
                        <span style="float:right; color:#d35400; font-weight:bold;">+100 XP</span>
                        <p style="font-size:12px; color:#aaa;">
                            Target: 50 kata • Berakhir: 12 Dec
                        </p>
                    </div>
                </div>

                <div class="box">
                    <h3>👥 Registrasi Terbaru</h3>
                    
                    <div class="list-item">
                        <b>Budi Santoso</b>
                        <br>
                        <span style="font-size:11px; background:#dfe6e9; padding:2px 5px; border-radius:4px;">
                            Guru
                        </span>
                        <span style="font-size:11px; color:#aaa; float:right;">
                            10 Dec
                        </span>
                    </div>

                    <div class="list-item">
                        <b>Siti Aminah</b>
                        <br>
                        <span style="font-size:11px; background:#dfe6e9; padding:2px 5px; border-radius:4px;">
                            Siswa
                        </span>
                        <span style="font-size:11px; color:#aaa; float:right;">
                            09 Dec
                        </span>
                    </div>

                    <div class="list-item">
                        <b>Rizky Ramadhan</b>
                        <br>
                        <span style="font-size:11px; background:#dfe6e9; padding:2px 5px; border-radius:4px;">
                            Siswa
                        </span>
                        <span style="font-size:11px; color:#aaa; float:right;">
                            08 Dec
                        </span>
                    </div>

                </div>

            </div>

        </div>
    </div>

</body>
</html>