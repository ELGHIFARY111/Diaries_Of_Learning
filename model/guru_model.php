<?php
// dashboard
function cari_data_guru($koneksi, $id_user) {
    $query = "SELECT u.*, s.nama_sekolah, s.kode_sekolah 
                FROM user u 
                LEFT JOIN sekolah s ON u.id_sekolah = s.id_sekolah 
                WHERE u.id_user = '$id_user'";
                
    return mysqli_fetch_assoc(mysqli_query($koneksi, $query));
}
function hitung_total_siswa($koneksi, $id_sekolah) {
    $query = "SELECT COUNT(*) as total FROM user WHERE id_sekolah = '$id_sekolah' AND role = '3'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

function hitung_catatan_pending($koneksi, $id_sekolah) {
    $query = "SELECT COUNT(*) as total FROM catatan c 
                JOIN user u ON c.id_user = u.id_user 
                WHERE u.id_sekolah = '$id_sekolah' AND c.status_review = 'pending'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

function hitung_misi_aktif($koneksi, $id_sekolah) {
    $query = "SELECT COUNT(*) as total FROM misi 
                WHERE id_sekolah = '$id_sekolah' AND tanggal_akhir >= CURDATE()";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

function ambil_progres_terbaru($koneksi, $id_sekolah) {
    $query = "SELECT u.nama_lengkap, p.jenis_progres, p.nilai 
                FROM progres p 
                JOIN user u ON p.id_user = u.id_user 
                WHERE u.id_sekolah = '$id_sekolah' 
                ORDER BY p.tanggal_update DESC LIMIT 3";
    return mysqli_query($koneksi, $query);
}

function ambil_catatan_terbaru($koneksi, $id_sekolah) {
    $query = "SELECT u.nama_lengkap, c.judul, c.tanggal_catatan, c.status_review 
                FROM catatan c 
                JOIN user u ON c.id_user = u.id_user 
                WHERE u.id_sekolah = '$id_sekolah' 
                ORDER BY c.tanggal_catatan DESC LIMIT 3";
    return mysqli_query($koneksi, $query);
}
function tambah_sekolah_baru($koneksi, $id_guru, $nama_sekolah, $alamat) {
    $kode_sekolah = '';
    $is_unique = false;

    while (!$is_unique) {
        $kode_sekolah = rand(100000, 999999);
        $cek_query = "SELECT id_sekolah FROM sekolah WHERE kode_sekolah = '$kode_sekolah'";
        $result = mysqli_query($koneksi, $cek_query);
        if (mysqli_num_rows($result) == 0) {
            $is_unique = true;
        }
    }
    $query_sekolah = "INSERT INTO sekolah (nama_sekolah, alamat, kode_sekolah, id_guru) 
                        VALUES ('$nama_sekolah', '$alamat', '$kode_sekolah', '$id_guru')";
    
    if (mysqli_query($koneksi, $query_sekolah)) {
        $id_sekolah_baru = mysqli_insert_id($koneksi);
        $query_update = "UPDATE user SET id_sekolah = '$id_sekolah_baru' WHERE id_user = '$id_guru'";
        return mysqli_query($koneksi, $query_update);
    }
    
    return false;
}

function ambil_detail_sekolah($koneksi, $id_sekolah) {
    $query = "SELECT * FROM sekolah WHERE id_sekolah = '$id_sekolah'";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}
function ambil_daftar_siswa($koneksi, $id_sekolah, $keyword = null) {
    $query = "SELECT * FROM user WHERE id_sekolah = '$id_sekolah' AND role = '3'";
    if (!empty($keyword)) {
        $query .= " AND (nama_lengkap LIKE '%$keyword%' OR email LIKE '%$keyword%')";
    }
    $query .= " ORDER BY nama_lengkap ASC";
    return mysqli_query($koneksi, $query);
}

function ambil_rekan_guru($koneksi, $id_sekolah) {
    $query = "SELECT nama_lengkap, email 
                FROM user 
                WHERE id_sekolah = '$id_sekolah' AND role = '2' 
                ORDER BY nama_lengkap ASC";
                
    return mysqli_query($koneksi, $query);
}
function update_data_sekolah($koneksi, $id_sekolah, $nama_sekolah, $alamat) {
    $query = "UPDATE sekolah 
                SET nama_sekolah = '$nama_sekolah', 
                    alamat = '$alamat' 
                WHERE id_sekolah = '$id_sekolah'";
                
    return mysqli_query($koneksi, $query);
}
function ambil_daftar_misi($koneksi, $id_sekolah) {
    $query = "SELECT * FROM misi 
                WHERE id_sekolah = '$id_sekolah' 
                ORDER BY tanggal_mulai DESC";
    return mysqli_query($koneksi, $query);
}

function ambil_detail_misi($koneksi, $id_misi) {
    $query = "SELECT * FROM misi WHERE id_misi = '$id_misi'";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function tambah_misi_baru($koneksi, $data) {
    $judul      = mysqli_real_escape_string($koneksi, $data['judul']);
    $deskripsi  = mysqli_real_escape_string($koneksi, $data['deskripsi']);
    $tgl_mulai  = $data['tanggal_mulai'];
    $tgl_akhir  = $data['tanggal_akhir'];
    $id_pembuat = $data['id_pembuat'];
    $id_sekolah = $data['id_sekolah'];
    
    $array_kata = explode(',', $data['kata_target_raw']);
    $target_jumlah = count($array_kata);

    $query = "INSERT INTO misi (judul, deskripsi, tanggal_mulai, tanggal_akhir, target_jumlah_kata, id_pembuat, id_sekolah) 
            VALUES ('$judul', '$deskripsi', '$tgl_mulai', '$tgl_akhir', '$target_jumlah', '$id_pembuat', '$id_sekolah')";
    
    if (mysqli_query($koneksi, $query)) {
        $id_misi_baru = mysqli_insert_id($koneksi);

        foreach ($array_kata as $kata) {
            $kata_bersih = trim(mysqli_real_escape_string($koneksi, $kata));
            if (!empty($kata_bersih)) {
                mysqli_query($koneksi, "INSERT INTO kosakata_misi (id_misi, kata_kunci) VALUES ('$id_misi_baru', '$kata_bersih')");
            }
        }
        return true;
    }
    return false;
}
function ambil_list_kata_target($koneksi, $id_misi) {
    $id_misi = mysqli_real_escape_string($koneksi, $id_misi);
    $query = mysqli_query($koneksi, "SELECT kata_kunci FROM kosakata_misi WHERE id_misi = '$id_misi'");
    
    $hasil = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $hasil[] = $row['kata_kunci'];
    }
    return $hasil;
}

function update_misi($koneksi, $data) {
    $id_misi    = $data['id_misi'];
    $judul      = mysqli_real_escape_string($koneksi, $data['judul']);
    $deskripsi  = mysqli_real_escape_string($koneksi, $data['deskripsi']);
    $tgl_mulai  = $data['tanggal_mulai'];
    $tgl_akhir  = $data['tanggal_akhir'];
    
    $array_kata = explode(',', $data['kata_target_raw']);
    $target_jumlah = count($array_kata);

    $query = "UPDATE misi SET 
                judul='$judul', 
                deskripsi='$deskripsi', 
                tanggal_mulai='$tgl_mulai', 
                tanggal_akhir='$tgl_akhir',
                target_jumlah_kata='$target_jumlah' 
              WHERE id_misi='$id_misi'";
              
    if (mysqli_query($koneksi, $query)) {
        mysqli_query($koneksi, "DELETE FROM kosakata_misi WHERE id_misi='$id_misi'");

        foreach ($array_kata as $kata) {
            $kata_bersih = trim(mysqli_real_escape_string($koneksi, $kata));
            if (!empty($kata_bersih)) {
                mysqli_query($koneksi, "INSERT INTO kosakata_misi (id_misi, kata_kunci) VALUES ('$id_misi', '$kata_bersih')");
            }
        }
        return true;
    }
    return false;
}

function ambil_kata_misi_string($koneksi, $id_misi) {
    $q = mysqli_query($koneksi, "SELECT kata_kunci FROM kosakata_misi WHERE id_misi = '$id_misi'");
    $arr = [];
    while($row = mysqli_fetch_assoc($q)) {
        $arr[] = $row['kata_kunci'];
    }
    return implode(', ', $arr); 
}
function hapus_misi($koneksi, $id_misi) {
    return mysqli_query($koneksi, "DELETE FROM misi WHERE id_misi='$id_misi'");
}
function ambil_progres_siswa_per_misi($koneksi, $id_sekolah, $id_misi) {
    $q_target = mysqli_query($koneksi, "SELECT target_jumlah_kata FROM misi WHERE id_misi = '$id_misi'");
    $d_target = mysqli_fetch_assoc($q_target);
    $target = $d_target['target_jumlah_kata'] ?? 0;

    $query = "SELECT u.id_user, u.nama_lengkap, u.email, 
                    COALESCE(p.nilai, 0) as progres_nilai
            FROM user u
            LEFT JOIN progres p ON u.id_user = p.id_user AND p.id_misi = '$id_misi'
            WHERE u.id_sekolah = '$id_sekolah' 
            AND u.role = '3' 
            ORDER BY u.nama_lengkap ASC";
            
    $data = mysqli_query($koneksi, $query);

    return ['data' => $data, 'target' => $target];
}
function ambil_catatan_siswa_sekolah($koneksi, $id_sekolah, $filter_status = 'all', $filter_tipe = 'all') {
    $query = "SELECT c.*, u.nama_lengkap
            FROM catatan c
            JOIN user u ON c.id_user = u.id_user
            WHERE u.id_sekolah = '$id_sekolah'";

    if ($filter_status != 'all') {
        $query .= " AND c.status_review = '$filter_status'";
    }
    if ($filter_tipe != 'all') {
        $query .= " AND c.tipe = '$filter_tipe'";
    }

    $query .= " ORDER BY c.tanggal_catatan DESC, c.status_review ASC";
    
    return mysqli_query($koneksi, $query);
}

function tandai_sudah_review($koneksi, $id_catatan) {
    $query = "UPDATE catatan SET status_review = 'reviewed' WHERE id_catatan = '$id_catatan'";
    return mysqli_query($koneksi, $query);
}

function ambil_statistik_laporan_sekolah($koneksi, $id_sekolah) {
    // Total Siswa
    $q_siswa = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM user WHERE id_sekolah = '$id_sekolah' AND role = '3'");
    $total_siswa = mysqli_fetch_assoc($q_siswa)['total'];
    if ($total_siswa == 0) $total_siswa = 1;

    // Rata-rata Entri Jurnal
    $q_catatan_bulan = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM catatan c JOIN user u ON c.id_user = u.id_user WHERE u.id_sekolah = '$id_sekolah' AND MONTH(c.tanggal_catatan) = MONTH(CURRENT_DATE())");
    $total_catatan_bulan = mysqli_fetch_assoc($q_catatan_bulan)['total'];
    $avg_mingguan = number_format($total_catatan_bulan / 4, 1);

    // Total Kosakata
    $q_kosakata = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kosakata k JOIN user u ON k.id_user = u.id_user WHERE u.id_sekolah = '$id_sekolah'");
    $total_words = number_format(mysqli_fetch_assoc($q_kosakata)['total']);

    // Feedback Ratio
    $q_all_notes = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM catatan c JOIN user u ON c.id_user = u.id_user WHERE u.id_sekolah = '$id_sekolah'");
    $total_notes = mysqli_fetch_assoc($q_all_notes)['total'];
    
    $q_reviewed = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM catatan c JOIN user u ON c.id_user = u.id_user WHERE u.id_sekolah = '$id_sekolah' AND c.status_review = 'reviewed'");
    $reviewed_notes = mysqli_fetch_assoc($q_reviewed)['total'];

    $feedback_ratio = ($total_notes > 0) ? round(($reviewed_notes / $total_notes) * 100) : 0;

    // Grafik Aktivitas Harian
    $chart1_labels = [];
    $chart1_data = [];
    for ($i = 6; $i >= 0; $i--) {
        $date = date('Y-m-d', strtotime("-$i days"));
        $q_day = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM catatan c JOIN user u ON c.id_user = u.id_user WHERE u.id_sekolah = '$id_sekolah' AND c.tanggal_catatan = '$date'");
        $chart1_labels[] = date('d M', strtotime($date));
        $chart1_data[] = mysqli_fetch_assoc($q_day)['total'];
    }

    // Grafik Kosakata 
    $chart2_labels = [];
    $chart2_data = [];
    
    // Ambil total saat ini saja
    $q_voc_total = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kosakata k JOIN user u ON k.id_user = u.id_user WHERE u.id_sekolah = '$id_sekolah'");
    $total_saat_ini = mysqli_fetch_assoc($q_voc_total)['total'];

    for ($i = 4; $i >= 0; $i--) {
        $month_label = date('M Y', strtotime("-$i months"));
        $chart2_labels[] = $month_label;
        $chart2_data[] = $total_saat_ini; 
    }

    return [
        'avg_mingguan'   => $avg_mingguan,
        'total_words'    => $total_words,
        'feedback_ratio' => $feedback_ratio,
        'chart1_labels'  => json_encode($chart1_labels),
        'chart1_data'    => json_encode($chart1_data),
        'chart2_labels'  => json_encode($chart2_labels),
        'chart2_data'    => json_encode($chart2_data)
    ];
}

function update_profil_guru($koneksi, $id_user, $nama, $username, $email, $password_baru = "") {
    $nama = mysqli_real_escape_string($koneksi, $nama);
    $username = mysqli_real_escape_string($koneksi, $username);
    $email = mysqli_real_escape_string($koneksi, $email);

    if (!empty($password_baru)) {
        $password_hash = hash('sha256', $password_baru);
        $query = "UPDATE user SET nama_lengkap='$nama', username='$username', email='$email', password='$password_hash' WHERE id_user='$id_user'";
    } else {
        $query = "UPDATE user SET nama_lengkap='$nama', username='$username', email='$email' WHERE id_user='$id_user'";
    }

    return mysqli_query($koneksi, $query);
}

function ambil_leaderboard($koneksi, $id_sekolah_guru, $scope = 'school', $time = 'all', $search = '') {
    
    $filter_catatan = "";
    $filter_kosakata = "";
    
    if ($time == 'month') {
        $filter_catatan = "AND MONTH(c.tanggal_catatan) = MONTH(CURRENT_DATE()) AND YEAR(c.tanggal_catatan) = YEAR(CURRENT_DATE())";
    } elseif ($time == 'week') {
        $filter_catatan = "AND YEARWEEK(c.tanggal_catatan, 1) = YEARWEEK(CURRENT_DATE(), 1)";
    }

    $filter_sekolah = "";
    if ($scope == 'school') {
        $filter_sekolah = "AND u.id_sekolah = '$id_sekolah_guru'";
    }

    $query = "SELECT 
                u.nama_lengkap, 
                s.nama_sekolah,
                (
                    (SELECT COUNT(*) FROM catatan c WHERE c.id_user = u.id_user $filter_catatan) * 10 
                    + 
                    (SELECT COUNT(*) FROM kosakata k WHERE k.id_user = u.id_user) * 2
                ) as total_poin
            FROM user u
            LEFT JOIN sekolah s ON u.id_sekolah = s.id_sekolah
            WHERE u.role = '3' 
            $filter_sekolah
            ORDER BY total_poin DESC, u.nama_lengkap ASC";

    return mysqli_query($koneksi, $query);
}
function cek_sekolah_by_kode($koneksi, $kode) {
    $kode = mysqli_real_escape_string($koneksi, $kode);
    $query = "SELECT * FROM sekolah WHERE kode_sekolah = '$kode'";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}
function cek_sekolah_by_nama($koneksi, $nama) {
    $nama = mysqli_real_escape_string($koneksi, $nama);
    $query = "SELECT * FROM sekolah WHERE nama_sekolah = '$nama'"; 
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}
function update_sekolah_guru($koneksi, $id_user, $id_sekolah) {
    $id_user = mysqli_real_escape_string($koneksi, $id_user);
    $id_sekolah = mysqli_real_escape_string($koneksi, $id_sekolah);
    
    $query = "UPDATE user SET id_sekolah = '$id_sekolah' WHERE id_user = '$id_user'";
    return mysqli_query($koneksi, $query);
}
function ambil_detail_siswa($koneksi, $id_siswa) {
    $id_siswa = mysqli_real_escape_string($koneksi, $id_siswa);
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_siswa'");
    return mysqli_fetch_assoc($query);
}

function ambil_statistik_siswa($koneksi, $id_siswa) {
    $id_siswa = mysqli_real_escape_string($koneksi, $id_siswa);
    
    $q1 = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM catatan WHERE id_user = '$id_siswa'");
    $catatan = mysqli_fetch_assoc($q1)['total'];

    $q2 = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kosakata WHERE id_user = '$id_siswa'");
    $kosakata = mysqli_fetch_assoc($q2)['total'];

    return ['total_catatan' => $catatan, 'total_kosakata' => $kosakata];
}

function ambil_catatan_lengkap_dengan_user($koneksi, $id_catatan) {
    $id_catatan = mysqli_real_escape_string($koneksi, $id_catatan);
    
    $query = "SELECT c.*, u.nama_lengkap 
            FROM catatan c 
            JOIN user u ON c.id_user = u.id_user 
            WHERE c.id_catatan = '$id_catatan'";
            
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}
function ambil_riwayat_catatan_siswa($koneksi, $id_siswa) {
    $id_siswa = mysqli_real_escape_string($koneksi, $id_siswa);
    $query = "SELECT * FROM catatan WHERE id_user = '$id_siswa' ORDER BY tanggal_catatan DESC LIMIT 10";
    return mysqli_query($koneksi, $query);
}

function hitung_skor_total_siswa($koneksi, $id_siswa) {
    $id_siswa = mysqli_real_escape_string($koneksi, $id_siswa);
    
    // Poin Catatan (x10)
    $q1 = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM catatan WHERE id_user = '$id_siswa'");
    $poin_catatan = mysqli_fetch_assoc($q1)['total'] * 10;

    // Poin Misi Selesai (x5)
    $q2 = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM progres WHERE id_user = '$id_siswa' AND nilai = 100");
    $poin_misi = mysqli_fetch_assoc($q2)['total'] * 5;

    // Poin Kosakata (x2)
    $q3 = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM kosakata WHERE id_user = '$id_siswa'");
    $poin_kosakata = mysqli_fetch_assoc($q3)['total'] * 2;

    return $poin_catatan + $poin_misi + $poin_kosakata;
}
?>