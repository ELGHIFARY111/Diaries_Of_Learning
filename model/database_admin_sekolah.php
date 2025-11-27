<?php
function sekolah_get_all($koneksi){
    $sql = "SELECT * FROM sekolah ORDER BY id_sekolah DESC";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) return [];
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
