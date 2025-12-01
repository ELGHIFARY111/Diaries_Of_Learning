<?php
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
?>