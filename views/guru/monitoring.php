<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa - Diary of Learning (Guru)</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/monitoring_guru.css">
    
</head>

<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <h2>Daftar Siswa SMA Bintang Timur</h2>
                <p>Ringkasan progres dan detail akun siswa yang Anda awasi.</p>
            </div>
            
            <div class="search-area">
                <input type="text" placeholder="Cari Nama atau ID Siswa..." id="searchSiswa">
                <button onclick="alert('Simulasi fungsi pencarian...')">Cari</button>
            </div>

            <div class="data-table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID Siswa</th>
                            <th>Nama Lengkap</th>
                            <th>Progres Menulis (%)</th>
                            <th>Kosakata Dikuasai</th>
                            <th>Status Misi Sekolah</th>
                            <th style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1005</td>
                            <td>Dian Anggraini</td>
                            <td>
                                <div class="progress-bar-container">
                                    <div class="progress-fill" style="width: 80.5%;"></div>
                                </div>
                                <div class="progress-text">80.5%</div>
                            </td>
                            <td>
                                <div class="progress-text">124 Kata</div>
                            </td>
                            <td><span class="badge badge-warning">Dalam Proses</span></td>
                            <td><button class="btn-detail">Profil</button></td>
                        </tr>

                        <tr>
                            <td>1006</td>
                            <td>Edo Firmansyah</td>
                            <td>
                                <div class="progress-bar-container">
                                    <div class="progress-fill progress-fill-success" style="width: 95%;"></div>
                                </div>
                                <div class="progress-text">95.0%</div>
                            </td>
                            <td>
                                <div class="progress-text">90 Kata</div>
                            </td>
                            <td><span class="badge badge-danger">Belum Mulai</span></td>
                            <td><button class="btn-detail">Profil</button></td>
                        </tr>

                        <tr>
                            <td>1007</td>
                            <td>Fiona Cahyadi</td>
                            <td>
                                <div class="progress-bar-container">
                                    <div class="progress-fill" style="width: 45%;"></div>
                                </div>
                                <div class="progress-text">45.0%</div>
                            </td>
                            <td>
                                <div class="progress-text">201 Kata</div>
                            </td>
                            <td><span class="badge badge-success">Lulus</span></td>
                            <td><button class="btn-detail">Profil</button></td>
                        </tr>
                        
                        <tr>
                            <td>1008</td>
                            <td>Gilang Pratama</td>
                            <td>
                                <div class="progress-bar-container">
                                    <div class="progress-fill" style="width: 62%;"></div>
                                </div>
                                <div class="progress-text">62.0%</div>
                            </td>
                            <td>
                                <div class="progress-text">155 Kata</div>
                            </td>
                            <td><span class="badge badge-warning">Dalam Proses</span></td>
                            <td><button class="btn-detail">Profil</button></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            
            <p class="table-footer-info">Menampilkan 4 dari 50 total siswa.</p>

        </div>

    </div>

</body>

</html>