<?php

/* =========================================
   1. DATA MASTER: SEKOLAH
   ========================================= */
function sekolah_get_all($koneksi){
    $sql = "SELECT sekolah.*, user.nama_lengkap
            FROM sekolah
            LEFT JOIN user ON sekolah.id_guru = user.id_user
            ORDER BY id_sekolah DESC";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

/* =========================================
   2. DATA MASTER: USER
   ========================================= */
function user_get_all($koneksi, $filter_role = null) {
    $sql = "SELECT user.*, sekolah.nama_sekolah
            FROM user
            LEFT JOIN sekolah ON user.id_sekolah = sekolah.id_sekolah";

    if ($filter_role != null && $filter_role != "") {
        $role_id = (int)$filter_role;
        $sql .= " WHERE user.role = $role_id";
    }

    $sql .= " ORDER BY user.id_user ASC";

    $result = mysqli_query($koneksi, $sql);
    if (!$result) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

/* =========================================
   3. DATA MASTER: MISI GLOBAL
   ========================================= */

function misi_global_get_all($koneksi) {
    $sql = "SELECT * FROM misi WHERE kategori='global' ORDER BY id_misi DESC";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function misi_global_get_by_id($koneksi, $id_misi) {
    $id = (int)$id_misi;
    $q = mysqli_query($koneksi, "SELECT * FROM misi WHERE id_misi=$id LIMIT 1");
    return mysqli_fetch_assoc($q);
}

function misi_global_insert($koneksi, $id_pembuat, $judul, $deskripsi, $target, $mulai, $akhir) {
    $judul      = mysqli_real_escape_string($koneksi, $judul);
    $deskripsi  = mysqli_real_escape_string($koneksi, $deskripsi);
    $target     = (int)$target;

    $sql = "INSERT INTO misi
            (id_pembuat, id_sekolah, judul, kategori, deskripsi, tanggal_mulai, tanggal_akhir, target_jumlah_kata)
            VALUES
            ($id_pembuat, NULL, '$judul', 'global', '$deskripsi', '$mulai', '$akhir', $target)";

    return mysqli_query($koneksi, $sql);
}

function misi_global_update($koneksi, $id_misi, $judul, $deskripsi, $target, $mulai, $akhir) {
    $id         = (int)$id_misi;
    $judul      = mysqli_real_escape_string($koneksi, $judul);
    $deskripsi  = mysqli_real_escape_string($koneksi, $deskripsi);
    $target     = (int)$target;

    $sql = "UPDATE misi SET
            judul='$judul',
            deskripsi='$deskripsi',
            tanggal_mulai='$mulai',
            tanggal_akhir='$akhir',
            target_jumlah_kata=$target
            WHERE id_misi=$id";

    return mysqli_query($koneksi, $sql);
}

function misi_global_delete($koneksi, $id_misi) {
    $id = (int)$id_misi;
    return mysqli_query($koneksi, "DELETE FROM misi WHERE id_misi=$id");
}

function user_get_by_id($koneksi, $id_user) {
    $id_user = (int)$id_user;

    $sql = "SELECT user.*, sekolah.nama_sekolah
            FROM user
            LEFT JOIN sekolah ON user.id_sekolah = sekolah.id_sekolah
            WHERE id_user = $id_user";

    $result = mysqli_query($koneksi, $sql);
    return mysqli_fetch_assoc($result);
}

function user_update_profile($koneksi, $id_user, $nama, $username, $email) {
    $id_user = (int)$id_user;

    $nama     = mysqli_real_escape_string($koneksi, $nama);
    $username = mysqli_real_escape_string($koneksi, $username);
    $email    = mysqli_real_escape_string($koneksi, $email);

    $sql = "UPDATE user SET
            nama_lengkap = '$nama',
            username = '$username',
            email = '$email'
            WHERE id_user = $id_user";

    return mysqli_query($koneksi, $sql);
}

?>
