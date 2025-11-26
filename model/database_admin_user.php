<?php
function user_get_all($koneksi) {
    $sql = "SELECT * FROM user";
    $result = mysqli_query($koneksi, $sql);
    return $result;
}
?>