<?php
function ambil_satu_catatan($koneksi, $id_catatan, $id_user) {
    $id_catatan = mysqli_real_escape_string($koneksi, $id_catatan);
    $id_user    = mysqli_real_escape_string($koneksi, $id_user);

    $query = "SELECT * FROM catatan WHERE id_catatan = '$id_catatan' AND id_user = '$id_user'";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function hapus_catatan_murid($koneksi, $id_catatan, $id_user) {
    $id_catatan = mysqli_real_escape_string($koneksi, $id_catatan);
    $id_user    = mysqli_real_escape_string($koneksi, $id_user);

    $query = "DELETE FROM catatan WHERE id_catatan = '$id_catatan' AND id_user = '$id_user'";
    return mysqli_query($koneksi, $query);
}
function ambil_data_leaderboard($koneksi, $id_sekolah_guru, $time = 'all', $scope = 'school') {
    
    $filter_catatan = "";
    $filter_misi = "";

    if ($time == 'month') {
        $filter_catatan = "AND MONTH(c.tanggal_catatan) = MONTH(CURRENT_DATE()) AND YEAR(c.tanggal_catatan) = YEAR(CURRENT_DATE())";
        $filter_misi    = "AND MONTH(p.tanggal_update) = MONTH(CURRENT_DATE()) AND YEAR(p.tanggal_update) = YEAR(CURRENT_DATE())";
    
    } elseif ($time == 'week') {
        $filter_catatan = "AND YEARWEEK(c.tanggal_catatan, 1) = YEARWEEK(CURRENT_DATE(), 1)";
        $filter_misi    = "AND YEARWEEK(p.tanggal_update, 1) = YEARWEEK(CURRENT_DATE(), 1)";
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
                    (SELECT COUNT(*) FROM progres p WHERE p.id_user = u.id_user AND p.nilai = 100 $filter_misi) * 5
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