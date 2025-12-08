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
// tambah sekolah
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
// misi kosakata
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

function tambah_misi($koneksi, $data) {
    $id_sekolah = $data['id_sekolah'];
    $id_pembuat = $data['id_pembuat'];
    $judul      = $data['judul'];
    $deskripsi  = $data['deskripsi'];
    $tgl_mulai  = $data['tanggal_mulai'];
    $tgl_akhir  = $data['tanggal_akhir'];
    $target     = $data['target_jumlah_kata'];

    $query = "INSERT INTO misi (id_sekolah, id_pembuat, judul, deskripsi, tanggal_mulai, tanggal_akhir, target_jumlah_kata) 
                VALUES ('$id_sekolah', '$id_pembuat', '$judul', '$deskripsi', '$tgl_mulai', '$tgl_akhir', '$target')";
                
    return mysqli_query($koneksi, $query);
}

function update_misi($koneksi, $id_misi, $data) {
    $judul      = $data['judul'];
    $deskripsi  = $data['deskripsi'];
    $tgl_mulai  = $data['tanggal_mulai'];
    $tgl_akhir  = $data['tanggal_akhir'];
    $target     = $data['target_jumlah_kata'];

    $query = "UPDATE misi SET 
                judul = '$judul',
                deskripsi = '$deskripsi',
                tanggal_mulai = '$tgl_mulai',
                tanggal_akhir = '$tgl_akhir',
                target_jumlah_kata = '$target'
            WHERE id_misi = '$id_misi'";
            
    return mysqli_query($koneksi, $query);
}

function hapus_misi($koneksi, $id_misi) {
    $query = "DELETE FROM misi WHERE id_misi = '$id_misi'";
    return mysqli_query($koneksi, $query);
}
function ambil_progres_siswa_per_misi($koneksi, $id_sekolah, $id_misi) {
    $q_misi = mysqli_query($koneksi, "SELECT target_jumlah_kata FROM misi WHERE id_misi = '$id_misi'");
    $d_misi = mysqli_fetch_assoc($q_misi);
    $target = $d_misi['target_jumlah_kata'];
    
    $query = "SELECT u.id_user, u.nama_lengkap, u.email,
                (
                    SELECT COUNT(*) FROM progres p 
                    WHERE p.id_user = u.id_user 
                ) as kata_dikuasai
                FROM user u 
                WHERE u.id_sekolah = '$id_sekolah' AND u.role = '3'
                ORDER BY kata_dikuasai DESC";

    $result = mysqli_query($koneksi, $query);
    return [
        'data' => $result,
        'target' => $target
    ];
}
?>