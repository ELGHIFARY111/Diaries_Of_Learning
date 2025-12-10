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