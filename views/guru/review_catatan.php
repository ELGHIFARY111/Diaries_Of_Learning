<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary of Learning</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/review_catatan_guru.css">
</head>

<body>

    <div class="container">

        <div class="content">

            <div class="header">
                <div class="header-text">
                    <h2>Tinjauan Catatan Harian Siswa</h2>
                    <p>Daftar lengkap entri jurnal bahasa Inggris yang perlu Anda tinjau dan beri umpan balik.</p>
                </div>
            </div>
            
            <div class="filter-area">
                <label for="filterStatus">Filter Status:</label>
                <select id="filterStatus">
                    <option>Belum Ditinjau</option>
                    <option>Sudah Ditinjau</option>
                    <option>Semua Catatan</option>
                </select>

                <label for="filterTipe">Filter Tipe:</label>
                <select id="filterTipe">
                    <option>Semua Tipe</option>
                    <option>Teks</option>
                    <option>Audio</option>
                    <option>Gambar</option>
                </select>
                
                <input type="date" value="2025-10-15">
            </div>

            <div class="data-table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Tanggal Catatan</th>
                            <th>Nama Siswa</th>
                            <th>Judul</th>
                            <th>Tipe</th>
                            <th>Status Review</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2025-10-01</td>
                            <td>Edo Firmansyah (1006)</td>
                            <td>Refleksi Pelajaran Sejarah yang panjang sekali hingga lebih dari 50 karakter</td>
                            <td><span class="badge badge-teks">Teks</span></td>
                            <td><span class="badge badge-review">BELUM</span></td>
                            <td>
                                <div class="aksi-group">
                                    <button class="btn-lihat">Lihat Review</button>
                                    <button class="btn-check">Tandai Dicek</button>
                                </div>
                            </td>
                        </tr>
                        </tr>
                        <tr>
                            <td>2025-10-10</td>
                            <td>Dian Anggraini (1005)</td>
                            <td>Refleksi Akhir Minggu</td>
                            <td><span class="badge badge-teks">Teks</span></td>
                            <td><span class="badge badge-checked">SUDAH</span></td>
                            <td>
                                <div class="aksi-group">
                                    <button class="btn-lihat btn-disabled">Lihat Umpan Balik</button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>2025-10-05</td>
                            <td>Fiona Cahyadi (1007)</td>
                            <td>Integrity is a valuable trait. (Dari Kosa Kata)</td>
                            <td><span class="badge badge-teks">Teks</span></td>
                            <td><span class="badge badge-review">BELUM</span></td>
                            <td>
                                <div class="aksi-group">
                                    <button class="btn-lihat">Lihat Review</button>
                                    <button class="btn-check">Tandai Dicek</button>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            
            <p style="text-align: center; margin-top: 25px; font-size: 0.9em; color: #7f8c8d;">Menampilkan 3 catatan dari total - catatan yang tersedia di sekolah Anda.</p>

        </div>

    </div>

</body>

</html>