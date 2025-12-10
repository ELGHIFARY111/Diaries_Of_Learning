<?php

function ambil_kosakata_murid($koneksi, $id_user, $keyword = "") {
    $id_user = mysqli_real_escape_string($koneksi, $id_user);
    
    $query = "SELECT * FROM kosakata WHERE id_user = '$id_user'";
    
    if (!empty($keyword)) {
        $safe_keyword = mysqli_real_escape_string($koneksi, $keyword);
        $query .= " AND (kata_inggris LIKE '%$safe_keyword%' OR arti_indonesia LIKE '%$safe_keyword%')";
    }
    
    $query .= " ORDER BY id_kosakata DESC";
    
    return mysqli_query($koneksi, $query);
}

function tambah_kosakata_murid($koneksi, $data) {
    $id_user = mysqli_real_escape_string($koneksi, $data['id_user']);
    $kata_inggris = mysqli_real_escape_string($koneksi, $data['kata_inggris']);
    $arti = mysqli_real_escape_string($koneksi, $data['arti']);
    $contoh = mysqli_real_escape_string($koneksi, $data['contoh']);
    $tanggal = date('Y-m-d');

    $sql = "INSERT INTO kosakata (id_user, kata_inggris, arti_indonesia, contoh_kalimat, tanggal_dicatat) 
            VALUES ('$id_user', '$kata_inggris', '$arti', '$contoh', '$tanggal')";

    return mysqli_query($koneksi, $sql);
}
function ambil_misi_murid($koneksi, $id_user) {
    $id_user = mysqli_real_escape_string($koneksi, $id_user);
    $query = "
        SELECT 
            m.*, 
            COALESCE(p.nilai, 0) as progres_nilai,
            DATEDIFF(m.tanggal_akhir, CURDATE()) as sisa_hari
        FROM misi m
        JOIN user u ON u.id_sekolah = m.id_sekolah
        LEFT JOIN progres p ON p.id_misi = m.id_misi AND p.id_user = '$id_user'
        WHERE u.id_user = '$id_user' 
        AND (m.tanggal_akhir >= CURDATE() OR m.tanggal_akhir IS NULL)
        ORDER BY m.tanggal_akhir ASC
    ";

    return mysqli_query($koneksi, $query);
}
?>
?>